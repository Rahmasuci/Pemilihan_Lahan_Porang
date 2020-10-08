@foreach($data as $d)
	<div class="modal fade" id="edit-{{$d->id}}">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Suhu Udara</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form"   method="post" action="{{ route('suhu-udara.update', $d->id) }}"enctype="multipart/form-data">
				@method('patch')
				@csrf
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<label>Suhu Udara (&#8451;) </label>
								<input type="text" class="form-control" value="{{ $d->suhu_udara }} " name="suhu_udara">
							</div>
						</div>

					</div>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
	</div>
@endforeach