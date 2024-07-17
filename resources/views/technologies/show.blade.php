@extends('layouts.admin')
@include('partials.navbar')
@section('content')
<section class="d-flex flex-wrap my-5">
  
    <h2 class="col-12 text-center">
        {{$technologies->name}} 
    </h2>
    <p class="col-12 px-5 text-center">
        <i class="{{$technologies->icon}}" style="font-size: 45px"></i>
    </p>
    <div class="col-12 d-flex p-3 text-center" style="border-bottom:2px solid whitesmoke; border-right: 15px solid whitesmoke ">
       
        
            <p class=" col-12 text-center">

                {{$technologies->description}}
            </p>
       
    </div>
</section>
@endsection