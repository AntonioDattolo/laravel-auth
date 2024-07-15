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
            <div>NON FUNZIONA</div>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description"
                name="description" value="{{ old('description') ?? $project->description }}">
        </div>
        @error('description')
            <div>NON FUNZIONA</div>
        @enderror
        <div class="w-50 m-5">
            <label for="formGroupExampleInput2" class="form-label">Image</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Img URL" name="img"
                value="{{ old('img') ?? $project->img }}">
        </div>
        @error('img')
            <div>NON FUNZIONA</div>
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

        <button type="submit"> Modifica </button>
    </form>
@endsection
