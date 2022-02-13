@extends('admin.layout.layout')
@section('main')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                    <form id="form-add" action="{{ route('users.update', $user) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group">
                                <label>Full name <span class="text-danger">*</span></label>
                                <input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control">
                                @error('fullname')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                                @error('username')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                                @error('email')
                                    <span class="text-danger font-italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control">
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
