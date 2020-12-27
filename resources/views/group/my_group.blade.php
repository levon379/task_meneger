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
<h4>My group</h4>
                           <ul class="list-group">
                                <?php  //dd($users);die;?>
                            @foreach($users as $user)
                            
                            <li class="list-group-item">{{$user->name}}</li>
                           
                             @endforeach
                          </ul>
<div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection