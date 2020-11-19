<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>

    <div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-4 col-md-offset-4">
          <form action="{{ route('auth.create') }}" method="post">
            @csrf
            <h4>Become a member</h4>
            <hr>

            <div class="results">
              @if(Session::get('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
              @endif

              @if(Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="first"><strong>First Name</strong></label>
              <input type="text" name="first" class="form-control" placeholder="Type your first name" value="{{ old('first') }}">
              <span class="text-danger">@error('first') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <label for="last"><strong>Last Name</strong></label>
              <input type="text" name="last" class="form-control" placeholder="Type your last name" value="{{ old('last') }}">
              <span class="text-danger">@error('last') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <label for="email"><strong>Email</strong></label>
              <input type="email" name="email" class="form-control" placeholder="Type your email" value="{{ old('email') }}">
              <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            </div>

            <div class="form-group">
              <label for=""><strong>Password</strong></label>
              <input type="password" name="password" class="form-control" placeholder="Choose a password" value="{{ old('password') }}">
              <span class="text-danger">@error('password') {{ $message . " It should have at least one lowercase, one uppercase, one number and one symbol!" }} @enderror</span>
            </div>

            <div class="form-group">
              <label for=""><strong>Confirm Password</strong></label>
              <input type="password" name="password2" class="form-control" placeholder="Type your password again" value="{{ old('password2') }}">
              <span class="text-danger">@error('password2') {{ "Please make sure your passwords match." }} @enderror</span>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary"><strong>Register</strong></button>
            </div>

            <div class="form-group">
              <input type="checkbox" id="terms" name="terms" value="1">
              <label for="terms">I agree to the <i><a href="#">Terms and Conditions</a></i> and the <i><a href="#">Privacy Policy</a></i>.</label>
              <span class="text-danger">@error('terms') {{ $message }} @enderror</span>
            </div>

            <br>
            <p>Do you already have an account? <a href="/login">Login here.</a></p>

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
