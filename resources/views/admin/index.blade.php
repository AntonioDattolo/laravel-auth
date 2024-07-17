@extends('layouts.admin')
@section('content')
    <section>
        <table class="w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Project</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Description</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $i => $item)
                    <tr style="border-bottom: 0.5px solid rgb(245, 245, 245)">
                        <th scope="row">#{{ $i + 1 }}</th>
                        <td class="p-1" style="width: 5%">
                            
                            @if (Str::startsWith($item->img, 'http'))
                            <img width="card-img-top object-fit-fill  rounded p-2" src="{{ $item['img'] }}" style="height: 100px; width :100px alt="">
                            @else
                            <img width="card-img-top object-fit-fill  rounded p-2" src="{{ asset('/storage/' . $item->img) }}" style="height: 100px; width :100px alt="">
                            @endif
                
                        </td>

                        <td class="w-25">{{ $item['title'] }}</td>

                        <td class="w-25">

                            <span>
                                {{$item->type->name}}
                            </span>

                            <span>
                                with: 
                            </span>

                            @foreach($item->technologies as $tech)
                            <span> {{$tech->name}} </span>
                            @endforeach

                        </td>

                        <td class="w-50">
                            <p>
                                {{ $item['description'] }}
                            </p>
                        </td>

                        <td>
                          <div class="d-flex">
                            
                                <a href="Project/{{$item->id}}" style="text-style:none;">
                                    <button type="submit" class="badge" style="background-color: black; color: rgb(13, 65, 250)">
                                        More details
                                    </button>
                                </a>
                                <a href="Project/{{ $item->id }}/edit" style=" text-style:none;">
                                    <button type="submit" class="badge" style="background-color: black; color: rgb(11, 197, 52)">
                                        Modify
                                    </button>
                                </a>
                               
                                <td>
                                    <button type="button" class="badge" style="background-color: black; color: red" data-bs-toggle="modal" data-bs-target="#modal-{{$item->id}}">
                                        DELETE
                                    </button>
            
                                    
                                    <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{$item->id}}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm " role="document">
                                            <div class="modal-content bg-dark">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{$item->id}}">
                                                        Delete current project
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
            
                                                <div class="modal-body text-center">
                                                    <span class="text-danger">
                                                        Are u sure? Do u want delete this? 
                                                    </span>
                                                    <strong>
                                                        {{$item->title}}  
                                                    </strong>
                                                    <br>
                                                    <span class="text-danger">
                                                        Danger, you cannot undo this operation
                                                    </span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
            
                                                    <form action="{{ route('admin.Project.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
            
                                                        <button type="submit" class="btn btn-danger">
                                                            Confirm
                                                        </button>
            
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
            
                                </td>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
