<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIL - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/datatables.min.css"/>
   <!-- Custom styles for this template-->
  <link href="{{ asset('css/site.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('Dashboard')}}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIL <br/>Maintenance</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('Dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

     
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MAINTENANCE
      </div>

      <!-- Demande de travail -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('demandeTravail.index')}}" >
          <i class="far fa-file-word"></i>
          <span>Demande de Travail</span>
        </a>
      </li>

      <!-- Panne -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('panne.index')}}" >
          <i class="fas fa-wrench"></i>
          <span>Gestion des Panne</span>
        </a>  
      </li>
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        matériels
      </div>
      
      <!-- Mark -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('marque.index')}}" >
          <i class="fas fa-truck"></i>
          <span>Gestion Des Marques</span>
        </a>  
      </li>
      
      <!-- Machines -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#machine" aria-expanded="true" aria-controls="machine">
          <i class="fas fa-truck"></i>
          <span>Gestion Des Machines</span>
        </a>
        <div id="machine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action:</h6>
            <a class="collapse-item" href=" {{route('machine.create')}} "><i class="fas fa-plus"></i> Nouveau machine</a>
            <a class="collapse-item" href=" {{route('machine.index')}} "><i class="fas fa-list-ol"></i> Lists des machines</a>
          </div>
        </div>
      </li>

       

      <hr class="sidebar-divider d-none d-md-block">
      <div class="sidebar-heading">
        ressource humaines
      </div>
      <!-- Service -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-building"></i>
          <span>Gestion Du Service</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">SERVICE</h6>
            <a class="collapse-item" href=" {{route('service.create')}} "><i class="fas fa-clinic-medical"></i> Nouveau service</a>
            <a class="collapse-item" href=" {{route('service.index')}} "><i class="fas fa-dungeon"></i> Listes des service</a>            
          </div>
        </div>
      </li>

      <!-- Personnel -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#stock" aria-expanded="true" aria-controls="stock">
          <i class="fas fa-users-cog"></i>
          <span>Gestion Du Personnel</span>
        </a>
        <div id="stock" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">STOCK</h6>
            <a class="collapse-item" href=" {{route('personnel.create')}} "><i class="fas fa-user-circle"></i> Ajouté une personne</a>
            <a class="collapse-item" href=" {{route('personnel.index')}} "><i class="fas fa-id-card"></i> Listes des personnes</a>            
          </div>
        </div>
      </li>

      <!-- Heures Supplémentaire -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#supplementaireHeurs" aria-expanded="true" aria-controls="supplementaireHeurs">
          <i class="far fa-clock"></i>
          <span>Heures Supplémentaire</span>
        </a>
        <div id="supplementaireHeurs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Action:</h6>
            <a class="collapse-item" href=" "><i class="fas fa-stopwatch"></i> Ajouté Des Heures </a>
            <a class="collapse-item" href=" "><i class="fas fa-business-time"></i> Lists Des Heures</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider d-none d-md-block">
      <div class="sidebar-heading">
        
      </div>
      <!-- Stock -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#personnels" aria-expanded="true" aria-controls="personnels">
          <i class="fas fa-layer-group"></i>
          <span>Gestion Du Stock</span>
        </a>
        <div id="personnels" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Personnel</h6>
            <a class="collapse-item" href=" "> ... </a>
            <a class="collapse-item" href=" "> ... </a>
            <a class="collapse-item" href=" "> ... </a>
            <a class="collapse-item" href=" "> ... </a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{Auth::user()->nom . ' ' . Auth::user()->prenom}} </span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <form action=" {{route('logout')}} " method="post">
                  @csrf
                  <button type="submit" class="dropdown-item" >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </button>
                </form>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SIL Maintenance 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href=" {{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')


  <script src="{{asset('js/app.js')}}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/datatables.min.js"></script>
  <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });
  </script>
  
  @yield('scripts')

  <script>

      
  </script>
</body>

</html>
