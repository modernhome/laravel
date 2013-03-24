@layout('layouts/template')
@section('content')
	<h1>User Profile</h1>
	
	{{ Form::label('first_name', 'First Name : ') }}
	<div class="left"> {{ $profile->first_name }} </div>
	
	{{ Form::label('last_name', 'Last Name : ') }}
	<div class="left"> {{ $profile->last_name }} </div>

	{{ Form::label('email', 'Email : ') }}
	<div class="left"> {{ $user->email }} </div>

	{{ Form::label('telephone', 'Telephone : ') }}
	<div class="left"> {{ $profile->telephone }} </div>

	{{ Form::label('phone', 'Phone : ') }}
	<div class="left"> {{ $profile->phone }} </div>

	{{ Form::label('address', 'Address : ') }}
	<div class="left">
		{{ "No. ".$profile->number.", ".$profile->address.", ".$profile->city.", ".$profile->state.", ".$profile->country.", Zip code ".$profile->zip }}
	</div>
	{{ Form::label('about_me','About Me : ') }}
	<div class="left">{{ $profile->info }}</div>
@endsection