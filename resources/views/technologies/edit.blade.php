@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form action="{{ route('admin.Technology.update', $technology->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="w-50 m-5">
            <label for="tech_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="tech_name" placeholder="Name" name="name"
                value="{{ old('name') ?? $technology->name }}">
        </div>
        @error('name')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="tech_description" class="form-label">Description</label>
            <input type="text" class="form-control" id="tech_description" placeholder="Description"
                name="description" value="{{ old('description') ?? $technology->description }}">
        </div>
        @error('description')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="tech_icon" class="form-label">Icon</label>
            <input type="text" class="form-control" id="tech_icon" placeholder="Icon" name="icon"
                value="{{ old('icon') ?? $technology->icon }}">
        </div>
        @error('icon')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit"> Modifica </button>
    </form>
@endsection
