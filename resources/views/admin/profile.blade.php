<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body>


    <div class="container">
      <div class="row" style="margin-top:45px">
        <div class="col-md-6 col-md-offset-3">
        <h4>Your Profile</h4>
        <hr>

          <table class="table table-hover">
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
