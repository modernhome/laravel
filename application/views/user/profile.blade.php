@layout('layouts/template')
@section('content')
	<h1>User Profile</h1>
	{{ Form::label('username', 'User Name') }}
	{{ Form::label('password', 'Password') }}
	{{ Form::label('confirm_password', 'Confirm Password') }}
	{{ Form::label('email','Email') }}
	{{ Form::label('role','Role') }}
@endsection