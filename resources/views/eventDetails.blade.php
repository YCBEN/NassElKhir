@extends('layouts.app')

@section('content')
        <div class="container mt-3">
            @if (Session::has('event_permission'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('event_permission')}}
            </div>
            @elseif (Session::has('event_accepted'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('event_accepted')}}
            </div>
            @elseif (Session::has('event_sent'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('event_sent')}}
            </div>
            @elseif (Session::has('event_archived'))
            <div class="alert alert-dark" role="alert">
                {{ Session::get('event_archived')}}
            </div>
            @endif
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if ($event->image_path)
                        <div class="card">
                            <div class="card-header">
                                event Image:
                            </div>
                            <div class="card-body">
                                <img class="img-thumbnail" src="{{asset('images/'.$event->image_path)}}">
                            </div>
                        </div>   
                    @endif
                    <div class="card">
                        <div class="card-header">
                            event Details:
                        </div>
                        <div class="card-body"> 
                            
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label>event's Title: </label>
                                    <label name='title' class="form-control" >{{ $event->title}}</label>
                                </div>
                                <div class="form-group">
                                    <label>event's Description</label>
                                    <p  name="body" class="form-control" rows="3" placeholder="Enter the Containt">{{$event->description}}</p>
                                </div>
                                
                                

                                <div class="form-group">
                                    <label>Created in</label>
                                    <p  name="date" class="form-control" rows="3" placeholder="not mentioned">{{$event->created_at;
                                    }}</p>
                                </div>
                                
                               
                                
                            </form>
                            
                        </div>
                    </div> 
                   
                    
                    
                </div>
            </div>
        </div>
    
@endsection




