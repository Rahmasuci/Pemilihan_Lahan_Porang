@extends('template.admin')

@section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sistem Pendukung Keputusan Lahan Porang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home ">Home</a></li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Masukkan Data Lahan</h3>
              </div>
              <div class="card-body">
                <!-- <form role="form"> -->
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="nama">Nama Lahan</label>
                        <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lahan" require>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="jenis">Tekstur Tanah</label>
                          <select class="form-control" name="tekstur">
                            <option value="">Pilih Tekstur Lahan</option>
                            @foreach($teksturTanah as $tt)
                            <option value="{{$tt->tekstur_tanah}}">
                              {{ $tt->tekstur_tanah}}
                            </option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="suhu">Suhu Udara (&#8451;)</label>
                        <select class="form-control" name="suhu">
                          <option value="">Piih Suhu Udara</option>
                          @foreach($suhuUdara as $su)
                            <option value="{{$su->suhu_udara}}">
                              {{ $su->suhu_udara}}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="ketinggian">Ketinggian (mdpl)</label>
                        <select class="form-control" name="ketinggian">
                          <option value="">Pilih Ketinggian</option>
                           @foreach($ketinggian as $k)
                            <option value="{{$k->ketinggian}}">
                              {{ $k->ketinggian}}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="ph">Ph Tanah</label>
                        <select class="form-control" name="ph">
                          <option value="">Piih Ph Tanah</option>
                          @foreach($phTanah as $pt)
                            <option value="{{$pt->ph_tanah}}">
                              {{ $pt->ph_tanah}}
                            </option>
                            @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="naungan">Naungan (%)</label>
                        <select class="form-control" name="naungan">
                          <option value="">Pilih Besar Naungan</option>
                          @foreach($naungan as $n)
                            <option value="{{$n->naungan}}">
                              {{ $n->naungan}}
                            </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="card-footer">
                <button class="btn btn-primary" id="tambahkan">Tambahkan</button>
              </div>
                <!-- </form> -->
            </div>
          </div>

          <div class="col-lg-12" id="tabel-2">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Lahan</h3>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lahan</th>
                      <th>Tekstur Tanah</th>
                      <th>Suhu Udara (&#8451;)</th>
                      <th>Ketinggian (mdpl)</th>
                      <th>PH Tanah</th>
                      <th>Naungan (%)</th>
								      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="body-list">
                      <!-- isi dari inputan -->
                  </tbody>
                </table>
              </div>

              <div class="card-footer">
                <button class="btn btn-warning" id="btn-kosong" disabled="">Kosongkan</button>
                <button class="btn btn-success" id="btn-result" disabled="">Hitung</button>
              </div>
            </div>
          </div>

          <div class="col-lg-12" id="tabel-hasil">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Hasil Perbandingan</h3>
              </div>

              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Rangking</th>
                      <th>Nama Lahan</th>
								      <th>Hasil</th>
                      <th>Tekstur Tanah</th>
                      <th>Suhu Udara (&#8451;)</th>
                      <th>Ketinggian (mdpl)</th>
                      <th>PH Tanah</th>
                      <th>Naungan (%)</th>
                    </tr>
                  </thead>
                  <tbody id="body-hasil">
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
@stop