@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Modifier Panne : </h3>
        </div>

        <div class="card-card-default shadow">
            <div class="card-body bg-white rounded ">
                <form action="{{ route('demandeTravail.update',$demande->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
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
                        <div class="col">
                            <label for="">Marque</label>
                            <input type="text" readonly name="mark" id="" class="form-control" placeholder="Marque" value="{{ isset($machine) ? $machine->mark->mark : '' }}">
                        </div>
                        <div class="col">
                            <label for="">matriel</label>
                            <input type="text" readonly name="matriel" id="" class="form-control" placeholder="Matriel" value="{{ isset($machine) ? $machine->matriel : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Déclaré par</label>
                            <input type="text" class="form-control" readonly id="" value="{{ $personnel->user->nom . ' ' . $personnel->user->prenom }}">
                        
                        </div>
                        <div class="col">
                            <label for="">Date d'entre</label>
                            <input type="text" class="form-control" name="dateEntre" id="" value="{{ $demande->dateEntre }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label for="">Description du panne</label>
                            <textarea name="description" id="" rows="5" class="form-control" placeholder="Machine description">{{  $demande->description }}
                            </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="demande_travail_id" value=" {{$demande->id}} ">
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value=" {{'Mettre à Jours La Panne' }} " class="btn btn-outline-success btn-block">
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