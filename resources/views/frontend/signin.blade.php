@extends('frontend.layout')
@section('content')
<div id="SignContent">
    <div class="container">
        <div class="col-md-6 ml-auto mr-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title text-center" id="LoginHeader">Sign-In</h2>
                </div>
                <div id="LoginForm">
                    <div class="card-body">
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <form method="post" action="{{ route('pelanggan.login.submit') }}">
                                @csrf
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }} ">
                                    <div class="input-icon">
                                        <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Password">
                                        <div class="text-right">
                                            <span class="input-icon-addon">
                                                <i id="showPassword" toggle="#loginPassword" class="fa fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('password') }}</small>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-outline-danger btn-block">Sign In</button>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <hr class="line">
                                    </div>
                                    <div class="col-2">
                                        <p class="text-center">Or</p>
                                    </div>
                                    <div class="col-5">
                                        <hr class="line">
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-center">
                                        <a href="/sign/google" class="btn-google"><i class="fab fa-google-plus-g"></i> Sign with Google</a>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <p>Want to have an account? <a href="#" id="SignUp" class="text-primary">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="SignUpForm">
                    <div class="card-body">
                        <form method="post" action="{{ route('pelanggan.register.submit') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="namer" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="Mobile Number">
                            </div>
                            <div class="form-group">
                                <input type="text" name="emailr" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="passwordr" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-danger btn-block">Register</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            <p>Already have an account? <a href="#" id="LogIn" class="text-primary">Sign-In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection