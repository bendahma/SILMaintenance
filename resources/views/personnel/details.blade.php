@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Details Du Personne</h3>
        </div>

        {{-- <div class="row mt-4">
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
        </div> --}}

        <div class="card-card-default shadow mt-4">
            <div class="card-body bg-white rounded ">
                <form action="{{ route('machine.store') }}" method="POST">
                    @csrf

                    <div class="row ">
                      <div class="col">
                        <label for="">Nom</label>
                        <input type="text" readonly class="form-control"  value="{{ $personnel->user->nom }}">
                      </div>
                      <div class="col">
                        <label for="">prenom</label>
                        <input type="text" readonly class="form-control"  value="{{ $personnel->user->prenom }}">
                      </div>
                      <div class="col">
                        <label for="">Date de naissance</label>
                        <input type="text" readonly class="form-control"  value="{{ $personnel->user->dateNaissance }}">
                      </div>
                    </div>
                    
                    <div class="row mt-4">
                      <div class="col">
                        <label for="">Adresse</label>
                        <input type="text" readonly class="form-control"  value="{{ $personnel->user->adresse }}">
                      </div>
                      <div class="col">
                        <label for="">Commune</label>
                        <input type="text" readonly class="form-control"  value="{{ $personnel->user->commune }}">
                      </div>
                      <div class="col">
                        <label for="">Wilaya</label>
                        <input type="text" readonly class="form-control"  value="{{ $personnel->user->wilaya }}">
                      </div>
                    </div>
                    

                    <div class="row mt-4">

                        <div class="col">
                            <label for="">Service</label>
                            <input type="text" class="form-control" value="{{ $personnel->service->nom }}">
                        </div>

                        <div class="col">
                            <label for="">Titre</label>
                            <input type="text" readonly class="form-control" value="{{ $personnel->titre  }}">
                        </div>

                        <div class="col">
                          <label for="">Fonction</label>
                          <input type="text" readonly class="form-control" value="{{ $personnel->fonction }}">
                        </div>

                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection