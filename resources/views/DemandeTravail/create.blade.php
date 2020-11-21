@extends('layouts.adminTemplate')

@section('content')
    <div class="">
        <div class="card-card-default">
            <div class="card-header">
                <h4>Demandé un travail</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('demandeTravail.store') }}" method="POST">
                    @csrf
                    
                </form>
            </div>
        </div>
    </div>
@endsection