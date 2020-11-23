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
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $key => $machine)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$machine->matricule}} </td>
                        <td> {{$machine->machineType}} </td>
                        <td> {{$machine->mark}} </td>
                        <td>
                            <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                <option value="" selected disabled>Action</option>
                                <option value=" {{route('machine.show',$machine->id)}} ">Details</option>
                                <option value=" {{route('machine.edit',$machine->id)}} ">Modifier</option>
                                <option value=" {{url('/machine/remove/'.$machine->id)}} ">Supprime</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection