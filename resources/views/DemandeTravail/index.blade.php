@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Lists des machines</h3>
        </div>

        <table class="table table-bordered bg-white" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Model</td>
                    <td>Immatriculation</td>
                    <td>Type</td>
                    <td>Categorie</td>
                    <td></td>
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
                        <td> 
                            <a href=" {{route('demandeTravail.MachineEnPanne',$machine->id)}} " class="btn btn-danger btn-outline-dark btn-block text-white">Déclare Machine En Panne</a> </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection