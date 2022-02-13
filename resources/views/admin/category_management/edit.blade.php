@extends('admin.layout.layout')
@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <form id="form-add" action="{{ route('categories.update', $cate) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label><span class="text-danger"> *</span>
                                <input type="text" name="name" value="{{ $cate->name }}" class="form-control" id="inputName"
                                    placeholder="Enter name"
                                    aria-invalid="false">
                                @error('name')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDes">Description</label>
                                <input type="text" name="des" value="{{ $cate->des }}" class="form-control" id="inputDes"
                                    placeholder="Enter description"
                                    aria-invalid="false">
                            </div>
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
