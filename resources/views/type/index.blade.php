@extends('layouts.admin')
@section('content')
    <section>
        <table class="w-100">
            <thead>
                <tr>
                    <th scope="col">#</th>
                   
                    <th scope="col">Name</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Description</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($type as $i => $item)
                    <tr style="border-bottom: 0.5px solid rgb(245, 245, 245)">
                        <th scope="row">#{{ $i + 1 }}</th>
                        <td class="w-25">{{ $item['name'] }}</td>
                        <td><i class="{{ $item['icon'] }}"></i></td>
                        <td class="w-50">{{ $item['description'] }}</td>
                        <td>
                            <div class="d-flex">   
                            <a href="Type/{{$item->id}}" style="text-style:none;">
                                <button type="submit" class="badge" style="background-color: black; color: rgb(13, 65, 250)">
                                    More details
                                </button>
                            </a> 
                                <a href="Type/{{ $item->id }}/edit" style=" text-style:none;">
                                    <button type="submit" class="badge"
                                        style="background-color: black; color: rgb(11, 197, 52)">
                                        Modify
                                    </button>
                                </a>
                                {{-- <form action="{{ route('admin.Type.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="badge" style="background-color: black; color: red">Delete
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
