@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4> {{isset($mark) ? 'Mettre à jours les informations du marque' : 'Ajouté Nouveau marque'}}</h4>
            </div>
            <div class="card-body bg-white rounded ">
                <form action=" {{ isset($mark) ? route('marque.update',$mark->id) : route('marque.store') }}" method="POST">
                    @csrf
                    @if (isset($mark))
                    @method('PATCH')
                    @endif
                   
                    <div class="row mt-3">
                       
                        <div class="col-lg-8">
                            <label for="">Marque</label>
                            <input type="text" name="mark" id="" class="form-control" placeholder="Nom du marque" value="{{ isset($mark) ? $mark->mark : '' }}">
                        </div>
                        <div class="col">
                            <label for="">Action</label>

                            <input type="submit" value=" {{isset($mark) ? 'Mettre à jours' : 'Ajouté mark'}} " class="btn btn-outline-success btn-block">
                        </div>
                    </div>
                   
                   
                </form>
            </div>
        </div>
    </div>
@endsection