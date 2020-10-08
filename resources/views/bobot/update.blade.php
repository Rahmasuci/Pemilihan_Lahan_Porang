@foreach($data as $d)
    	<div class="modal fade" id="edit-{{$d->id}}">
	        <div class="modal-dialog">
	          <div class="modal-content">
	            <div class="modal-header">
	              <h4 class="modal-title">Edit Bobot</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
	            	<form role="form"  method="post" action="{{ route('bobot.update', $d->id) }}" enctype="multipart/form-data">
	            	@method('patch')
                    @csrf
	                  	<div class="row">
		                    <div class="col-sm-6">
			                    <div class="form-group">
			                  		<label>Bobot </label>
			                        <input type="number" class="form-control" value="{{ $d->bobot }}" name="bobot">
			                    </div>
		                    </div>

							<div class="col-sm-6">
			                    <div class="form-group">
			                  		<label>Keterangan </label>
			                        <input type="text" class="form-control" value="{{ $d->keterangan }}" name="keterangan">
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
	          <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
		</div>
 @endforeach