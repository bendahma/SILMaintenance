@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4>Mettre à jours le kilométrage du machine {{ $machine->model }}</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{route('machine.updateKilometrage',$machine->id)}}" method="POST">
                    @csrf
                    @method('PATCH')                   
                    <div class="row mt-3">
                       <div class="col-lg-4">
                            <label for="types">Model</label>
                            <input type="text" name="" id="" readonly value=" {{$machine->model}} " class="form-control">
                            <input type="hidden" name="machine_id" id="" value=" {{$machine->id}} ">
                       </div>
                       <div class="col-lg-4">
                            <label for="types">Type</label>
                            <input type="text" name="" id="" readonly value=" {{$machine->category->type->name}} " class="form-control">
                       </div>
                        <div class="col-lg-4">
                            <label for="">Category</label>
                            <input type="text" name="" id="" class="form-control" value="{{ $machine->category->name }}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-8">
                            <label for="">kilométrage</label>
                            <input type="text" name="kilometrage" id="" class="form-control" value="{{ $machine->kilometrage }}">
                        </div>
                        <div class="col">
                            <label for="">Action</label>
                            <input type="submit" value=" {{ 'Mettre à jours' }} " class="btn btn-outline-success btn-block">
                        </div>
                    </div>
                   
                   
                </form>
            </div>
        </div>
    </div>
@endsection