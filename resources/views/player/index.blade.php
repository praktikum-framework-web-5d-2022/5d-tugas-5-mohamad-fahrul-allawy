@extends('master')
@section('title','Dota 2 Player List')

@section('content')
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Dota 2 Player List</h2>
                    <form class="form-inline">
                        <a href="{{route('player.create')}}" class="btn btn-primary">Add</a>
                    </form>
                </div>
                <div class="py-4">
                    @if (session()->has('message'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                {{session()->get('message')}}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="table-responsive bdr " >
                    <table class="table table-striped">
                        <thead class="bg-primary text-white">
                            <tr align="center">
                                <th>#</th>
                                <th>Name</th>
                                <th>Nickname</th>
                                <th>Country</th>
                                <th>Position</th>
                                <th>Team</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($players as $player)
                                <tr align="center">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$player->name}}</td>
                                    <td>{{$player->nickname}}</td>
                                    <td>{{$player->detail_player->country}}</td>
                                    <td>{{$player->detail_player->position}}</td>
                                    <td>{{$player->detail_player->team}}</td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <a href="{{route('player.edit', ['player'=>$player->id])}}" class="btn btn-warning btn-block" >Edit</a>
                                            <form action="{{route('player.destroy', ['player'=>$player->id])}}" method="POST" class="ms-1">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">No data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection