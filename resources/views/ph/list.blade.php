@extends('template.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar PH Tanah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/tes')}}">Home</a></li>
              <li class="breadcrumb-item active">Daftar PH Tanah</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <section class="content">
    	<div class="container-fluid">
	    	<div class="row mb-3" >
	          <div class="col-sm-2">
	            <button type="button" class="btn btn-block btn-info" type="button" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> PH Tanah </button>
	          </div>
	        </div>
	    </div>
		<div class="card">
	        <div class="card-header">
	            <h3 class="card-title">
	            	Daftar PH Tanah
	            </h3>
	        </div>
		             <!-- /.card-header -->
		    <div class="card-body">
		        <table id="tabel" class="table table-bordered table-striped">
		  	    	<thead>
		                <tr>
		                	<th>#</th>	
			            	<th>PH Tanah</th>
							<!-- <th>Keterangan</th>
							<th>Bobot</th> -->
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
                                {{ $d->ph_tanah }}
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

        @include('ph.create')

        @include('ph.update')

        @include('ph.delete')


    </section>
</div>
@stop