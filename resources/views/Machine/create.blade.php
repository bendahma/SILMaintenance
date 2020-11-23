@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4> {{isset($machine) ? 'Mettre à jours les informations du Machine' : 'Ajouté Nouveau Machine'}}</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{ isset($machine) ? route('machine.update',$machine->id) : route('machine.store') }}" method="POST">
                    @csrf
                    @if (isset($machine))
                    @method('PATCH')
                    @endif
                    <div class="row">
                        <div class="col">
                            <label for="">Type de machine</label>
                            <select name="machineType" id="" class="custom-select">
                                <option value="" selected disabled>Machine</option>
                                <option value="engin" {{ isset($machine) && $machine->machineType == 'engin' ? 'selected' : '' }}>Engin</option>
                                <option value="camion" {{ isset($machine) && $machine->machineType == 'camion' ? 'selected' : '' }}>Camion</option>
                                <option value="leger" {{ isset($machine) && $machine->machineType == 'leger' ? 'selected' : '' }}>Leger</option>
                            
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Matricule</label>
                            <input type="text" name="matricule" id="" class="form-control" placeholder="Matricule" value="{{ isset($machine) ? $machine->matricule : '' }}">
                            <small>La matricule d'une machine doit etre unique</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Marque</label>
                            <input type="text" name="mark" id="" class="form-control" placeholder="Marque" value="{{ isset($machine) ? $machine->mark : '' }}">
                        </div>
                        <div class="col">
                            <label for="">matriel</label>
                            <input type="text" name="matriel" id="" class="form-control" placeholder="Matriel" value="{{ isset($machine) ? $machine->matriel : '' }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label for="">Observation</label>
                            <textarea name="obs" id="" rows="5" class="form-control" placeholder="Machine description">
                                {{ isset($machine) ? $machine->obs : '' }}
                            </textarea>
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