@extends('layouts.app')

@section('breadtitle', 'Edit Profile')
@section('breaddesc', 'Profile Editing')
@section('cardcontent')
<form action="{{ route('profiles.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col">
            <div class="form-group mb-3">
                <label for="simpleinput">Name</label>
                <input type="text" name="name" id="simpleinput" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group mb-3">
                <label for="simpleinput">Email</label>
                <input type="text" name="email" id="simpleinput" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group mb-3">
                <label for="simpleinput">New Password</label>
                <input type="password" name="password" id="simpleinput" class="form-control">
            </div>
            <div class="form-group mb-3">
                <button class="btn btn-success">Save</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</form>
@endsection