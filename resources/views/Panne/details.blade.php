@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Details Du Machines</h3>
        </div>

        <div class="row mt-4">
             <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text--primary text-uppercase mb-1">Nombre des pannes (Mensuelle)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text--primary text-uppercase mb-1">Nombre des pannes (Annuel)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        
        <div class="col"></div>  
        </div>

        <div class="card-card-default">
            <div class="card-header">
            </div>
            <div class="card-body bg-white rounded ">
                <form action="{{ route('machine.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="">Type de machine</label>
                            <select name="machineType" id="" class="custom-select">
                                <option value="engin" {{ isset($machine) && $machine->machineType == 'engin' ? 'selected' : '' }}>Engin</option>
                                <option value="camion" {{ isset($machine) && $machine->machineType == 'camion' ? 'selected' : '' }}>Camion</option>
                                <option value="leger" {{ isset($machine) && $machine->machineType == 'leger' ? 'selected' : '' }}>Leger</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Matricule</label>
                            <input type="text" readonly name="matricule" id="" class="form-control" placeholder="Matricule" value="{{ isset($machine) ? $machine->matricule : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Marque</label>
                            <input type="text" readonly name="mark" id="" class="form-control" placeholder="Marque" value="{{ isset($machine) ? $machine->mark : '' }}">
                        </div>
                        <div class="col">
                            <label for="">matriel</label>
                            <input type="text" readonly name="matriel" id="" class="form-control" placeholder="Matriel" value="{{ isset($machine) ? $machine->matriel : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label for="">Observation</label>
                            <textarea name="obs" readonly id="" rows="5" class="form-control" placeholder="Machine description">
                                {{ isset($machine) ? $machine->obs : '' }}
                            </textarea>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection