@extends('template.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Tekstur Tanah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/tes')}}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Tekstur Tanah</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
    	<div class="container-fluid">
	    	<div class="row mb-3" >
	          <div class="col-sm-2">
	            <button type="button" class="btn btn-block btn-info" type="button" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tekstur Tanah </button>
	          </div>
	        </div>
	    </div>
		<div class="card">
	        <div class="card-header">
	            <h3 class="card-title">
	            	Daftar Tekstur Tanah
	            </h3>
	        </div>
		    <div class="card-body">
		        <table id="tabel" class="table table-bordered table-striped">
		  	    	<thead>
		                <tr>
		                	<th>#</th>	
			            	<th>Tekstur Tanah</th>
			            	<th>Action</th>
			            </tr>
		            </thead>
		           
			        <tbody>
			        	@foreach($data as $d)
				        <tr>
                            <td>
								{{ $loop->iteration }}
							</td>
				         	<td>
                                {{ $d->tekstur_tanah }}
                            </td>
				            
							<td class="project-actions">
								<button class="btn btn-warning btn-sm" type="button" data-toggle="modal" 
									data-target="#edit-{{$d->id}}"><i class="fas fa-pencil-alt"></i> Edit
								</button>
								<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" 
									data-target="#delete-{{$d->id}}"><i class="fas fa-trash-alt"></i> Delete
								</button>
							</td>
				        </tr>
				       	@endforeach
			        </tbody>
		       	</table>
		    </div>
        </div>

        @include('tanah.create')

        @include('tanah.update')

        @include('tanah.delete')


    </section>
</div>
@stop