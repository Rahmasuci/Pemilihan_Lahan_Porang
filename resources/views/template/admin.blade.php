<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SPK Lahan Porang</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset ( 'plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset ( 'plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset ( 'plugins/toastr/toastr.min.css')}}">

  <style>
    #tabel-2, #tabel-hasil{
      display:none;
    }
  </style>

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <section>
      @yield('content')
    </section>

    <aside class="control-sidebar control-sidebar-dark"></aside>

    <footer>
      @include('layouts.footer')
    </footer>

    
  </div>

<!-- jQuery -->
<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ( 'plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('js/adminlte.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset ('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset ('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset ('plugins/toastr/toastr.min.js') }}"></script>

<!-- Data Table -->
<script>
  $(function () {
   $('#tabel').DataTable({
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<!-- Toastr -->
<script>
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
  @endif

  @if ($errors->any())
			@foreach ($errors->all() as $error)
						toastr.error("{{ $error }}");
			@endforeach
	@endif
</script>

<!-- List Lahan -->
<script>
    // disable button reset dan hitung
    function disbale_btn() {
        if (listLahan.length < 2) {
            $('#btn-result').attr('disabled', 'disabled');
        }else{
            $('#btn-result').removeAttr('disabled');
        }

        if (listLahan.length < 1) {
            $('#btn-kosong').attr('disabled', 'disabled');
        }else{
            $('#btn-kosong').removeAttr('disabled');
        }
    }

    // set table list lahan
    function set_table() {
	var gabungkan = "";
		jQuery.each(listLahan, function(index, el) {
			var no = index + 1;
			gabungkan += "<tr>"+
							"<td>"+no+"</td>"+
							"<td>"+el[0]+"</td>"+
							"<td>"+el[1]+"</td>"+
							"<td>"+el[2]+"</td>"+
							"<td>"+el[3]+"</td>"+
							"<td>"+el[4]+"</td>"+
							"<td>"+el[5]+"</td>"+
							'<td><button class="btn btn-danger" name="hapuskan" id="'+index+'">Hapus</button></td>'
							"<tr>";
	});
    // $('#tabel-2').css('display', 'block');
     $('#tabel-2').show("fast"); 
	$("#body-list").html(gabungkan);
	}

  	// Cek Nama (tidak boleh ada 2 nama lahan yang sama)
 	function cekNama(nama) {
        var nilai = false;
        jQuery.each(listLahan, function(index, val) {
            if (nama == val[0]) {
            nilai = true;
            }
        });
        return nilai;
	}

    // dapat nilai dari inputan
    var lahan = "";
		var listLahan = [];
		disbale_btn();

		$('#tambahkan').click(function(event) {
			var nama        = $('input[name="nama"]').val();
			var tekstur     = $('select[name="tekstur"]').val();
			var suhu        = $('select[name="suhu"]').val();
			var ketinggian  = $('select[name="ketinggian"]').val();
			var ph          = $('select[name="ph"]').val();
			var naungan     = $('select[name="naungan"]').val();

			if (nama == "" || tekstur == "" || suhu == "" || ketinggian == "" || ph == "" || naungan == "") {
				alert("Harap isi semua data lahan");
			}
			else if (cekNama(nama)) {
				alert("nama lahan telah ada, harap gunakan nama lain");
			}
			else{
				lahan = [nama, tekstur, suhu, ketinggian, ph, naungan];
				listLahan.push(lahan);

				set_table(); //set data input ke tabel daftar lahan 

				$('input[name="nama"]').val("");
				$('select').each(function(index, el) {
					$(this).val($(this).find("option[selected]").val() );
				});
			}
			disbale_btn();
		});

    // fungsi hapus 1 data lahan
    $('#body-list').on('click','button[name="hapuskan"]', function(event) {
			event.preventDefault();
			var index = $(this).attr('id');
			// console.log("to be deleted= "+index);
			listLahan.splice(index, 1); //hapus elemen
			
			jQuery.each(listLahan, function(index, el){
				console.log('index='+index +" "+"elemen="+el[0]);
			});
			set_table();
			disbale_btn();

        if (index==0) {
            $('#tabel-2').hide("fast"); 
        }
	});

    // fungsi tombol kosong atau reset
    $('#btn-kosong').click(function(event) {
		listLahan = [];
		set_table();
		disbale_btn();
        $('#tabel-2').hide(300); 
        $('#tabel-hasil').hide(100);    
    });
       
</script>

<!--Get Kriteria  -->
<script>
	jQuery(document).ready(function($) {
			$('#btn-result').on('click', function(event) {

				$.ajaxSetup({
					headers:{
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
					}
				});

				$.ajax({
					url		: '{{ route ('hitung') }}',
					type	: 'POST',
					dataType: 'JSON	',
					data	: {'listLahan': listLahan,
							_token: '{{csrf_token()}}'
							},
					success: function(result){
						console.log("BERHASIL");
                        // $('#tabel-hasil').css('display', 'block');
                        $('#tabel-hasil').show("fast");						var ini = $('#tabel-hasil');
						if (ini.hash != "" ) {
							event.preventDefault();
							var hash = ini.hash;
                        
							// $('html, body').animate({
							// 	scrollTop: $('#tabel-hasil').offset().top
							// }, 3000, function () {
							// 	window.location.hash = hash;
							// });

						}
						var no = 0;
						var gabungkan = "";
						var best_lahan= [result[0].nama];
						console.log(result[0]);
						jQuery.each(result, function(index, el) {
							no++;
							gabungkan += "<tr>"+
										"<td>"+no+"</td>"+
										"<td>"+el.nama+"</td>"+
										"<td>"+el.hasil+"</td>"+
										"<td>"+el.tekstur+"</td>"+
										"<td>"+el.suhu+"</td>"+
										"<td>"+el.ketinggian+"</td>"+
										"<td>"+el.ph+"</td>"+
										"<td>"+el.naungan+"</td>"+
										console.log('nilai='+el.hasil);
										console.log('nama='+el.nama);
						});
						$('#body-hasil').html(gabungkan);
					
						
					},
					error: function (result) {
						console.log(result);
					}
				});
			});
	});
</script>

</body>
</html>
