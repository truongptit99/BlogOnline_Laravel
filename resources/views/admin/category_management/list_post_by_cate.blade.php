@extends('admin.layout.layout')
@section('main')
<h2>{{ $listPostByCateMess }}</h2>
<hr>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Number</th>
            <th class="text-center">Image</th>
            <th class="text-center">Title</th>
            <th class="text-center">Author</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $key => $post)
            <tr>
                <td class="text-center" scope="row">{{ $posts->firstItem() + $key }}</td>
                <td class="text-center">
                    <img src="{{ asset('storage/storage/' . $post->img) }}" style="width: 100px; height: 50px;" alt="blog images">
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->email }}</td>
                <td class="text-center">
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('posts.destroy', $post) }}" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
                <form id="form-delete" method="post">
                    @csrf
                    @method('delete')
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
