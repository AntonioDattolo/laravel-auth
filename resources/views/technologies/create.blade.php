@extends('layouts.admin')
@include('partials.navbar')
@section('content')
    <form class="d-flex justify-content-center flex-wrap" action="{{ route('admin.Technology.store') }}" method="POST">
        @csrf
        <div class="col-12 m-5">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" name="name">
        </div>
        <div class="col-12 m-5">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Description"
                name="description">
        </div>
        <div class="col-12 m-5">
            <label for="formGroupExampleInput2" class="form-label">Icon</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Icon" name="icon">
        </div>
        <div class="text-center">
            <button type="submit"> ADD </button>
        </div>
    </form>
@endsection
