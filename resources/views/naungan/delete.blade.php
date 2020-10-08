@foreach($data as $d)	
	<div class="modal fade" id="delete-{{$d->id}}">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus Naungan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">
				<p>Apakah anda yakin ingin menghapus Naungan?</p>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
				<form action="{{ route('naungan.destroy',$d->id) }}" method="POST">   
					@csrf
					@method('DELETE')
				<button type="submit" class="btn btn-danger">Ya</button>
				</form>
			</div>
			</div>
		</div>
	</div>
@endforeach