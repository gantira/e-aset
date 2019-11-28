<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ config('app.name') }}</title>
	<link rel="shortcut icon" type="image/ico" href="{{ asset('image/favicon.ico') }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  
	<!-- Bootstrap Core CSS -->
	{{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
	<!-- MetisMenu CSS -->
	{{ Html::style('bower_components/metisMenu/dist/metisMenu.min.css') }}
	<!-- Custom CSS -->
	{{ Html::style('dist/css/sb-admin-2.css') }}
	<!-- Custom Fonts -->
	{{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}
	<!-- Morris Charts CSS -->
	{{ Html::style('bower_components/morrisjs/morris.css') }}

	<style>
		@font-face {
	       font-family: "Droid Sans";
	       src: url('{{ asset('font/DroidSans.ttf') }}');
	    }
	    
	    body {
	        /*font-family: 'Droid Sans';*/
	    }

		/* Remove the navbar's default margin-bottom and rounded borders */ 
		.navbar {
		  margin-bottom: 0;
		  border-radius: 0;
		}
		
		/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		.row.content {height: 450px}
		
		/* Set gray background color and 100% height */
		.sidenav {
		  padding-top: 20px;
		  background-color: #f1f1f1;
		  height: 350%;
		}
		
		/* Set black background color, white text and some padding */
		footer {
		  background-color: #555;
		  color: white;
		  padding: 15px;
		}
		
		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
		  .sidenav {
			height: auto;
			padding: 15px;
		  }
		  .row.content {height:auto;} 
		}

		.carousel-inner > .item > img,
		.carousel-inner > .item > a > img {
		  width: 50%;
		  margin: auto;
		}

  </style>

</head>

<body>

	<div class="container-fluid text-center">
		<h1><img src="{{ asset('image/dinas.png') }}" height="50" class="pull-left">Aset Dinas Pendidikan Kabupaten Bandung<img src="{{ asset('image/dinas.png') }}" height="50" class="pull-right"></h1>
	</div>

	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#">E-Aset</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class= "active"> <a href="frontend">Home</a></li>
			<li><a href="about">About</a></li>
			<li><a href="projetc">Projects</a></li>
			<li><a href="contack">Contact</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="#" onclick="login()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		  </ul>
		</div>
	  </div>
	</nav>
	  
	<div class="container-fluid text-center">    
	  <div class="row content">
		<div class="col-sm-2 sidenav">
		  <p><a href="#"><span class="fa fa-globe"> Website</span></a></p>
		  <p><a href="#"><span class="fa fa-facebook"> Facebook</span></a></p>
		  <p><a href="#"><span class="fa fa-twitter"> Twitter</span></a></p>
		</div>
		<div class="col-sm-8 text-left"> 
			@if (Session::has('message'))
				<div class="alert alert-warning">{{ Session::get('message') }}</div>
			@elseif(Session::has('login'))
				<div class="alert alert-danger"><strong>{{ Session::get('login') }} </strong></div>
			@endif
			@include('errors.lists', ['some' => 'data'])
			<h1>Pemberitaan</h1>
			<p>Visi dan Misi Dinas Pendidikan dan Kebudayaan</p>
			<p>Visi <br>
			Terselenggaranya layanan prima pendidikan dalam membentuk insan kamil yang mengedepankan nilai nilai budaya lokal dengan beroritentasi global
			</p>
			<p>Misi <br>
			1. Meningkatkan Ketersediaan, keterjangkauan, kualitas, kesetaraan, dan Kepastian / keterjaminan layanan pendidikan. <br>
			2. Mengembangkan kebudayaan yang berkarakter dari dimensi estetika, logika, etika dan historika. <br>
			3. Menindkatkan pencitraan public melalui tatakelola, transparansi dan akuntabilitas - See more at: <a href="http://www.bandungkab.go.id/arsip/2115/visi-dan-misi-dinas-pendidikan-dan-kebudayaan#stahsh.18oGY2jDdpuf" target="_blank">http://www.bandungkab.go.id/arsip/2115/visi-dan-misi-dinas-pendidikan-dan-kebudayaan#stahsh.18oGY2jDdpuf</a>
			</p>
			<hr>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="image/1.jpg" alt="Logo Kabupaten Bandung" width="50px">
			      <div class="carousel-caption">
			       <h3>Logo Kabupaten Bandung</h3>
			        <p>Logo kabupaten bandung di dasari oleh..........</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="image/2.jpg" alt="Kantor Kabupaten Bandung" width="50px">
			      <div class="carousel-caption">
			        <h3>Kantor Kabupaten Bandung</h3>
			        <p>Kantor Kabupaten Bandung didirikan .......</p>
			      </div>
			    </div>
			    <div class="item">
			      <img src="image/3.jpg" alt="Logo Dinas Pendidikan Kabupaten Bandung" width="50px">
			      <div class="carousel-caption">
			        <h3>Logo Dinas Pendidikan Kabupaten Bandung</h3>
			        <p>Logo Dinas Pendidikan Kabupaten Bandung ini didasari .........</p>
			      </div>
			    </div>

			    <div class="item">
			      <img src="image/4.jpg" alt="Flower">
			      <div class="carousel-caption">
			        <h3>Kepala Dinas Pendidikan Kabupaten Bandung </h3>
			        <p>H.JUHANA</p>
			      </div>
			    </div>
			  </div>
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>

			<br>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
               		<div class="panel panel-default">
               			<div class="panel-heading">
               				Pie Chart
               			</div>
               			
               			<div class="panel-body">
               				<div class="flot-chart">
		            			<div class="flot-chart-content" id="flot-pie-chart"></div>
               				</div>
                   		</div>
			        </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-6">
                   
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                   
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                   
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-12">
                   
                </div>

                <div class="col-lg-12">
                	<div class="panel panel-default">
                		<div class="panel-heading">
                			Data Yayasan
                		</div>
                		<div class="panel-body">

							<table class="table table-bordered table-condensed">
		                		<thead>
		                			<tr>
		                				<th>No</th>
		                				<th>Nama Sekolah</th>
		                				<th>Status</th>
		                				<th>NSS</th>
		                				<th>Email</th>
		                				<th>Tahun Pendirian</th>
		                				<th>Kurikulum</th>
		                				<th>Kepala Sekolah</th>
		                				<th>Komite Sekolah</th>
		                			</tr>
		                		</thead>
		                		<tbody>
		                		@foreach ($user as $no => $row)
		                			<tr>
		                				<td>{{ $no+1 }}</td>
		                				<td>{{ $row->profile->nama_sekolah }}</td>
		                				<td>{{ $row->profile->status }}</td>
		                				<td>{{ $row->profile->nss }}</td>
		                				<td>{{ $row->email }}</td>
		                				<td>{{ $row->profile->tahun_pendirian }}</td>
		                				<td>{{ $row->profile->kurikulum }}</td>
		                				<td>{{ $row->profile->kepsek }}</td>
		                				<td>{{ $row->profile->komsek }}</td>
		                			</tr>
		                		@endforeach
		                		</tbody>
		                	</table>

                		</div>
                	</div>
                	{{-- panel --}}
            	</div>
                	
            </div>
        </div>
        <!-- /.row -->

		<div class="col-sm-2 sidenav">
	  <div class="well">
		<p>Repeh Rapih Kerta Raharja</p>
	  </div>
	  <div class="well">
		<p>Sabilulungan Sauyunan</p>
	  </div>
	</div>
  </div>
</div>


	<footer class="footer">
      <div class="container text-center">
        <address>
		  <strong>Pemerintah Kabupaten Bandung</strong><br>
		</address>
      </div>
    </footer>




	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header" align="center">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">E-Aset Negara Sekolah Menengah Atas</h4>
			<h3>Dinas Pendidikan Kabupaten Bandung</h3>
		  </div>
		  <div class="modal-body">
			{{ Form::open(['url'=>'login', 'method'=>'post']) }}
				
			<table width="100%" border="0">

					<td width="60%" align="center"><img src="{{ asset('image/dinas.png') }}" height="150"</td>
					<td>
						<label>Email</label>
						{{ Form::text('email', null, ['class'=>'form-control']) }}
						<label>Password</label>
						{{ Form::password('password', ['class'=>'form-control']) }}
						<a href="#" onclick="register()">Registrasi</a>
						<a href="#" class="pull-right">Lupa Password</a>
					</td>
				</tr>
			</table>
		  </div>
		  <div class="modal-footer">
			{{ Form::submit('Login', ['class'=>'btn btn-default']) }}
			{{ Form::close() }}
		  </div>
		</div>

	  </div>
	</div>

	<!-- Modal -->
	<div id="myRegister" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header" align="center">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">E-Aset Negara Sekolah Menengah Atas</h4>
			<h3>Registrasi</h3>
		  </div>
		  <div class="modal-body">
			{{ Form::open(['url'=>'registrasi', 'method'=>'post']) }}
				<div class="form-group">
					{{ Form::label('no_id', null, ['class'=>'control-label']) }}
					{{ Form::text('no_id', App\User::count()+1, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('no_hp', null, ['class'=>'control-label']) }}
					{{ Form::number('no_hp', null, ['class'=>'form-control', 'required']) }}
				</div>
				<div class="form-group">
					{{ Form::label('email', null, ['class'=>'control-label']) }}
					{{ Form::email('email', null, ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password', null, ['class'=>'control-label']) }}
					{{ Form::password('password', ['class'=>'form-control']) }}
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', null, ['class'=>'control-label']) }}
					{{ Form::password('password_confirmation', ['class'=>'form-control']) }}
				</div>
			
		  </div>
		  <div class="modal-footer">
			{{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
			{{ Form::submit('Daftar', ['class'=>'btn btn-danger']) }}
			{{ Form::close() }}
		  </div>
		</div>

	  </div>
	</div>

	<!-- jQuery -->
	{{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
	<!-- Bootstrap Core JavaScript -->
	{{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
	<!-- Metis Menu Plugin JavaScript -->
	{{ Html::script('bower_components/metisMenu/dist/metisMenu.min.js') }}
	<!-- Flot Charts JavaScript -->	
	{{ Html::script('bower_components/flot/excanvas.min.js') }}
	{{ Html::script('bower_components/flot/jquery.flot.js') }}
	{{ Html::script('bower_components/flot/jquery.flot.pie.js') }}
	{{ Html::script('bower_components/flot/jquery.flot.resize.js') }}
	{{ Html::script('bower_components/flot/jquery.flot.time.js') }}
	{{ Html::script('bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js') }}
	{{-- {{ Html::script('js/flot-data.js') }} --}}

	<!-- Custom Theme JavaScript -->
	{{ Html::script('dist/js/sb-admin-2.js') }}

	<script >
		function login() {
			$('#myModal').modal('show');
		}

		function register() {
			$('#myModal').modal('hide');
			$('#myRegister').modal('show');
		}

		//Flot Pie Chart
		$(function() {

		    var data = [{
		        label: "Kib A",
		        data: {{ App\Kiba::count() }}
		    }, {
		        label: "Kib B",
		        data: {{ App\Kibb::count() }}
		    }, {
		        label: "Kib C",
		        data: {{ App\KibC::count() }}
		    }, {
		        label: "Perpustakaan",
		        data: {{ App\Perpustakaan::count() }}
		    }, {
		        label: "Tumbuhan & Hewan",
		        data: {{ App\TumbuhanHewan::count() }}
		    }, {
		        label: "Kesenian",
		        data: {{ App\Kesenian::count() }}
		    }];

		    var plotObj = $.plot($("#flot-pie-chart"), data, {
		        series: {
		            pie: {
		                show: true
		            }
		        },
		        grid: {
		            hoverable: true
		        },
		        tooltip: true,
		        tooltipOpts: {
		            content: "%p.0%, %s", // show percentages, rounding to 2 decimal places
		            shifts: {
		                x: 20,
		                y: 0
		            },
		            defaultTheme: true
		        }
		    });

		});


	</script>

</body>
</html>
