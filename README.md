# Register Site for interview test
### Brief
This was the interview test for my first job in programing at Waydev. I had to create a web application with register, login and to not modify the tables from phpMyAdmin. 


### My solution
After I finished the task, I added some middleware’s so the user couldn’t go to different pages without being logged in first. I also added an admin and an interface for it where I used the CRUD principle, so if the user is not an admin it will be rerouted to a profile page and if the user is an admin it will be rerouted to the admin interface where he can modify a user’s data, for example name, email, or it’s role but also the admin can delete users. To create the admin I used `php artisan db:seed` so I wouldn’t create it directly in `phpMyAdmin`.

#### Screenshots from the web application

##### Welcome page
![welcome page](https://github.com/brittleru/registerpage/blob/master/readme-imgs/welcome.png?raw=true)

##### Register page
![register page](https://github.com/brittleru/registerpage/blob/master/readme-imgs/register.png?raw=true)

##### Login page
![Login page](https://github.com/brittleru/registerpage/blob/master/readme-imgs/login.png?raw=true)

##### Normal user profile page
![normal user view](https://github.com/brittleru/registerpage/blob/master/readme-imgs/user.png?raw=true)

##### Admin interface page
![the admin interface](https://github.com/brittleru/registerpage/blob/master/readme-imgs/admin-view.png?raw=true)


##### Edit user page
![the edit page](https://github.com/brittleru/registerpage/blob/master/readme-imgs/edit-user.png?raw=true)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
