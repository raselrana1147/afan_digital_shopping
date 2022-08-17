@extends('layouts.app')
@section('title',config('constant.company_name').' Sing in')
@section('main')
  <main class="main-content">
    <div class="breadcrumb-wrapper">
      <nav class="breadcrumb" role="navigation" aria-label="breadcrumbs">
        <a href="index.html" title="Back to the frontpage">Home</a>
        <span aria-hidden="true">&rsaquo;</span>
        <span>Login Page</span>
      </nav>
      <h1 class="section-header__title">Login Page</h1>
    </div>
    <div class="wrapper">
      <div class="grid">
        <div class="grid__item">
          <div class="grid">
            <div class="grid__item large--one-third push--large--one-third text-center">
              <div class="note form-success" id="ResetSuccess" style="display:none;">
                 We've sent you an email with a link to update your password.
              </div>
              <div id="CustomerLoginForm" class="form-vertical">

                <form action="{{ route('login') }}" method="post">
                  @csrf
                 
                  <h3>Login</h3>
                  <label for="CustomerEmail" class="hidden-label">Email</label>
                  <input type="email" name="email" class="input-full" placeholder="Email" autocorrect="off" autocapitalize="off" autofocus="">
                  <label class="hidden-label">Password</label>
                  <input type="password" value="" name="password" class="input-full" placeholder="Password">
                  <p>
                    <input type="submit" class="btn btn2 btn--full" value="Sign In">
                  </p>
                  <p>
                    <a href="{{ route('front.index') }}">Return to Store</a>
                  </p>
                  <p>
                    <a href="#" id="createAccount">Don't Have any acccount?</a>
                  </p>
                </form>
                <script>
                  $(document).ready(function(){
                    $("a#createAccount").click(function(event){
                    event.preventDefault();
                    timber.cache.$recoverPasswordForm.show();
                    timber.cache.$customerLoginForm.hide();
                    });
                  });
                </script>
              </div>
              <div id="RecoverPasswordForm" style="display: none;">
                <h3>Create An Account</h3>
                <p>
                  This is is customer account. You can update this personal information.
                </p>
                <div class="form-vertical">
                  <form id="submit_singin" data-action="{{ route('register') }}" method="post" accept-charset="UTF-8">
                    @csrf
                    <label for="RecoverEmail" class="hidden-label">Name</label>
                    <input type="text" name="name" class="input-full" placeholder="Name">
                    <small class="valids error_name" style="color: red;"></small>

                    <label for="RecoverEmail" class="hidden-label">Email</label>
                     <input type="email" name="email" class="input-full" placeholder="E-mail">
                     <small class="valids error_email" style="color: red;"></small>

                     <label for="RecoverEmail" class="hidden-label">Phone</label>
                     <input type="text" name="phone" class="input-full" placeholder="Phone">
                     <small class="valids error_phone" style="color: red;"></small>

                     <label for="RecoverEmail" class="hidden-label">Password</label>
                     <input type="password" name="password" class="input-full" placeholder="Password">
                     <small class="valids error_password" style="color: red;"></small>

                     <label for="RecoverEmail" class="hidden-label">Confirm Password</label>
                     <input type="password" value="" name="password_confirmation" class="input-full" placeholder="Confirm Password">

                    <input type="submit" class="btn btn2" value="Submit">
                    <button type="button" id="HideRecoverPasswordLink" class="text-link btn">Back to Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@section('ecommerce_js')
  <script src="{{ asset('assets/frontend/style/js/auth.js') }}"></script>
@endsection
