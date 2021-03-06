@extends('layouts.primary')
@section('title','Patient | Reset Password')

@section('main_section')
    <style>
        body{
            background-color: #4e73df;
            background-image: linear-gradient(180deg,#4e73df 10%,#224abe 100%);
            background-size: cover;
        }
    </style>
    <div class="container">

        <div class="row justify-content-center mt-5">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Your Password?</h1>
                                    </div>
                                    <form class="user" method="post" action="{{route('patient.reset-password')}}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{$token}}">
                                        {{--<div class="form-group">--}}
                                            {{--<input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email">  <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>--}}
                                {{--</div>--}}
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter New Password..." name="password"><span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Password Again..." name="password_confirmation">
                                            <span class="text-danger">{{($errors->has('password_confirmation'))? ($errors->first('password_confirmation')) : ''}}</span>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Update Password
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('patient.register')}}">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{route('patient.login')}}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@stop