@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

       <h3 class="text-center mb-5">Type des machines</h3>

        {{-- <a href="" class=" mb-4 btn btn-outline-dark text-white btn-success">Ajouté nouveau marque</a> --}}

        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href=" {{route('category.index',1)}} " class="flex">
                    <img src=" {{asset('images/engin.jpg')}} " alt="" class="img-fluid img-thumbnail rounded">
                    <h4 class="text-center mt-2" style="font-weight: 700; color:darkgray">Engin</h4>
                </a>
                    
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href=" {{route('category.index',2)}}" class="flex">
                    <img src=" {{asset('images/camion.jpg')}} " alt="" class="img-fluid img-thumbnail rounded">
                    <h4 class="text-center mt-2" style="font-weight: 700; color:darkgray">Camion</h4>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <a href=" {{route('category.index',3)}}" class="flex">
                    <img src=" {{asset('images/vl.jpg')}} " alt="" class="img-fluid img-thumbnail rounded">
                    <h4 class="text-center mt-2" style="font-weight: 700; color:darkgray">Vihécule Léger</h4>
                </a>
            </div>
        </div>
    </div>
@endsection