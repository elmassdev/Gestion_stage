<!-- resources/views/user/assignRoles.blade.php -->

@extends('layouts.app')

@section('content')
    <div>
        <div class="container">
            <h3 class="my-4"> les utilisateurs: </h3>
            <table class="table table-striped table-responsive mx-auto">
                <tr>
                    <th>Prénom</th>
                    <th>nom</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->prenom }} </td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->sigle }}</td>
                    <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                    @if(auth()->check() && auth()->user()->hasRole('superadmin'))
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn text-danger" onclick="return confirm('Voulez-vous supprimer cet utilisateur?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
            </table>
            {{ $users->links() }}

        </div>
        <div class="container my-2">
            <div class="py-2">
                <h3>Gérer les roles</h3>
            </div>
            <div class="py-4">
                <div class="py-4">
                    <form method="post" action="{{ route('user.assignRoles') }}">
                        @csrf
                        <div class="form-group">
                            <label for="user_id" class="mb-1"> <b>Choisir un utilisateur:</b> </label>
                            <select name="user_id" class="form-control">
                                @isset($users)
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->prenom }} {{ $user->nom }} ({{ $user->email }})</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="roles" class="mb-1"> <b> Affecter les roles: </b></label>
                            <select name="roles[]" multiple class="form-control" size="6">
                                @isset($roles)
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary my-1"> Valider</button>
                    </form>

                </div>

            </div>
            <div class="row">

            </div>

        </div>
        <div class="container py-4">
            @if(auth()->check() && auth()->user()->hasRole('superadmin'))
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/register"> Ajouter un nouveau utilisateur</a>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-roles"> Gérer les roles</a>
            <a class="btn btn-outline-warning col-md-3  mx-auto border border-warning rounded-pill fs-5" href="/user/assign-permissions"> Gérer les Permissions</a>
            @endif
        </div>

    </div>
@endsection
