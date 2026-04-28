{{-- resources/views/admin/permissions/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Manage Roles and Permissions</h1>

    {{-- Display roles --}}
    <h2>Roles</h2>
    @foreach($roles as $role)
        <p>{{ $role->name }}</p>
    @endforeach

    {{-- Display permissions --}}
    <h2>Permissions</h2>
    @foreach($permissions as $permission)
        <p>{{ $permission->name }}</p>
    @endforeach
@endsection
