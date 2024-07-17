@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form action="{{ route('admin.Type.update', $type->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="w-50 m-5">
            <label for="type_name" class="form-label">Name</label>
            <input type="text" class="form-control" id="type_name" placeholder="Name" name="name"
                value="{{ old('name') ?? $type->name }}">
        </div>
        @error('name')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="type_description" class="form-label">Description</label>
            <input type="text" class="form-control" id="type_description" placeholder="Description"
                name="description" value="{{ old('description') ?? $type->description }}">
        </div>
        @error('description')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="type_icon" class="form-label">Icon</label>
            <input type="text" class="form-control" id="type_icon" placeholder="Icon" name="icon"
                value="{{ old('icon') ?? $type->icon }}">
        </div>
        @error('icon')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit"> Modifica </button>
    </form>
@endsection
