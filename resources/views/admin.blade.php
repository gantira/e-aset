<!DOCTYPE html>
<html lang="id">

<head>

    <link rel="shortcut icon" type="image/ico" href="{{ asset('image/favicon.ico') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>WELCOME {{ Auth::user()->profile->nama_sekolah }}</title>

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
            /*font-family: 'Droid Sans';*/
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
                <a class="navbar-brand" href="{{ url('/') }}">WELCOME  {{ Auth::user()->profile->nama_sekolah }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" onclick="window.print()">PRINT CURRENT VIEW</i></a>
                </li>
                <li class="dropdown">
                    
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                    @forelse (App\Upload::take(5)->orderBy('id', 'desc')->get() as $row)
                        <li>
                            <a href="{{ asset('upload/xls/'.$row->file_name) }}">
                                <div>
                                    <i class="fa fa-file-excel-o fa-2x" aria-hidden="true"></i>
                                    <strong>{{ $row->file_name }}</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>User <b>{{ $row->user->email }}</b> telah meng-upload file.</div>
                            </a>
                        </li>
                        @if ($loop->last)
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="javascript:void(0)">
                                    <strong>Read File</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        @endif
                    @empty
                        <li>
                            <a href="#"><b>no file have been added</b></a>
                        </li>
                    @endforelse
                       
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="javascript:void(0)">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0)">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0)">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="javascript:void(0)">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="javascript:void(0)">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="{{ url('admin/kiba') }}">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Kib A <span class="badge">{{ App\Kiba::where('status', 1)->count() }}</span>
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('admin/kibb') }}">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> Kib B <span class="badge">{{ App\KibB::where('status', 1)->count() }}</span>
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('admin/kibc') }}">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Kib C <span class="badge">{{ App\Kibc::where('status', 1)->count() }}</span>
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('admin/perpustakaan') }}">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> Perpustakaan <span class="badge">{{ App\Perpustakaan::where('status', 1)->count() }}</span>
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('admin/tumbuhanhewan') }}">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Tumbuhan & Hewan <span class="badge">{{ App\TumbuhanHewan::where('status', 1)->count() }}</span>
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('admin/kesenian') }}">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Kesenian <span class="badge">{{ App\Kesenian::where('status', 1)->count() }}</span>
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="javascript:void(0)">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="javascript:void(0)"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="{{ url('admin/setting') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
                            <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                    @if (Auth::user()->id== '1')
                        <li>
                            <a href="{{ url('admin/arsip') }}"><i class="fa fa-sitemap fa-fw"></i> Arsip</a>
                        </li>

                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-bar-chart-o fa-fw"></i> Aset<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/kiba') }}">KIB A</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/kibb') }}">KIB B</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/kibc') }}">KIB C</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">KIB D<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="{{ url('admin/perpustakaan') }}">Perpustakaan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/tumbuhanhewan') }}">Tumbuhan & Hewan</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('admin/kesenian') }}">Kesenian</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ url('admin/user') }}"><i class="fa fa-users fa-fw"></i> User</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/laporan') }}"><i class="fa fa-book fa-fw"></i> Laporan</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/sertifikat') }}"><i class="fa fa-folder-o fa-fw"></i> File Masuk</a>
                        </li>
                        
                    @else
                        
                        <li>
                            <a href="{{ url('admin/laporan') }}"><i class="fa fa-book fa-fw"></i> Laporan</a>
                        </li>
                    @endif
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
                language: "id",
                format: 'yyyy-mm-dd'
            });


            //  Page-Level Demo Scripts - Tables - Use for reference
            $('#dataTables').DataTable({
                stateSave: true,
                
            });


        });
    </script>


</body>

</html>