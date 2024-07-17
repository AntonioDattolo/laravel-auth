@extends('layouts.admin')
@include('partials.navbar')
@section('content')
<section class="d-flex flex-wrap my-5">
    <h1 class="m-3 text-center col-12">
        {{ $project->title }}
    </h1>
    <h2 class="col-12 text-center">
        {{$project->type->name}} 
    </h2>
    <p class="col-12 px-5 text-center">
       <i class="{{$project->type->icon}}" style="font-size: 50px">&nbsp;&nbsp;</i><i class="{{isset($technology[0]->icon)}}" style="font-size: 45px"></i>
    </p>
    <div class="col-12 d-flex p-3" style="border-bottom:2px solid whitesmoke; border-right: 15px solid whitesmoke ">
        <div class="text-center col-6" style="font-size: 40px">
            <p>
                {{ $project->description }}   {{$project->type->description}} 
            </p>
        </div>
        <div class="col-6 text-center">
            @if (Str::startsWith($project->img, 'http'))
            <img width="card-img-top object-fit-fill  rounded p-2" src="{{ $project['img'] }}" style="height: 350px; width :350px">
            @else
            <img width="card-img-top object-fit-fill  rounded p-2" src="{{ asset('/storage/' . $project->img) }}" style="height: 350px; width :350px">
            @endif
        </div>
    </div>
</section>
@endsection
