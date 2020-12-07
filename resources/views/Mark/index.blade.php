@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Lists des marques des machines</h3>
        </div>

        <a href="{{route('marque.create')}}" class=" mb-4 btn btn-outline-dark text-white btn-success">Ajouté nouveau marque</a>

        <table class="table table-bordered bg-white mt-4" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Mark</td>
                    <td>Nombre <br/>des machines</td>
                    <td>MTTR</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($marks as $key => $mark)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$mark->mark}} </td>
                        <td> {{$mark->markNbrMachine($mark->id)}} </td>
                        <td> {{gmdate("H:i:s", $mark->MTTR($mark->id)*60 )}} </td>
                        <td>
                            <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                <option value="" selected disabled>Action</option>
                                <option value=" {{route('marque.edit',$mark->id)}} ">Modifier</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection