@extends('layouts.admin')
{{-- @include('partials.navbar') --}}
@section('content')
    <form action="{{ route('admin.Project.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-50 m-5">
            <label for="project_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="project_title" placeholder="Project Title" name="title">
        </div>
         @error('title')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="cover_image" class="form-label">Choose file</label>
            <input type="file" class="form-control" name="img" id="cover_image" placeholder="" aria-describedby="coverImageHelper" />
            <div id="coverImageHelper" class="form-text text-white">Upload an image for the curret project</div>
            @error('cover_image')
            <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="w-50 m-5">
            <label for="project_description" class="form-label">Description</label>
            <input type="text" class="form-control" id="project_description" placeholder="Description"
                name="description">
        </div>
         @error('description')
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
            <label class="col-md-2 col-form-label text-md-right">Technology</label>
            <div class="col-md-10">
                @foreach ($technology as $item)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $item->id }}"
                            id="tech{{ $item->id }}">
                        <label class="form-check-label" for="tech{{ $item->id }}">
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
