@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Details Du Machines</h3>
        </div>

        <div class="row mt-4">
             <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text font-weight-bold text--primary text-uppercase mb-1">Nombre Des Pannes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <a href=" {{route('machines.panneList',$machine->id)}} ">{{$machine->NbrPanne($machine->id)}}</a>
                      </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text font-weight-bold text--primary text-uppercase mb-1">MTBF</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{gmdate("H:i:s", $machine->mtbf($machine->id)*60 )}}</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    </div>
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

        <div class="card-card-default shadow">
            
            <div class="card-body bg-white rounded ">
                <form action="">
                    
                    <div class="row">
                        <div class="col">
                            <label for="">Type de machine</label>
                            <input type="text" readonly value=" {{$machine->category->type->name}}" class="form-control">
                        </div>
                        <div class="col">
                            <label for="">Category du machine</label>
                            <input type="text" name="" readonly id="" value=" {{$machine->category->name}} " class="form-control">
                        </div>
                    </div>
                  
                  <div class="row mt-3">
                      <div class="col">
                          <label for="">Model</label>
                          <input type="text" readonly name="model" id="" class="form-control" placeholder="Model" value="{{ isset($machine) ? $machine->model : '' }}">
                      </div>
                      <div class="col">
                          <label for="">Immatriculation</label>
                          <input type="text" name="immatriculation" readonly id="" class="form-control" placeholder="Immatriculation" value="{{ isset($machine) ? $machine->immatriculation : '' }}">
                      </div>
                      <div class="col">
                          <label for="">Date mise en service</label>
                          <input type="date" name="dateMiseEnService" readonly id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->dateMiseEnService : '' }}">
                      </div>
                      
                  </div>
                   
                  @if ($machine->type_id == 1)
                        <div id="showEnginFields">
                          <div class="row mt-3">
                              <div class="col">
                                  <label for="">Numero Serie</label>
                                  <input type="text"  name="numeroSerie" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->numeroSerie : '' }}">
                              </div>
                              <div class="col">
                                  <label for="">Type</label>
                                  <input type="text" readonly name="typeField" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->typeField : '' }}">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col">
                                  <label for="">Marque Moteur</label>
                                  <input type="text" readonly name="markMoteur" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->markMoteur : '' }}">
                              </div>
                              <div class="col">
                                  <label for="">Type Moteur</label>
                                  <input type="text" readonly  name="typeMoteur" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->typeMoteur : '' }}">
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col">
                                  <label for="">Marque Transmission</label>
                                  <input type="text" readonly name="markTransmission" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->markTransmission : '' }}">
                              </div>
                              <div class="col">
                                  <label for="">Type Transmission</label>
                                  <input type="text" readonly name="typeTransmission" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->typeTransmission : '' }}">
                              </div>
                          </div>
                      </div>
                  @endif
                   
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