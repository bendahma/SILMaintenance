@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4>Ajouté Une Machine En Panne </h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{ isset($machine) ? route('machine.update',$machine->id) : route('machine.store') }}" method="POST">
                    @csrf
                    @if (isset($machine))
                    @method('PATCH')
                    @endif
                    <h4>Les informations du machine : </h4>
                    <div class="row">
                        <div class="col">
                            <label for="">Matricule du machine</label>
                            <input type="text" readonly class="form-control" value="{{ $machine->matricule }}">
                        </div>
                        <div class="col">
                            <label for="">Type du machine</label>
                            <input type="text" readonly class="form-control" value= {{$machine->machineType}} >
                        </div>
                        <div class="col">
                            <label for="">Marque du machine</label>
                            <input type="text" readonly class="form-control" value= {{$machine->mark->mark}} >
                        </div>
                        
                    </div>
                    <h4  class="mt-4">Details du panne : </h4>

                    <div class="row">
                        <div class="col">
                            <label for="">Demandeur de travail</label>
                            <select name="" id="" class="custom-select">
                                <option value="">Select demandeur de travail</option>
                                @foreach ($personnels as $personnel)
                                    <option value=" {{$personnel->id}} "> {{$personnel->user->nom . ' ' . $personnel->user->prenom}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Travail fait par</label>
                            <select name="" id="" class="custom-select" >
                                <option value="">Select travail fait par qui ?</option>
                                @foreach ($personnels as $personnel)
                                    <option value=" {{$personnel->id}} "> {{$personnel->user->nom . ' ' . $personnel->user->prenom}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <label for="">Date et temp d'entre</label>
                            <input type="datetime-local" name="" id="" class="form-control">           
                        </div>
                        <div class="col">
                            <label for="">Date et temp de sortie</label>
                            <input type="datetime-local" name="" id="" class="form-control">           
                        </div>
                        
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="">Pieces changé</label>
                            <input type="text" name="" id="" class="form-control" value="" placeholder="Piece à changé">
                        </div>
                       
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <label for="">Description du panne</label>
                            <textarea name="obs" id="" rows="10" class="form-control" placeholder="Machine description"></textarea>
                        </div>
                        <div class="col">
                            <label for="">Travail fait</label>
                            <textarea name="" id=""  rows="10" class="form-control" placeholder="Trail fait pour fixé la machine"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value=" {{isset($machine) ? 'Mettre à jours' : 'Ajouté Machine'}} " class="btn btn-outline-success btn-block">
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