@extends('layouts.default')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
						<div class="form-group">
							<label class="col-md-3 control-label">Voornaam</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Tussenvoegsel</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="insertion" value="{{ old('insertion') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Achternaam</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Adres</label>
							<div class="col-md-4">
								<input type="text" class="form-control" name="street" value="{{ old('street') }}">
							</div>
							
							<div class="col-md-3">
								<input type="text" class="form-control" name="number" placeholder="huisnummer" value="{{ old('number') }}">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="addition" placeholder="toevoeging" value="{{ old('addition') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Postcode</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="postalcode" value="{{ old('postalcode') }}">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Woonplaats</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="city" value="{{ old('city') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Wachtwoord</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Bevestig wachtwoord</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registreren
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
