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
    <h2 class="display-3">Users</h2>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Email</td>
          <td>Role</td>
          <td>Project name</td>
          <td>Description</td>
          <td>Status</td>
          
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
       <?php  //dd($users);die;?>
        @foreach($users as $user)
      
        <tr>
            <td>{{$user->usersId}}</td>
            <td>{{$user->name}} </td>
            <td>{{$user->email}}</td>
            <td>{{$user->isAdmin}}</td>
            <td>{{$user->title}}</td>
            <td>{{$user->description}}</td>
            <td>{{$user->choices}}</td>
           
            <td>
              
                <a href="{{ route('editUser',$user->usersId) }}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('deleteUser', $user->usersId)}}" method="get">
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