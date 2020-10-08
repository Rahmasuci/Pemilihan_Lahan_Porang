<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Tambah Nuangan</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form role="form"  method="post" action="{{ route('naungan.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Naungan (%)</label>
							<input type="text" class="form-control" placeholder="Masukkan Besar Nuangan" name="naungan">
							@if($errors->has('naungan'))
								<div class="text-danger">
									{{ $errors->first('naungan')}}
								</div>
							@endif
						</div>
					</div>
					
				</div>

				<button type="submit" class="btn btn-primary">Save</button>
			</form>
		</div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>
