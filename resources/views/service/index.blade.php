@extends('layouts.adminTemplate')

@section('content')
    <div class="container">

        <div class="">
            <h3 class="font-weight-bold">Lists Des Services</h3>
        </div>

        <table class="table table-bordered bg-white" id="myTable">
            <thead>
                <tr>
                    <td>N°</td>
                    <td>Nom De Service</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $key => $service)
                    <tr>
                        <td> {{$key = $key+1}} </td>
                        <td> {{$service->nom}} </td>
                        <td>
                            <select name="" id="" class="custom-select" onchange="window.location.href=this.value;">
                                <option value="" selected disabled>Action</option>
                                <option value=" {{route('service.edit',$service->id)}} ">Modifier</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection