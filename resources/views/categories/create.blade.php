@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4> {{isset($category) ? 'Mettre à jours les informations du marque' : 'Ajouté Nouveau marque'}}</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{ isset($category) ? route('category.update',$category->id) : route('category.store') }}" method="POST">
                    @csrf
                    @if (isset($category))
                    @method('PATCH')
                    @endif
                   
                    <div class="row mt-3">
                       <div class="col-lg-4">
                            <label for="types">Type</label>
                            <input type="text" name="" id="" readonly value=" {{$type->name}} " class="form-control">
                            <input type="hidden" name="type_id" id="" readonly value=" {{$type->id}} " class="form-control">
                       </div>
                        <div class="col-lg-4">
                            <label for="">Category</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="Nom du marque" value="{{ isset($category) ? $category->name : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Action</label>
                            <input type="submit" value=" {{isset($category) ? 'Mettre à jours' : 'Ajouté Category'}} " class="btn btn-outline-success btn-block">
                        </div>
                    </div>
                   
                   
                </form>
            </div>
        </div>
    </div>
@endsection