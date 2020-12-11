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
                    <div class="row ">
                        <div class="col">
                            <label for="">Type du Machine</label>
                            <select name="type_id" class="custom-select" id="chosiType">
                                <option value="" selected disabled>Machine</option>
                                <option value="1">ENGIN</option>
                                <option value="2">CAMION</option>
                                <option value="3">VIHECULE LEGER</option>
                              
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
                        <div class="col">
                            <label for="">Model</label>
                            <input type="text" name="model" id="" class="form-control" placeholder="Model" value="{{ isset($machine) ? $machine->model : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Immatriculation</label>
                            <input type="text" name="immatriculation" id="" class="form-control" placeholder="Immatriculation" value="{{ isset($machine) ? $machine->immatriculation : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Date mise en service</label>
                            <input type="date" name="dateMiseEnService" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->dateMiseEnService : '' }}">
                        </div>
                        
                    </div>
                   
                    <div id="showEnginFields" style="display:none">
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Numero Serie</label>
                                <input type="text" name="numeroSerie" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->numeroSerie : '' }}">
                            </div>
                            <div class="col">
                                <label for="">Type</label>
                                <input type="text" name="typeField" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->typeField : '' }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Marque Moteur</label>
                                <input type="text" name="markMoteur" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->markMoteur : '' }}">
                            </div>
                            <div class="col">
                                <label for="">Type Moteur</label>
                                <input type="text" name="typeMoteur" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->typeMoteur : '' }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <label for="">Marque Transmission</label>
                                <input type="text" name="markTransmission" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->markTransmission : '' }}">
                            </div>
                            <div class="col">
                                <label for="">Type Transmission</label>
                                <input type="text" name="typeTransmission" id="" class="form-control" placeholder="" value="{{ isset($machine) ? $machine->typeTransmission : '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label for="">Observation</label>
                            <textarea name="obs" id="" rows="5" class="form-control" placeholder="Machine description">{{ isset($machine) ? $machine->obs : '' }}</textarea>
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


@section('scripts')
    <script>
            document.getElementById('chosiType').addEventListener('change',()=>{
                var e = document.getElementById("chosiType");
                var choise = e.value;
                disp = document.getElementById('showEnginFields');
                if(choise == '1') {
                    disp.style.display = '';
                }else{
                    disp.style.display = 'none';

                }
            });
    </script>
@endsection