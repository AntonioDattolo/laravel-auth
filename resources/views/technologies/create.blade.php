@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form class="d-flex justify-content-center flex-wrap" action="{{ route('admin.Technology.store') }}" method="POST">
        @csrf
        <div class="col-12 m-5">
            <label for="tech_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="tech_name" placeholder="Name" name="name">
        </div>
         @error('name')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="col-12 m-5">
            <label for="tech_description" class="form-label">Description</label>
            <input type="text" class="form-control" id="tech_description" placeholder="Description"
                name="description">
        </div>
         @error('description')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="col-12 m-5">
            <label for="tech_icon" class="form-label">Icon</label>
            <input type="text" class="form-control" id="tech_icon" placeholder="Icon" name="icon">
        </div>
         @error('icon')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="text-center">
            <button type="submit"> ADD </button>
        </div>
    </form>
@endsection
