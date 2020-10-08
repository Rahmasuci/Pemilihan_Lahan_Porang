
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Tambah PH Tanah</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form role="form"  method="post" action="{{ route('ph-tanah.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>PH Tanah</label>
							<input type="text" class="form-control" placeholder="Masukkan PH Tanah" name="ph_tanah">
							@if($errors->has('ph_tanah'))
								<div class="text-danger">
									{{ $errors->first('ph_tanah')}}
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
