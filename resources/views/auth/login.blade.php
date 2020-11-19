<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body class="bg-dark text-light">

    <div class="container align-items-center justify-content-center" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); border-radius: 20px;">
      <div class="row justify-content-center center" style="margin-top:100px">
        <div class="col-xs-8 col-sm-8 col-md-6 col-lg-4" style="padding: 30px">
          <form class="" action="{{ route('auth.check') }}" method="post">
            @csrf

            <div class="results">
              @if(Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
              @endif
            </div>

            <h4>Sign up to your account.</h4>
            <hr class="bg-light">

            <div class="form-group">
              <label for="email"><strong>Email</strong></label>
              <input type="email" name="email" class="form-control" placeholder="Type your email" value="{{ old('email') }}">
              <span class="text-danger">@error('email') {{ $message }}  @enderror</span>
            </div>

            <div class="form-group">
              <label for=""><strong>Password</strong></label>
              <input type="password" name="password" class="form-control" placeholder="Type your password">
              <span class="text-danger">@error('password') {{ $message }}  @enderror</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary"><strong>Login</strong></button>
            </div>
            <br>

            <p>New User? <a href="/register">Create a new Account.</a></p>

          </form>
        </div>
      </div>
    </div>

  </body>
</html>
