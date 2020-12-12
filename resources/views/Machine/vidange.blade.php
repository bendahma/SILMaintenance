@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Lists des machines</h3>
        </div>

        <table class="table table-bordered bg-white shadow" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Model</td>
                    <td>Immatriculation</td>
                    <td>Type</td>
                    <td>Category</td>
                    <td>Kilométrage</td>
                    <td>Prochaine Vidange à</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $key => $machine)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$machine->model}} </td>
                        <td> {{$machine->immatriculation}} </td>
                        <td> {{$machine->category->type->name}} </td> 
                        <td> {{$machine->category->name}} </td> 
                        <td> {{ number_format($machine->kilometrage,2,'.',' ')}} KM</td> 
                        <td> {{number_format($machine->kilometrage + config('machine.vidangeKilometrage'),2,'.',' ')}} KM</td> 
                       
                        <td>
                            <a href=" {{route('machine.editkilometrage',$machine->id)}} " class="btn btn-outline-success btn-block">Modifier kilométrage</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection