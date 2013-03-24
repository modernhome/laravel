<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function() {
	return View::make('home.index');
});

//Register all controllers for the application
Route::controller(Controller::detect());

//Login
Route::get('login', function() {
	if(Auth::guest())
		return View::make('user.login')->with('title', 'Login');
	else
		return Redirect::to('profile');
});
//Post login process
Route::post('login', array('before' => 'csrf', function() {
	// get our post data
	$task = Input::all();
	// create a rules array, for validating our task
	$rules = array(
		'username' => 'required|min:5|max:40',
		'password' => 'required|min:5|max:40',
	);
	// create a new validator object
	$v = Validator::make($task, $rules);
	if ($v->fails()) {
		// validation failure code
		return "Validation error";
	} else {
		$username = Input::get('username');
		$password = Input::get('password'); //	$role = 2; // 1- SuperAdmin 2 - Admin, 3 - Member
		$credentials = array('username' => $username, 'password' => $password);
		if (Auth::attempt($credentials)) {
			return Redirect::to('profile')->with('status', 'Welcome Back!');
		}
	}

}));
Route::get('register', function(){
	//Register
	return View::make('user.register')->with('title', 'Register User');
});
Route::post('register', array('before' => 'csrf', function() {
	// get our post data
	$task = Input::all();
	// create a rules array, for validating our task
	$rules = array(
		'username' => 'required|min:5|max:40',
		'password' => 'required|min:5|max:40',
	);
	// create a new validator object
	$v = Validator::make($task, $rules);
	if ($v->fails()) {
		// validation failure code
		return "Validation error";
	} else {
		$user = User::create(array(
							'username' => $task['username'], 
							'password' => Hash::make($task['password']),
							'email' => $task['email'],
							'role' => $task['role'],
				));
		Auth::login($user->id);
		return Redirect::to_route('profile')->with('status', 'Welcome To Modern Home!');

	}
}));
Route::get('profile',array('as' => 'profile', 'before' => 'auth', function() {
	return View::make('user.profile')->with('title', 'Profile');
}));

//Logout
Route::get('logout', function() {
	Auth::logout();
	return Redirect::home();
});

//filter to a number of requests whose URI’s match a admin/* like pattern
Route::filter('pattern: admin/*', 'auth');

//
Route::group(array('before' => 'auth'), function() {
	Route::get('panel', function() {
		// do stuff
	});
	Route::get('dashboard', function() {
		// do stuff
	});
});

Route::get('test', function() {
	$user = User::find(1);
	$profile = $user->profile;
	pr($user);
	//pr($profile);
});
/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});