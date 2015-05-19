<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Wijzigen</h4>
			</div>
			
			<div class="modal-body">
				<div stype="padding:10px;">
				{!! Form::model($product, ['route' => 'save_product', 'id' => 'edit-product-form']) !!} 
					
					@include('admin/product/partials/_product-form', ['product' => $product, 'submit_tekst' => 'Product toevoegen'])
					
				{!! Form::close() !!}
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" id="save-product">Opslaan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
	$(document).ready(function(){
		
		// Remove existing submit button from form
		$('#edit-modal :submit').remove();
		
		$('#save-product').click(function(){
			
			$.ajax({
				url : '{!! URL::route('save_product'); !!}',
				type: 'post',
				data : $('#edit-product-form').serialize(),
				success : function(result){
					window.location.replace("{!! URL::route('products'); !!}");
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
						
						$( '#edit-product-form' ).append( errorsHtml );
					}
				}
			});
			console.log('hoi');
		});
	
	});
	</script>
	
</div>