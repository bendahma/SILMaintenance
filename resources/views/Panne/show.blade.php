@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Details Du Panne : </h3>
        </div>

        <div class="row mt-4">
            {{-- <div class="col-xl-4 col-md-6 mb-4">
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
            <div class="col"></div>   --}}
        </div>

        <div class="card-card-default shadow">
            <div class="card-body bg-white rounded ">
                <form action="" >
                    
                    <div class="row ">
                        <div class="col">
                            <label for="">Type</label>
                            <input type="text" readonly name="category" id="" class="form-control" placeholder="Marque" value="{{ isset($machine) ? $machine->category->type->name : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Category</label>
                            <input type="text" readonly name="matriel" id="" class="form-control" placeholder="Matriel" value="{{ isset($machine) ? $machine->category->name : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Model</label>
                            <input type="text" readonly id="" class="form-control" value="{{ $machine->model  }}">
                        </div>
                        <div class="col">
                            <label for="">Immatriculation</label>
                            <input type="text" readonly id="" class="form-control" value="{{ $machine->immatriculation  }}">
                        </div>
                        <div class="col">
                            <label for="">N° Serie</label>
                            <input type="text" readonly id="" class="form-control" value="{{ $machine->numeroSerie  }}">
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Déclaré par</label>
                            <input type="text" class="form-control" readonly id="" value="{{ $personnelDemande->user->nom . ' ' . $personnelDemande->user->prenom }}">
                        </div>
                        <div class="col">
                            <label for="">Réglé par</label>
                            <input type="text" class="form-control" readonly id="" value="{{ $personnelRegle->user->nom . ' ' . $personnelRegle->user->prenom }}">
                        </div>
                       
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Date d'entre</label>
                            <input type="text" class="form-control" readonly id="" value="{{ $demande->dateEntre }}">
                        </div>
                        <div class="col">
                            <label for="">Date de sortie</label>
                            <input type="text" class="form-control" readonly id="" value="{{ $panne->dateSortie }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Description du panne</label>
                            <textarea name="obs" readonly id="" rows="5" class="form-control" placeholder="Machine description">{{  $demande->description }}</textarea>
                        </div>
                        <div class="col">
                            <label for="">Description du panne</label>
                            <textarea name="obs" readonly id="" rows="5" class="form-control" placeholder="Machine description">{{  $panne->travailFait }}
                            </textarea>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection