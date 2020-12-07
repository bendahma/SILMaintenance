@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Lists Des Machines En Panne</h3>
        </div>

        <table class="table table-bordered bg-white" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Matricule</td>
                    <td>Type</td>
                    <td>Marque</td>
                    <td>Action</td>
                    <td>Panne Réglé</td>
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
                                <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                    <option value="" selected disabled>Action</option>
                                    <option value=" {{route('machine.detailsPanne',$machine->id)}} ">Details Du Panne</option>
                                    <option value=" {{route('machine.editPanne',$machine->id)}} ">Modifier La Panne</option>
                                </select>
                        </td>        

                        <td> <a href=" {{route('panne.panneRegle',$machine->id)}} " class="btn btn-success btn-outline-dark btn-block text-white">Panne réglé</a> </td>
                        
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection