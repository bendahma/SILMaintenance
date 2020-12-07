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
                    <td>Matricule</td>
                    <td>Type</td>
                    <td>Marque</td>
                    <td>Demande Travail</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $key => $machine)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$machine->matricule}} </td>
                        <td> {{$machine->machineType}} </td>
                        <td> {{$machine->mark->mark}} </td>
                        <td> 
                            <a href=" {{route('demandeTravail.MachineEnPanne',$machine->id)}} " class="btn btn-danger btn-outline-dark btn-block text-white">Déclare Machine En Panne</a> </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection