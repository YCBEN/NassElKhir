@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                        <h1>Events Administrations</h1> 
                        <a href="{{ route('admin') }}" class="mr-5" style='color:grey; text-decoration: none;'>All</a>
                        <a href="{{ route('pending.events')}}" class="mr-5"  style='color:grey; text-decoration: none;'>Pending</a>
                        <a href="{{ route('refused.events') }}" class="mr-5" style='color:grey; text-decoration: none;'>Refused</a>
                        <a href="{{ route('accepted.events') }}" class="mr-5" style='color:grey; text-decoration: none;'>Accepted</a>
                        <a href="{{ route('archived.events') }}" class="mr-5" style='color:grey; text-decoration: none;'>Archived</a>

                    <a href="/addEvent" class="btn btn-success btn-sm" style="float:right">Add</a>
                    <!--<a href=route('adminHome')}} class="btn btn-success btn-sm " style="float:right">Admin</a>-->
                </div>
                
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
                <div class="card-body">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    State:
                                </th>

                                <th>
                                    Title:
                                </th>

                                <th>
                                    Description:
                                </th>

                                <th>Address</th>
                                <th>Confirmed</th>
                                
                                <th>
                                    Operations
                                </th>
                                <th>
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event )
                                
                            <tr class="active">
                                @if ($event->state == 5)
                                    <td style='background-color: #800000; color:white; text-align:center'>Very high danger <br> {{$event->state}}</td>
                                @elseif($event->state == 4)
                                    <td style='background-color: #ff0000; color:white; text-align:center'>High danger<br> {{$event->state}}</td>
                                @elseif($event->state == 3)
                                    <td style='background-color: #ffa500; color:white; text-align:center'>Considerable danger<br> {{$event->state}}</td>    
                                @elseif($event->state == 2)
                                    <td style='background-color: #ffff00; color:black; text-align:center'>Moderate danger<br> {{$event->state}}</td>    
                                @elseif($event->state == 1)
                                    <td style='background-color: #90ee90; color:black; text-align:center'>No or minor danger<br> {{$event->state}}</td>    
                                    
                                @endif
                                
                                <td>{{$event->title}}</td>
                                <td style="word-break: break-all">{{$event->description}}</td>
                                <td >{{$event->adress}}</td>
                                @if ($event->accepted == 1)
                                    <td  style='background-color: #228b22; color:white; text-align:center'>{{$event->accepted}}</td>
                                @elseif($event->accepted == 0)
                                    <td  style='background-color: #FFFF00; color:black; text-align:center'>{{$event->accepted}}</td>
                                @else
                                    <td  style='background-color: black; color:white; text-align:center'>{{$event->accepted}}</td>    
                                @endif
                                <td>
                                    <a href="/events/{{$event->id}}" class="btn btn-primary btn-sm mt-1">Details</a>
                                    @if ($event->accepted != 1 )
                                    <a href="/events/accepted/{{$event->id}}" class="btn btn-success btn-sm mt-1">Accept</a>
                                    @endif
                                    @if ($event->accepted != -1 )
                                    <a href="/events/refused/{{$event->id}}" class="btn btn-danger btn-sm mt-1">Refuse</a>
                                    @endif
                                    @if ($event->accepted == -1  )
                                        <a href="/events/archived/{{$event->id}}" class="btn btn-dark btn-sm mt-1">Archive</a>
 
                                    @endif
                                    <!-- i ll add archive!-->


                                </td>
                                @if ($event->updated_at)
                                    <td>Updated in: {{$event->updated_at}}</td>
                                @else
                                    <td>Created in: {{$event->created_at}}</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection