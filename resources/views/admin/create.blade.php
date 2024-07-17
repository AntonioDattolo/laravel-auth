@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form action="{{ route('admin.Project.store') }}" method="POST">
        @csrf
        <div class="w-50 m-5">
            <label for="formGroupExampleInput" class="form-label">Title</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Project Title" name="title">
        </div>
         @error('title')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description"
                name="description">
        </div>
         @error('description')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Image</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Img URL" name="img">
        </div>
         @error('img')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <select name="type_id" id="">
            <option value="{{ $type[0]->id }}">{{ $type[0]->name }}</option>
            <option value="{{ $type[1]->id }}">{{ $type[1]->name }}</option>
            <option value="{{ $type[2]->id }}">{{ $type[2]->name }}</option>
            <option value="{{ $type[3]->id }}">{{ $type[3]->name }}</option>
        </select>
        <div class="mb-4 row">
            <label for="items" class="col-md-2 col-form-label text-md-right">Technology</label>
            <div class="col-md-10">
                @foreach ($technology as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $item->id }}"
                            id="item{{ $item->id }}">
                        <label class="form-check-label" for="item{{ $item->id }}">
                            {{ $item->name }}
                        </label>
                    </div>
                @endforeach
                @error('technologies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <button type="submit"> AGGIUNGI </button>
    </form>
@endsection
