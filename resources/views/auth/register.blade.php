@extends('layouts.app_frontend')

@section('content')
    <!-- Register Account Start -->
    <div class="register-account ptb-100 ptb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="register-title">
                        <h3 class="mb-10">REGISTER ACCOUNT</h3>
                        <p class="mb-10">If you already have an account with us, please login at the login page.</p>
                    </div>
                </div>
            </div>
            <!-- Row End -->
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-register" method="POST">
                        @csrf
                        <fieldset>
                            <legend>Your Personal Details</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="l-name">
                                    <span class="require">*</span>Họ Tên
                                </label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" id="l-name" class="name" name="name">
                                    @if ($errors->has('name'))
                                        <div class="error text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="email">
                                    <span class="require">*</span>Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Enter you email">
                                    @if ($errors->has('email'))
                                        <div class="error text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="number"><span
                                        class="require">*</span>Phone</label>
                                <div class="col-md-10">
                                    <input type="number" class="form-control" name="phone" id="number"
                                        placeholder="Phone">
                                    @if ($errors->has('phone'))
                                        <div class="error text-danger">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Your Password</legend>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd"><span
                                        class="require">*</span>Password:</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" class="form-control" id="pwd"
                                        placeholder="Password">
                                    @if ($errors->has('password'))
                                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group d-md-flex align-items-md-center">
                                <label class="control-label col-md-2" for="pwd-confirm"><span
                                        class="require">*</span>Confirm Password</label>
                                <div class="col-md-10">
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="pwd-confirm" placeholder="Confirm password">
                                    @if ($errors->has('password'))
                                        <div class="error text-danger">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                        <button class="return-customer-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
