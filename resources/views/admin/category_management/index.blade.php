@extends('admin.layout.layout')
@section('main')
<a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Add new category</a>
<hr>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Number</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">List posts</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $cate)
            <tr>
                <td class="text-center" scope="row">{{ $categories->firstItem() + $key }}</td>
                <td>{{ $cate->name }}</td>
                <td>{{ $cate->des }}</td>
                <td class="text-center">
                    <a href="{{ route('posts.find_by_cate_id', $cate) }}" class="btn btn-sm btn-info">View</a>
                </td>
                <td class="text-center">
                    <a href="{{ route('categories.edit', $cate) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('categories.destroy', $cate) }}" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<div>
    {{ $categories->links() }}
</div>
<form id="form-delete" method="post">
    @csrf
    @method('delete')
</form>
@endsection
@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
