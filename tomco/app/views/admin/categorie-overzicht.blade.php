@extends('layouts.admin')
@section('content')
<div id="page-inner">
	<div class="row">
		<div class="col-md-12"><h1 class="page-head-line">Categorie beheer</h1></div>
	</div>
	<div class="col-lg-9">

		<div id="categorieen">

			<div class="container-fluid">
			
			
				<table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>ID</th>
						<th>Naam</th>
						<th>Controle knoppen</th>
					</tr>
					</thead>
					<tbody>
					@foreach($categorien as $categorie)
						<tr>
							<td>{{ $categorie->getId() }}</td>
							<td>{{ $categorie->getNaam() }}</td>
							<td><a class="edit" data-cat-id="{{ $categorie->getId() }}" href="">wijzigen</a> / <a class="delete" data-cat-id="{{ $categorie->getId() }}" href="">verwijderen</a></td>
						</tr>
					@endforeach
					<tbody>
				</table>

			</div>
		</div>
		
		<div>
			<ol>
			@foreach($categorien as $cat)
				<li>{{ $cat->getNaam() }}</li>
			@endforeach
			</ol>
		</div>
		
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
	
		$('.edit').on('click', function(event) {
		event.preventDefault();
		console.log('edit')});
		$('.delete').on('click', function(event) {
		event.preventDefault();
		console.log('delete')});
		alert('hallo');
	});
</script>
@stop