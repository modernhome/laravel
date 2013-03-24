@layout('layouts/template')
@section('content')
	{{ Form::open('register', 'POST', array('id' => 'register_form', 'class' => 'register_form') ) }}
	{{ Form::token() }}
	{{ Form::label('username', 'User Name') }}
	{{ Form::text('username') }} <br/>
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }} <br/>
	{{ Form::label('confirm_password', 'Confirm Password') }}
	{{ Form::password('confirm_password') }} <br/>
	{{ Form::label('email','Email') }}
	{{ Form::email('email') }}<br/>
	{{ Form::label('role','Role') }}
	{{ Form::select('role', array(''=>'-- Select Role --', '2' => 'Admin', '3' => 'Member' )) }} <br/>
	{{ Form::submit('submit') }}
	{{ Form::close() }}
@endsection