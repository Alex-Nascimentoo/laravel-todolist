@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2><a style="text-decoration: none; color: black;" href="{{route('home')}}">To-do List</a></h2>
                <hr>
                <div class="my-2">
                    <a href="{{route('new_task')}}" class="btn btn-primary">Create new task</a>
                    <a href="{{route('invisibleTasks')}}" class="btn btn-primary">Invisible tasks</a>
                </div>
                <hr>

                @if ($tasks->count() == 0)
                    <p>No tasks to do.</p>
                @else
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td style="width: 65%">{{$task->task}}</td>
                                    <td>
                                        {{-- done || not done --}}
                                        @if ($task->done == null)
                                            <a href="{{route('task_status', ['id' => $task->id])}}" style="margin-right: 10px" class="btn-secondary btn-sm"><i class="fas fa-check"></i></a>                                 
                                        @else
                                            <a href="{{route('task_status', ['id' => $task->id])}}" style="margin-right: 10px" class="btn-primary btn-sm"><i class="fas fa-check"></i></a>                                 
                                        @endif

                                        {{-- edit --}}
                                        <a href="{{route('editTask',['id'=>$task->id])}}" style="color: #383f46; margin-right: 10px"><i class="fas fa-pencil-alt"></i></a>

                                        {{-- visible || invisible --}}
                                        @if ($task->visible == 1)
                                            <a href="{{route('changeVisibility', ['id'=>$task->id])}}" style="color: #383f46"><i class="fas fa-eye"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div style="float: left; bottom: 5px; position: fixed; width: 98%;">
                        <hr>
                        <p>total: {{$tasks->count()}}</p>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection