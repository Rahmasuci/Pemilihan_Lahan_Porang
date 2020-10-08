
        <div class="modal fade" id="tambah">
	        <div class="modal-dialog">
	          <div class="modal-content">
	            <div class="modal-header">
	              <h4 class="modal-title">Tambah Ketinggian</h4>
	              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	              </button>
	            </div>
	            <div class="modal-body">
	            	<form role="form"  method="post" action="{{ route('ketinggian.store') }}" enctype="multipart/form-data">
                    @csrf
	                  	<div class="row">
		                    <div class="col-sm-12">
			                    <div class="form-group">
			                  		<label>Ketinggian (mdpl)</label>
			                        <input type="text" class="form-control" placeholder="Masukkan Ketinggian" name="ketinggian">
			                        @if($errors->has('ketinggian'))
		                                <div class="text-danger">
		                                    {{ $errors->first('ketinggian')}}
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
