@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

       <h3 class="text-center mb-5">L'Ensemble Des Machine <span style="font-weight: 800 ">{{$type->name}}</span>  </h3>

        {{-- <a href="" class=" mb-4 btn btn-outline-dark text-white btn-success">Ajouté nouveau marque</a> --}}

        <div class="row mt-5">
            @foreach ($categories as $c)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href=" {{route('machine.machineList',[$type->id,$c->id])}}" class="flex">
                    <img src="{{asset($c->imageUrl)}}" alt="" class="img-fluid img-thumbnail rounded">
                    <h4 class="text-center mt-2" style="font-weight: 700; color:darkgray">{{ $c->name }}</h4>
                </a>
                    
            </div>
            @endforeach
           
            
        </div>
    </div>
@endsection