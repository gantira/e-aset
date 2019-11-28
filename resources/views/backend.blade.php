<!DOCTYPE html>
<html lang="id">

<head>

    <link rel="shortcut icon" type="image/ico" href="{{ asset('image/favicon.ico') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WELCOME {{ $user->profile->nama_sekolah }}</title>

    <!-- Bootstrap Core CSS -->
    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- MetisMenu CSS -->
    {{ Html::style('bower_components/metisMenu/dist/metisMenu.min.css') }}
    <!-- DataTables CSS -->
    {{ Html::style('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{-- {{ Html::style('css/jquery.dataTables.min.css') }} --}}
    <!-- DataTables Responsive CSS -->
    {{ Html::style('bower_components/datatables-responsive/css/dataTables.responsive.css') }}
    <!-- Custom Fonts -->
    {{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}
    <!-- Timeline CSS -->
    {{ Html::style('dist/css/timeline.css') }}
    <!-- Custom CSS -->
    {{ Html::style('dist/css/sb-admin-2.css') }}
    <!-- Morris Charts CSS -->
    {{ Html::style('bower_components/morrisjs/morris.css') }}
    <!-- Datepicker CSS -->
    {{ Html::style('datepicker/css/bootstrap-datepicker3.css') }}

    <style>
        @font-face {
            font-family: "Droid Sans";
            src: url('{{ asset('font/DroidSans.ttf') }}');
        }
        
        body {
            font-family: 'Droid Sans';
        }
    </style>
    
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">WELCOME {{ $user->profile->nama_sekolah }}</a>
                <small>{{ $user->email }}</small>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        @foreach (App\Notification::orderBy('id', 'desc')->limit(5)->get() as $row)
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Admin</strong>
                                    <span class="pull-right text-muted">
                                        <em>{{ $row->created_at->diffForHumans() }}</em>
                                    </span>
                                </div>
                                <div>{{ $row->pesan }}</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        @endforeach
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('profile/edit') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        @if (Auth::user()->email == 'admin')
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-bar-chart-o fa-fw"></i> Arsip</a>
                        </li>
                        @else
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-bank fa-fw"></i> Sekolah<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('profile/edit') }}">Profile</a>
                                </li>
                              
                            </ul>
                        </li>
                        @endif
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-bar-chart-o fa-fw"></i> Aset<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('kiba') }}">KIB A</a>
                                </li>
                                <li>
                                    <a href="{{ url('kibb') }}">KIB B</a>
                                </li>
                                <li>
                                    <a href="{{ url('kibc') }}">KIB C</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">KIB D<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ url('perpustakaan') }}">Perpustakaan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('tumbuhanhewan') }}">Tumbuhan dan Hewan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('kesenian') }}">Kesenian</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('sertifikat') }}"><i class="fa fa-cloud-upload fa-fw"></i> Upload File</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @yield('content', 'default')

    </div>
    <!-- /javascript:void(0)wrapper -->

    <!-- jQuery -->
    {{ Html::script('bower_components/jquery/dist/jquery.min.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}

    <!-- Metis Menu Plugin JavaScript -->
    {{ Html::script('bower_components/metisMenu/dist/metisMenu.min.js') }}

    <!-- DataTables JavaScript -->
    {{ Html::script('bower_components/datatables/media/js/jquery.dataTables.min.js') }}
    {{ Html::script('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}

    <!-- Custom Theme JavaScript -->
    {{ Html::script('dist/js/sb-admin-2.js') }}

    <!-- Datepicker JS -->
    {{ Html::script('datepicker/js/bootstrap-datepicker.min.js') }}
    {{ Html::script('datepicker/locales/bootstrap-datepicker.id.min.js') }}

    @stack('scripts')

    <script>
        $(document).ready(function() {
            // Inisialisasi Tanggal
            $('#datepicker').datepicker({
                todayHighlight: true,
                defaultDate: 'd',
                language: "id",
                format: 'yyyy-mm-dd'
            });


            //  Page-Level Demo Scripts - Tables - Use for reference
            $('#dataTables').DataTable({
                stateSave: false,
                
            });

        });
    </script>

</body>
</html>