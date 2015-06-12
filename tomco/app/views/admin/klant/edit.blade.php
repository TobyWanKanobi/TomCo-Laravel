<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Wijzigen</h4>
			</div>
			
			<div class="modal-body">
				<div stype="padding:10px;">
				{!! Form::model($klant, ['route' => 'save_klant', 'id' => 'edit-klant-form']) !!} 
					
					@include('admin/klant/partials/_klant-form', ['klant' => $klant, 'submit_tekst' => 'klant toevoegen'])
					
				{!! Form::close() !!}
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="save-klant">Opslaan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	$(document).ready(function(){
		
		// Remove existing submit button from form
		$('#edit-modal :submit').remove();
		
		$('#save-klant').click(function(){
			
			$.ajax({
				url : '{!! URL::route('save_klant'); !!}',
				type: 'post',
				data : $('#edit-klant-form').serialize(),
				success : function(result){
					window.location.replace("{!! URL::route('klant'); !!}");
				},
				error: function(result) {
					
					if( result.status === 422 ) {
						//process validation errors here.
						var errors = result.responseJSON; //this will get the errors response data.
						
						//show them somewhere in the markup
						//e.g
						errorsHtml = '<div class="alert alert-danger"><ul>';

						$.each(errors, function( key, value ) {
							errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
						});
						errorsHtml += '</ul></div>';
						
						$( '#edit-klant-form' ).append( errorsHtml );
					}
				}
			});
			console.log('hoi');
		});
	
	});
	</script>
	
</div>