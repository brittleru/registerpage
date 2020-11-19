<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body class="bg-dark text-light">
    <div class="container align-items-center justify-content-center" >
      <div class="row justify-content-center center" style="margin-top:100px">
        <div class="col-md-8">
          <div class="card bg-dark" style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3); border-bottom-left-radius: 20px; border-bottom-right-radius: 20px">
            <div class="card-header text-light bg-dark" >
              Edit: {{ $user->first . " " . $user->last }}
            </div>
            <div class="card-body">
              <form class="" action="{{ route('admin.users.update', $user) }}" method="POST">

                <div class="form-group">
                  <label for="email"><strong>Email</strong></label>
                  <input type="email" name="email" class="form-control" placeholder="Change the email" value="{{ $user->email }}">
                  <span class="text-danger">@error('email') {{ $message }}  @enderror</span>
                </div>

                <div class="form-group">
                  <label for="first"><strong>First Name</strong></label>
                  <input type="text" name="first" class="form-control" placeholder="Change the first name" value="{{ $user->first }}">
                  <span class="text-danger">@error('first') {{ $message }} @enderror</span>
                </div>

                <div class="form-group">
                  <label for="last"><strong>Last Name</strong></label>
                  <input type="text" name="last" class="form-control" placeholder="Change the last name" value="{{ $user->last }}">
                  <span class="text-danger">@error('last') {{ $message }} @enderror</span>
                </div>



                  @csrf
                  {{ method_field('PUT') }}
                  <div class="form-group row">
                    <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>

                    <div class="col-md-6">
                      @foreach($roles as $role)
                        <div class="form-check">
                          <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                @if($user->roles->pluck('id')->contains($role->id))
                                  checked
                                @endif>
                          <label>{{ $role->name}}</label>
                        </div>
                      @endforeach
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="button">
                    Update
                  </button>
              </form>

            </div>
          </div>

        </div>
      </div>
    </div>
  </body>
</html>
