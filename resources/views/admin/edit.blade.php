@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form action="{{ route('admin.Project.update', $project->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="w-50 m-5">
            <label for="formGroupExampleInput" class="form-label">Title</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Project Title" name="title"
                value="{{ old('title') ?? $project->title }}">
        </div>
        @error('title')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description"
                name="description" value="{{ old('description') ?? $project->description }}">
        </div>
        @error('description')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Image</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Img URL" name="img"
                value="{{ old('img') ?? $project->img }}">
        </div>
        @error('img')
        <span class="bg-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <select name="type_id" id="">
            @foreach ($type as $i => $item)
                @if($item->id == $project->type->id )
                    <option value="{{$item->id}}" selected>{{$item->name}}</option>   
                @else
                    <option value="{{$item->id}}">{{$item->name}}</option>  
                @endif
            @endforeach
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
                <span class="bg-danger" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <button type="submit"> Modifica </button>
    </form>
@endsection
