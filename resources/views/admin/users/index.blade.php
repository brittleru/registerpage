<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Profile</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>
  <body class="bg-secondary">
    <div class="container" >
      <div class="row justify-content-center" style="margin-top:100px">
        <div class="col-md-8">
          <div class="card bg-dark">
            <div class="card-header text-light bg-dark" >
              All the users in the data base
              <a class="float-right" href="/logout">Logout</a>
            </div>
            <div class="card-body">

              <table class="table table-hover table-dark ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)

                    <tr>
                      <th scope="row">{{ $user->id }}</th>
                      <td>{{ $user->first }}</td>
                      <td>{{ $user->last }}</td>
                      <td>{{ implode(", ", $user->roles()->get()->pluck('name')->toArray()) }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                      {{-- @can('edit-users') --}}
                        <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn btn-primary float-left" type="button" name="button">Edit</button></a>
                      {{-- @endcan --}}
                      {{-- @can('delete-users') --}}
                        <form class="float-right" action="{{ route('admin.users.destroy', $user) }}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                      {{-- @endcan --}}
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
            {{-- <h5 class="text-light">Go To <a href="/profile">Profile</a></h5> --}}

          </div>

        </div>
      </div>
    </div>
  </body>
</html>
