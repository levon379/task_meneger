@extends('layouts.app')
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">My Task</div>

                <div class="card-body">
                   <div class="row">
                      
<div class="col-sm-12">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="accordion" id="accordionExample">
            @foreach($tasks as $task)
            
                
                <div class="card-header" id="heading{{$task->id}}">
              <h2 class="mb-0">
        <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapse{{$task->id}}"  aria-expanded="false" aria-controls="collapse{{$task->id}}">
          {{ $task->title }}
        </button>
      </h2>
            <div class="card">
                <div id="collapse{{$task->id}}" class="collapse show" aria-labelledby="heading{{$task->id}}" data-parent="#accordionExample">
                <div class="card-body">
                    <form method="POST" action="{{ route('updateMyTask',$task->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Project name') }}</label>

                            <div class="col-md-6">
                                {{ $task->title }}

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" disabled class="form-control @error('description') is-invalid @enderror" name="description"  required autocomplete="description">{{ $task->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="choices" id="exampleFormControlSelect1">
                                    <option value="not started" <?php echo $task->choices == "not started" ? "selected" : "" ?>>not started</option>
                                    <option value="in progress" <?php echo $task->choices == "in progress" ? "selected" : "" ?>>in progress</option>
                                    <option value="completed" <?php echo $task->choices == "completed" ? "selected" : "" ?>>completed</option>
                                 
                                </select>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update status') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            </div>
           
        </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
<script>
    $( document ).ready(function() {
$( "#accordionExample button" ).first().addClass( "collapsed" ).click();
  // Handler for .ready() called.
});
$('.collapse').collapse();
</script>