<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Wijzigen</h4>
			</div>
			
			<div class="modal-body">
				<div stype="padding:10px;">
				{!! Form::model($product, ['route' => 'store_product', 'class' => '']) !!}
					
					@include('admin/product/partials/_product-form', ['product' => $product, 'submit_tekst' => 'Product toevoegen'])
					
				{!! Form::close() !!}
				</div>
			</div>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Annuleer</button>
			</div>
		</div>
	</div>
	
</div>