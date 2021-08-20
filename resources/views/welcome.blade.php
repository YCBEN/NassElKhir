@extends('layouts.app')

@section('content')
    
        @foreach ($events as $event )
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                <div class="col-md-4">
                    <div class="card-header p-3 mt-2 bg-danger text-white">
                        {{ $event->title }}
                    </div>
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="{{ asset('images/'.$event->image_path)}}">
                        <div class="card-body">
                            <p class="card-text">{{ $event->description }}</p>
                            <hr>
                            <div class="">

                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    @if(Auth::user()&& (Auth::user()->id == $event->user_id || Auth::user()->is_admin ==1))
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    @endif
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            @endforeach


@endsection
