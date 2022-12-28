@extends('master')
@section('title','Add Dota 2 Player List')

@section('content')
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Add Data</h2>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('player.store')}}" method="POST">
                    @csrf
                    <div class="form-row py-4">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name"class="form-control" value="{{old('name')}}">
                                    @error('name')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                    <div class="col">
                                    <label for="nickname" class="form-label">Nickname</label>
                                    <input type="text" name="nickname" id="nickname" class="form-control" value="{{old('nickname')}}">
                                    @error('nickname')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col my-3">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control" value="{{old('country')}}">
                                    @error('country')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col my-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" name="position" id="position" class="form-control" value="{{old('position')}}">
                                    @error('position')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col my-3">
                                    <label for="team" class="form-label">Team</label>
                                    <input type="text" name="team" id="team" class="form-control" value="{{old('team')}}">
                                    @error('team')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            <div class="d-flex flex-row-reverse py-3">
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection