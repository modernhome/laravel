@layout('layouts/template')
@section('content')
	{{ Form::open('login', 'POST', array('id' => 'login_form', 'class' => 'login_form') ) }}
	{{ Form::token() }}
	{{ Form::label('username', 'User Name') }}
	{{ Form::text('username') }} <br/>
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }} <br/>
	{{-- Form::label('email','Email') --}}
	{{-- Form::email('email') --}}<br/>
	{{ Form::submit('submit') }}
	{{ Form::close() }}
@endsection