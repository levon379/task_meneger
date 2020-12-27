@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                   <div class="row">
<div class="col-sm-12">
    <h4 class="display-4"><a class="navbar-brand" href="{{ url('/createTask') }}">
               Add new Tasks    
                </a></h4>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>User ID</td>
          <td>Project name</td>
          <td>Description</td>
          <td>Status</td>
          
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
       <?php // dd($tasks);die;?>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->user_id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->choices}}</td>
            
            <td>
                <a href="{{ route('editTask',$task->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('deleteTask', $task->id)}}" method="get">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection