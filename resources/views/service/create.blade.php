@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4> {{isset($service) ? 'Mettre à jours les informations du service' : 'Ajouté Nouveau Service'}}</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{ isset($service) ? route('service.update',$service->id) : route('service.store') }}" method="POST">
                    @csrf
                    @if (isset($service))
                        @method('PATCH')
                    @endif
                    <div class="row">
                        
                        <div class="col">
                            <label for="">Nom service</label>
                            <input type="text" name="nom" id="" class="form-control" placeholder="Nom du service" value="{{ isset($service) ? $service->nom : '' }}">
                            <small>La matricule d'une machine doit etre unique</small>
                        </div>

                        <div class="col">
                            <label for="">Chef service</label>
                            <select name="chef_service_id" id="" class="custom-select">
                                <option value="" disabled selected> Choisi chef du service</option>
                                @foreach ($personnels as $personne)
                                    <option value="{{ $personne->id }}">{{ $personne->user->nom . " " . $personne->user->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                   
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value=" {{isset($service) ? 'Mettre à jours' : 'Ajouté service'}} " class="btn btn-outline-success btn-block">
                        </div>
                        <div class="col">
                            <input type="reset" value="Efface" class="btn btn-danger btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection