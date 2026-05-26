@extends('admin.layouts.app')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil Penulis</h1>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label>Email (tidak bisa diubah)</label>
                <input type="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon / HP</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->profile->phone ?? '' }}">
            </div>
            <div class="form-group">
                <label for="bio">Biografi Singkat</label>
                <textarea class="form-control" id="bio" name="bio" rows="4">{{ $user->profile->bio ?? '' }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection