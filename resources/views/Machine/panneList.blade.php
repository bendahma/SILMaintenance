@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h5 class="font-weight-bold">Lists des pannes du machine {{ $machine->category->name }} N° Serie {{ $machine->numeroSerie}} Immatriculation {{$machine->immatriculation}}</h5>
        </div>

        <table class="table table-bordered bg-white shadow" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Date Entre</td>
                    <td>Date Sortie</td>
                    <td>Durée du panne</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pannes as $key => $panne)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$panne->demandetravail->dateEntre}} </td>
                        <td> {{$panne->dateSortie}} </td>
                        <td> {{gmdate("H:i:s", $panne->dureeRegelementMinute*60) }} </td>
                        <td> <a href="" class="btn btn-success btn-block ">Details</a> </td> 
                       
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection