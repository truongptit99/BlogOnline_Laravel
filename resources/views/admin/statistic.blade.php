@extends('admin.layout.layout')
@section('main')
<div class="card card-primary">
    <div class="card-header">Top Category By Post</div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Number</th>
                    <th class="text-center">Category Name</th>
                    <th class="text-center">Number Of Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCateSortByPost as $cate)
                    <tr>
                        <td class="text-center" scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $cate->name }}</td>
                        <td class="text-center">{{ $cate->total_post }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">Top User By Post</div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Number</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Number Of Post</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUserSortByPost as $user)
                    <tr>
                        <td class="text-center" scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->total_post }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">Top User By Comment</div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Number</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Number Of Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listUserSortByCmt as $user)
                    <tr>
                        <td class="text-center" scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->total_cmt }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">Top Post By Comment</div>
    <div class="card-body">
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">Number</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Number Of Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listPostSortByCmt as $post)
                    <tr>
                        <td class="text-center" scope="row">{{ $loop->index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->total_cmt }}</tdt=>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
