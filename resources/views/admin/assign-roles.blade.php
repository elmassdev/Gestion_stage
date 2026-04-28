<!-- assign-roles.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Assign Roles</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="post" action="{{ route('assign-roles.submit') }}">
        @csrf

        <label for="user_id">Select User:</label>
        <select name="user_id" id="user_id">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>

        <label for="roles">Select Roles:</label>
        <select name="roles[]" id="roles" multiple>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <button type="submit">Assign Roles</button>
    </form>
@endsection
