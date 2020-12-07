@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4>Demandé un travail</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{  route('demandeTravail.store') }}" method="POST">
                    @csrf
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
                        <input type="hidden" name="machine_id" value= "{{$machine->id}}">
                        <input type="hidden" name="mark_id"  value= "{{$machine->mark->id}}" >

                    </div>
                    <h4  class="mt-4">Details du demande de travail : </h4>

                    <div class="row">
                        <div class="col">
                            <label for="">Demandeur de travail</label>
                            <select name="declarePar" id="" class="custom-select">
                                <option value="">Select demandeur de travail</option>
                                @foreach ($personnels as $personnel)
                                    <option value=" {{$personnel->id}} "> {{$personnel->user->nom . ' ' . $personnel->user->prenom}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Date et temp d'entre</label>
                            <input type="datetime-local" name="dateEntre" id="" class="form-control">           
                        </div>
                    </div>    
                    <div class="row mt-4">
                        <div class="col">
                            <label for="">Description du panne</label>
                            <textarea name="description" id="" rows="10" class="form-control" placeholder="Description du panne"></textarea>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <input type="submit" value="Demandé le travail" class="btn btn-outline-success btn-block">
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