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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $c)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$c->name}} </td>
                        <td> {{$c->type->name}} </td>
                        {{-- <td> {{ gmdate("d H:i:s", $c->MTTR_Monthly( $c->id, date('m'), date('Y') ) * 60 * 24) }} </td> --}}
                        <td> {{ $c->MTTR_Monthly( $c->id, date('m'), date('Y') )}} </td>
                        
                        <td> {{$c->MTTR_Yearly($c->id,date('Y'))}} </td>
                        {{-- <td> <a href=" {{route('category.edit',[$type->id,$c->id])}} " class="btn btn-block btn-outline-success">Modifier</a> </td> --}}
                        <td> <a href=" {{url('category/'.$type->id.'/edit/'.$c->id)}}" class="btn btn-block btn-outline-success">Modifier</a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection