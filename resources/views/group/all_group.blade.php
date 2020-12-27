@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-header">All groups</div>
            <?php $i = 0; ?>
            @foreach($users as $user)
            <?php $i++; ?>
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <h4><?php echo $i . ' group'; ?></h4>
                            
                            <ul class="list-group">
                                @foreach($user as $use)

                                <li class="list-group-item">
                                     <a  href="{{ url('showeditTask',$use->id) }}">
                                        {{$use->name}}
                                     </a>
                                </li>

                                @endforeach
                            </ul>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endsection