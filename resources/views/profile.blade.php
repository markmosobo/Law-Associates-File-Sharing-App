@extends('layouts.master')

@section('content')
    <div class="card card-primary card-outline mt-3">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('user.png')}}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->role}}</p>

                <div class="card-body" id="trial">
                        <div class="form-group">
                           <strong>Name</strong>
                            <input type="text" name="name"
                                class="form-control">
                        </div>                  

                        <div class="form-group">
                            <strong>Email</strong>
                            <input v-model="form.email" type="email" name="email"
                                class="form-control"}">
                        </div> 
                        <div class="form-group">
                            <strong>Password</strong>
                            <input type="password" name="password"
                                class="form-control">
                        </div> 
                </div>        

                <a href="#" class="btn btn-primary btn-block"><b>Update details</b></a>
              </div>
              <!-- /.card-body -->
            </div>
@endsection