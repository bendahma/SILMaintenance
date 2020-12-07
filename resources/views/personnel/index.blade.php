@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Lists Des Personnels</h3>
        </div>

        <table class="table table-bordered bg-white shadow" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Nom & Pernom</td>
                    <td>Date Naissance</td>
                    <td>Titre</td>
                    <td>Fonction</td>
                    <td>Service</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($personnels as $key => $person)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$person->user->nom . ' ' . $person->user->prenom}} </td>
                        <td> {{$person->user->dateNaissance}} </td>
                        <td> {{$person->titre}} </td>
                        <td> {{$person->fonction}} </td>
                        <td> {{$person->service->nom}} </td>
                        <td>
                            <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                <option value="" selected disabled>Action</option>
                                <option value=" {{route('personnel.show',$person->id)}} ">Details</option>
                                <option value=" {{route('personnel.edit',$person->id)}} ">Modifier</option>
                                <option value=" {{url('/personnel/remove/'.$person->id)}} ">Supprime</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection