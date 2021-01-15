@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2><a style="text-decoration: none; color: black;" href="{{route('home')}}">To-do List</a></h2>
                <hr>
                <h3 class="text-center mb-5">Editing task</h3>
                
                <form action="{{route('submitEdit')}}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" value="{{$task->id}}">

                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="text_edit" style="margin-bottom: 10px">Edit task:</label>
                                <input type="text" name="text_edit" id="text_edit" class="form-control" placeholder="edit task title" value="{{$task->task}}">
                            </div>

                            <div class="form-group">
                                <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection