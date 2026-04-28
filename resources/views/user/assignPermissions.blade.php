@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="card mb-4 pb-4">
        <div class="card-header">Gérer les rôles</div>
        <div class="container">
            <form method="post" action="{{ route('user.assignPermissions') }}" class="form-group px-4">
                @csrf
                <div class="form-group">
                    <label for="role_id">Select Role:</label>
                    <select name="role_id" id="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="permissions">Select Permissions:</label>
                    <select name="permissions[]" id="permissions" multiple class="form-control" size="8">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary my-4">Assign Permissions</button>
            </form>
        </div>
    </div>

    <div class="row py-4">
        <table class="table">
            <tr>
                @foreach($roles as $role)
                    <td class="py-4">
                        <h3>{{ $role->name }}</h3>
                        <ul>
                            @foreach($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                @endforeach
            </tr>
        </table>
    </div>
    @if(auth()->check() && auth()->user()->hasRole('superadmin'))
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/register"> Ajouter un nouveau utilisateur</a>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-roles"> Gérer les roles</a>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-permissions"> Gérer les Permissions</a>
            @endif
</div>

@endsection
