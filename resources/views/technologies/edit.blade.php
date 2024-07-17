@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form action="{{ route('admin.Technology.update', $technology->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="w-50 m-5">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name="name"
                value="{{ old('name') ?? $technology->name }}">
        </div>
        @error('title')
            <div>NON FUNZIONA</div>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description"
                name="description" value="{{ old('description') ?? $technology->description }}">
        </div>
        @error('description')
            <div>NON FUNZIONA</div>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Icon</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Icon" name="icon"
                value="{{ old('icon') ?? $technology->icon }}">
        </div>
        @error('img')
            <div>NON FUNZIONA</div>
        @enderror
        <button type="submit"> Modifica </button>
    </form>
@endsection
