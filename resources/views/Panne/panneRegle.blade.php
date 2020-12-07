@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Reglement Du Panne : </h3>
        </div>

        <div class="card-card-default shadow">
            <div class="card-body bg-white rounded ">
                <form action=" {{route('panne.update',$panne->id)}} " method="POST">
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
                            <input type="text" readonly  name="matricule" id="" class="form-control" placeholder="Matricule" value="{{ isset($machine) ? $machine->matricule : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Marque</label>
                            <input type="text" readonly name="" id="" class="form-control" placeholder="Marque" value="{{ isset($machine) ? $machine->mark->mark : '' }}">
                            <input type="hidden" name="mark_id" value="{{ $machine->mark->id }}">
                        </div>
                        <div class="col">
                            <label for="">matriel</label>
                            <input type="text" readonly name="matriel" id="" class="form-control" placeholder="Matriel" value="{{ isset($machine) ? $machine->matriel : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Déclare par</label>
                            <input type="text" class="form-control" readonly  id="" value="{{ $personnel->user->nom . ' ' . $personnel->user->prenom }}">
                        </div>
                        <div class="col">
                            <label for="">Régle par</label>
                            <select name="reglePar" id="" class="custom-select">
                                <option selected disabled></option>
                                @foreach ($personnels as $p)
                                    <option value="{{$p->id}} "> {{$p->user->nom . ' ' . $p->user->prenom}} </option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Date d' entré</label>
                            <input type="text" class="form-control" name="dateEntre"  id="" value="{{ $demande->dateEntre }}">
                        </div>
                        <div class="col">
                            <label for="">Date de sortie</label>
                            <input type="datetime-local" class="form-control" name="dateSortie" >
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Description du panne</label>
                            <textarea name="obs" readonly  id="" rows="5" class="form-control" >{{  $demande->description }}
                            </textarea>
                        </div>
                        <div class="col">
                            <label for="">Description du travail fait</label>
                            <textarea name="travailFait"  id="" rows="5" class="form-control" placeholder="Travail fait pour régle la machine"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value=" {{'Régle la panne' }} " class="btn btn-outline-success btn-block">
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