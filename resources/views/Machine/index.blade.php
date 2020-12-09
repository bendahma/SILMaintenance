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
                    <td>Immatriculation</td>
                    <td>Numero Serie</td>
                    <td>Type</td>
                    <td>Category</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($machines as $key => $machine)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$machine->immatriculation}} </td>
                        <td> {{$machine->numeroSerie}} </td>
                        <td> {{$machine->category->type->name}} </td> 
                        <td> {{$machine->category->name}} </td> 
                       
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