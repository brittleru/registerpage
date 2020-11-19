<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>

    <div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
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
            <hr>

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
