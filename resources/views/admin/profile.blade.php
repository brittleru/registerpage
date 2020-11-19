<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body class="bg-dark text-light">
    <div class="container align-items-center justify-content-center" >
      <div class="row justify-content-center center" style="margin-top:100px">
        <div class="col-md-6 col-md-offset-3">
        <h2>Your Profile</h2>
        {{-- <hr> --}}
            {{-- <strong>
              <h4>
                <a href="{{ route('admin.users.index') }}">
                  User Management
                </a>
              </h4>
            </strong> --}}
          <table class="table table-hover text-light">
            <thead>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
            </thead>
            <tbody>
              <tr>
                <td>{{ $LoggedUserInfo->first }}</td>
                <td>{{ $LoggedUserInfo->last }}</td>
                <td>{{ $LoggedUserInfo->email }}</td>
                <td><a href="/logout">Logout</a> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>





  </body>
</html>
