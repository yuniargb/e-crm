@extends('frontend.layout')
@section('content')
<div id="SignContent">
    <div class="container">
        <div class="col-md-6 ml-auto mr-auto mt-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Change Your Password</h4>
                </div>
                <div id="LoginForm">
                    <div class="card-body">
                        <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                            <form method="post" action="/password/change/{{ $plg->id }}">
                                @csrf
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $plg->email }}">
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Send Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection