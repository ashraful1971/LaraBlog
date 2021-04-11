@extends('backend.layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Settings</h6>
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
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Site Title</label>
                    <input required name="site_title" type="text" class="form-control" placeholder="Enter Site Title" value="{{ $site_title }}">
                </div>
                <div class="form-group">
                    <label>Site Logo</label>
                    <input name="site_logo" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label>Advertising Banner</label>
                    <input name="ads_banner" type="file" class="form-control">
                </div>
                <div class="form-group">
                <label>Advertising Link</label>
                    <input required name="ads_link" type="text" class="form-control" placeholder="Advertising Link" value="{{ $ads_link }}">
                </div>
                <input name="submit" type="submit" value="Update" class="btn btn-primary btn-block" />
            </form>
        </div>
    </div>
</div>

@endsection