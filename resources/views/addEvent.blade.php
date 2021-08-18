
@extends('layouts.app')

@section('content')
    <!--if (Auth::user())-->
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add New Post
                        </div>
                        <div class="card-body">
                            
                            <form method="POST" action="{{ route('add.event')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title: </label>
                                    <input  type="text" name='title' class="form-control" placeholder="Enter the title"/>
                                    <span style="color: red">@error('title'){{ $message }}
                                        
                                    @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Description: </label>
                                    <textarea type="text" name="description" class="form-control" rows="3" placeholder="Enter the Containt"></textarea>
                                    
                                    <span style="color: red">@error('description'){{ $message }}
                                        
                                        @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Address: </label>
                                    <input  type="text" name='address' class="form-control" placeholder="Enter the place"/>
                                    <span style="color: red">@error('address'){{ $message }}
                                        
                                        @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>State: </label>
                                    <div class="centerd-flex justify-content-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="state" value="5" id="five">
                                        <label class="form-check-label" for="five">
                                          5
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="state" value="4" id="four">
                                        <label class="form-check-label" for="five">
                                          4
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="state" value="3" id="three">
                                        <label class="form-check-label" for="four">
                                          3
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="state" value="2" id="two">
                                        <label class="form-check-label" for="three">
                                          2
                                        </label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="state" value="1" id="one">
                                        <label class="form-check-label" for="two">
                                          1
                                        </label>
                                      </div>
                                    </div>
                                    <span style="color: red">@error('state'){{ $message }}
                                        
                                        @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    
                                    <input type="file" class="form-control" name="image">
                                    
                                </div>
                                <!--<input type="hidden" name="id_user" value=" Auth::user()->id ">-->
                                <hr>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-success center" value="Post">
                                </div>
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    <!-- else

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    LogIn/SingUp
                </div>
                <div class="card-body">
                    You need to be logged in
                </div>
            </div>
        </div>
    </div>
    endif-->
@endsection