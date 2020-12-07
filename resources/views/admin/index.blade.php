@extends('layouts.adminTemplate')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Nombres des personnes -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-secondary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombres Des Personnels</div>
                  <div class="h3 mb-0 font-weight-bold text-gray-800">{{$nbrPersonnels}}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Nombres des machine -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombres Des Machines</div>
                  <div class="h3 mb-0 font-weight-bold text-gray-800">{{$nbrMachines}}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Nombres des machine en panne -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Nombres Des Machine En Panne</div>
                  <div class="h3 mb-0 font-weight-bold text-gray-800"> {{$nbrMachineEnPanne}} </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-wrench fa-2x text-gray-300"></i>        

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>



      <!-- Content Row -->
@endsection