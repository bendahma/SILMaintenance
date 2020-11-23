@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4>{{ isset($personnel) ? 'Mettre à jours les informations d\' une personne' : 'Ajouté une Personne'}}</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{ isset($machine) ? route('machine.update',$machine->id) : route('machine.store') }}" method="POST">
                    @csrf
                    @if (isset($machine))
                    @method('PATCH')
                    @endif
                    <div class="row">
                        <div class="col">
                            <label for="">Nom</label>
                            <input type="text" name="nom" id="" class="form-control" placeholder="nom" value="{{ isset($personnel) ? $personnel->user->nom : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Prenom</label>
                            <input type="text" name="fonction" id="" class="form-control" placeholder="Prenom" value="{{ isset($personnel) ? $personnel->user->prenom : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Date de naissance</label>
                            <input type="date" name="dateNaissance" id="" class="form-control" placeholder="" value="{{ isset($personnel) ? $personnel->user->dateNaissance : '' }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="">Adresse</label>
                            <input type="text" name="adresse" id="" class="form-control" placeholder="Adresse" value="{{ isset($personnel) ? $personnel->user->adresse : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Commune</label>
                            <input type="text" name="commune" id="" class="form-control" placeholder="Commune" value="{{ isset($personnel) ? $personnel->user->commune : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Wilaya</label>
                            <input type="text" name="wilaya" id="" class="form-control" placeholder="WIlaya" value="{{ isset($personnel) ? $personnel->user->wilaya : '' }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="">Service</label>
                            <select name="machineType" id="" class="custom-select">
                                <option value="" selected disabled>Service</option>
                                @foreach ($services as $service)
                                    <option value=" {{$service->id}} "> {{$service->nom}} </option>
                                @endforeach
                            </select>
                            <small> <input type="checkbox" name="chefService" id=""> Chef de service</small>

                        </div>
                        <div class="col">
                            <label for="">Titre</label>
                            <input type="text" name="titre" id="" class="form-control" placeholder="Titre" value="{{ isset($personnel) ? $personnel->titre : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Fonction</label>
                            <input type="text" name="fonction" id="" class="form-control" placeholder="Fonction" value="{{ isset($personnel) ? $personnel->fonction : '' }}">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-5">
                            <label for="">Donnée la personne une access au plateform SIL Maintenance</label>
                            <select name="access" class="custom-select" id="chosiAccess">
                                <option value="" selected disabled>Choisi</option>
                                <option value="non">Non</option>
                                <option value="oui">Oui</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4" style="display:none" id="AccessGranted">
                        <div class="col">
                            <label for="">Nom d'Utilisateur</label>
                            <input type="text" name="username" id="" placeholder="Nom D'utilisateur" class="form-control">
                        </div>
                        <div class="col">
                            <label for="">Mot de passe</label>
                            <input type="password" name="password" id="" placeholder="Nom D'utilisateur" class="form-control">
                            <small>mot passe doit etre minimum 8 caractère</small>
                        </div>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value="{{isset($personnel) ? 'Mettre à jours' : 'Ajouté une personne'}}" class="btn btn-outline-success btn-block">
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

@section('scripts')
    <script>
            document.getElementById('chosiAccess').addEventListener('change',()=>{
                var e = document.getElementById("chosiAccess");
                var choise = e.value;
                disp = document.getElementById('AccessGranted');
                if(choise == 'oui') {
                    disp.style.display = 'flex';
                }else{
                    disp.style.display = 'none';

                }
            });
    </script>
@endsection