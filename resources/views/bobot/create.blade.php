		<div class="modal fade" id="tambah">
	        <div class="modal-dialog modal-lg">
	          <div class="modal-content">
	            <div class="modal-header">
	              <h4 class="modal-title">Tambah Bobot</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
	            	<form role="form"  method="post" action="{{ route('bobot.store') }}" enctype="multipart/form-data">
                    @csrf
	                  	<div class="row">
		                    <div class="col-sm-6">
			                    <div class="form-group">
			                  		<label>Bobot</label>
			                        <input type="number" class="form-control" placeholder="Besar Bobot" name="bobot">
			                        @if($errors->has('bobot'))
		                                <div class="text-danger">
		                                    {{ $errors->first('bobot')}}
		                                </div>
		                            @endif
			                    </div>
		                    </div>

							<div class="col-sm-6">
			                    <div class="form-group">
			                  		<label>Keterangan</label>
			                        <input type="text" class="form-control" placeholder="Masukkan keterangan" name="keterangan">
			                        @if($errors->has('keterangan'))
		                                <div class="text-danger">
		                                    {{ $errors->first('keterangan')}}
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
	          <!-- /.modal-content -->
	        </div>
	        <!-- /.modal-dialog -->
        </div>
