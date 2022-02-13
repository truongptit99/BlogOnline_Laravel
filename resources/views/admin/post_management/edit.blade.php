@extends('admin.layout.layout')
@section('link')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Post</h3>
                    </div>
                    <form id="form-add" action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}" @php if ($cate->id == $post->category_id) echo "selected"; @endphp>{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                                @error('title')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/storage/' . $post->img) }}" style="width: 50%; display: block;" alt="blog images">
                                <label>Image </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img" class="form-control custom-file-input" id="post-img">
                                        <label class="custom-file-label" for="post-img">{{ $post->img }}</label>
                                    </div>
                                </div>
                                @error('img')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Content <span class="text-danger">*</span></label>
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="user_id" value="{{ $post->user_id }}">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Enter content...',
            tabsize: 2,
            height: 500,
            focus: true,
            tabDisable: true,
            });
    });
</script>
@endsection
