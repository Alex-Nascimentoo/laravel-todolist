@extends('layouts.main_layout')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h2><a style="text-decoration: none; color: black;" href="{{route('home')}}">To-do List</a></h2>
                <hr>
                <h3 class="text-center mb-5">Create New Task</h3>
                
                <form action="{{route('new_task_submit')}}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            
                            <div class="form-group" style="margin-bottom: 15px;">
                                <label for="text_new_task" style="margin-bottom: 10px">New task:</label>
                                <input type="text" name="text_new_task" id="text_new_task" class="form-control" placeholder="new task title">
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