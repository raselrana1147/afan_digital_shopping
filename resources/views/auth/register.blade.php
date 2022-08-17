@extends('layouts.app')
@section('title',config('constant.company_name').' Sing up')
@section('main')
   <div class="main-container container">
    <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Account</a></li>
        <li><a href="#">Register</a></li>
    </ul>
    
    <div class="row">
        <div id="content" class="col-sm-12">
            <h2 class="title">Register Account</h2>
            <p>If you already have an account with us, please login at the <a href="#">login page</a>.</p>
            <form id="submit_singin" data-action="{{ route('register') }}" method="post" class="form-horizontal account-register clearfix">
                @csrf
                <fieldset id="account">
                    
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-firstname"> Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="" placeholder=" Name" class="form-control">
                             <span class="valids error_name" style="color: red;"></span>
                        </div>
                    </div>
                
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" value="" placeholder="E-Mail" class="form-control">
                             <span class="valids error_email" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-telephone">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" value="" placeholder="Phone" class="form-control">
                             <span class="valids error_phone" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-fax">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" value="" placeholder="password"  class="form-control">
                             <span class="valids error_password" style="color: red;"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-fax">Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" value="" placeholder="Confirm password"  class="form-control">
                        </div>
                    </div>
                </fieldset>
            
                
               
                <div class="buttons">
                    <div class="pull-right">
                       <button type="submit" class="btn btn-primary">Create Account</button>
                      
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
@endsection

@section('ecommerce_js')
  <script src="{{ asset('assets/frontend/style/js/auth.js') }}"></script>
@endsection
