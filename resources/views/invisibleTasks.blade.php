@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2><a style="text-decoration: none; color: black;" href="{{route('home')}}">To-do List</a></h2>
                <hr>

                @if ($tasks->count() == 0)
                    <p>No invisible tasks.</p>
                @else
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Invisible tasks</th>
                                <th>Make visible</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td style="width: 65%">{{$task->task}}</td>
                                    <td>
                                        <a href="{{route('changeVisibility', ['id'=>$task->id])}}" style="color: #383f46"><i class="fas fa-eye-slash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    
                @endif

                <div style="float: left; bottom: 20px; position: fixed; width: 98%;">
                    <hr>
                    <p>total: {{$tasks->count()}}</p>
                </div>    
                <div style="float: right;">
                    <a style="position: fixed; right: 30px; bottom: 30px;" href="{{route('home')}}" class="btn btn-primary">Back to home</a>
                </div>

            </div>
        </div>
    </div>

@endsection