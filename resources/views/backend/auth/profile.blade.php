@extends('backend.layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            @if($errors->any())
            @foreach($errors->all as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
            @elseif(session('error_msg'))
            <div class="alert alert-danger" role="alert">
                {{ session('error_msg') }}
            </div>
            @elseif(session('msg'))
            <div class="alert alert-success" role="alert">
                {{ session('msg') }}
            </div>
            @endif
            <form action="{{ route('user.update', auth()->user()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input required name="name" type="text" class="form-control" placeholder="Enter Name" value="{{ auth()->user()->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input required name="email" type="email" class="form-control" placeholder="Enter Email" value="{{ auth()->user()->email }}">
                </div>
                <div class="form-group">
                    <label>Old Password</label>
                    <input required name="old_password" type="password" class="form-control" placeholder="Enter Old Password" value="">
                </div>
                <div class="form-group">
                    <label>New Password (Optional)</label>
                    <input name="password" type="password" class="form-control" placeholder="Enter New Password" value="">
                </div>
                <div class="form-group">
                    <label>About</label>
                    <textarea name="about" class="form-control" placeholder="Enter About">{{ auth()->user()->about }}</textarea>
                </div>
                <input name="submit" type="submit" value="Update" class="btn btn-primary btn-block" />
            </form>
        </div>
    </div>
</div>

@endsection