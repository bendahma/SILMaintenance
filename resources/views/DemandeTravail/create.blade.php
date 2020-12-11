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
                            <label for="">Immatriculation</label>
                            <input type="text" readonly class="form-control" value="{{ $machine->immatriculation }}">
                        </div>
                        <div class="col">
                            <label for="">N° Serie</label>
                            <input type="text" readonly class="form-control" value="{{ $machine->numeroSerie }}">
                        </div>
                        <div class="col">
                            <label for="">Type du machine</label>
                            <input type="text" readonly class="form-control" value= {{$machine->category->type->name}} >
                        </div>
                        <div class="col">
                            <label for="">Category du machine</label>
                            <input type="text" readonly class="form-control" value= {{$machine->category->name}} >
                        </div>
                        <input type="hidden" name="machine_id" value= "{{$machine->id}}">
                        <input type="hidden" name="category_id"  value= "{{$machine->category->id}}" >

                    </div>
                    <h4  class="mt-4">Details du demande de travail : </h4>
                    
                    <input type="text" name="numeroDemande" id="" placeholder="N° Demande de travail" class="form-control col-lg-4 my-3">

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