<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Tambah Curah Hujan</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form role="form"  method="post" action="{{ route('curah-hujan.store') }}" enctype="multipart/form-data">
			@csrf
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Curah Hujan (mm/tahun)</label>
							<input type="text" class="form-control" placeholder="Masukkan Besar Curah Hujan" name="curah_hujan">
							@if($errors->has('hujan'))
								<div class="text-danger">
									{{ $errors->first('hujan')}}
								</div>
							@endif
						</div>
					</div>
					
					<!-- <div class="col-sm-6">
						<div class="form-group">
						<label>Keterangan</label>
						<select class="form-control" name="bobot_id">
							@foreach($bobot as $b)
							<option value="{{ $b->id}}"> 
								{{ $b->keterangan}}
							</option>
							@endforeach
						</select>
						</div>
					</div> -->
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