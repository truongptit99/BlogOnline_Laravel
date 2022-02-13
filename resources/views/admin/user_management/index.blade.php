@extends('admin.layout.layout')
@section('main')
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Number</th>
            <th class="text-center">Fullname</th>
            <th class="text-center">Username</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key => $user)
            <tr>
                <td class="text-center" scope="row">{{ $users->firstItem() + $key }}</td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td class="text-center">
                    @if ($user->is_active == config('app.is_active'))
                        <div class="btn-group btn-toggle">
                            <button class="btn btn-sm btn-primary active" id="{{ $user->id }}">ON</button>
                            <button class="btn btn-sm btn-default" id="{{ $user->id }}">OFF</button>
                        </div>
                    @else
                        <div class="btn-group btn-toggle">
                            <button class="btn btn-sm btn-default" id="{{ $user->id }}">ON</button>
                            <button class="btn btn-sm btn-primary active" id="{{ $user->id }}">OFF</button>
                        </div>
                    @endif
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<div>
    {{ $users->links() }}
</div>
<form id="form-delete" method="post">
    @csrf
    @method('delete')
</form>
@endsection
@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
<script src="{{ asset('js/active_deactive.js') }}"></script>
@endsection
