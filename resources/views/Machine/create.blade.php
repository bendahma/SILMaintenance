@extends('layouts.adminTemplate')

@section('content')
    <div class="container">
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
                            <label for="">Immatriculation</label>
                            <input type="text" name="immatriculation" id="" class="form-control" placeholder="Immatriculation" value="{{ isset($machine) ? $machine->immatriculation : '' }}">
                            <small>La matricule d'une machine doit etre unique</small>
                        </div>
                        <div class="col">
                            <label for="">Numero Serie</label>
                            <input type="text" name="numeroSerie" id="" class="form-control" placeholder="Numero Serie" value="{{ isset($machine) ? $machine->numeroSerie : '' }}">
                            <small>La matricule d'une machine doit etre unique</small>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for="">Type du Machine</label>
                            <select name="type_id" id="" class="custom-select">
                                <option value="" selected disabled>Machine</option>
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}" {{ isset($machine) && $machine->type_id == $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                                @endforeach
                              
                            </select>                       
                         </div>
                        <div class="col">
                            <label for="">Catégory du Machine</label>
                            <select name="category_id" id="" class="custom-select">
                                <option value="" selected disabled>Machine</option>
                                @foreach ($categories as $c)
                                    <option value="{{$c->id}}" {{ isset($machine) && $machine->category_id == $c->id ? 'selected' : '' }}>{{$c->name}}</option>
                                @endforeach
                              
                            </select>                       
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