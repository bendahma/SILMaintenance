@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

       <h3 class="text-center mb-2">L'Ensemble Des Machine <span style="font-weight: 800 ">{{$type->name}}</span>  </h3>

        <a href=" {{ url('/category/'. $type->id .'/create/') }} " class="mb-3 btn btn-outline-dark text-white btn-success btn-sm">Ajouté une Catégorie</a>

        <table class="table table-bordered bg-white" id="myTable">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>MTTR({{date('M')}})</th>
                    <th>MTTR({{date('Y')}})</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $c)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$c->name}} </td>
                        <td> {{$c->type->name}} </td>
                        <td> {{$c->MTTR_Monthly($c->id,date('m'),date('Y'))}} </td>
                        <td> {{$c->MTTR_Yearly($c->id,date('Y'))}} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection