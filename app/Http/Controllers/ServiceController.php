<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Personnel;

use Alert;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::all();
        return view('service.index',compact('services'));
    }

   
    public function create()
    {
        $personnels = Personnel::all();
        return view('service.create',compact('personnels'));
    }

    
    public function store(Request $request)
    {
        Service::create($request->all());
        Alert::success('Success','Service ajouté avec success');
        return redirect(route('service.index'));
    }

   
    public function show($id)
    {
        $service = Service::find($id);
        return view('service.details',compact('service'));

    }

    
    public function edit($id)
    {
        $service = Service::find($id);
        $personnels = Personnel::all();

        return view('service.create',compact(['service','personnels']));
    }

    
    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->update($request->only(['nom','chef_service_id']));
        Alert::success('success','Service à été mettre ajours avec success');
        return redirect(route('service.index'));
    }

    
    public function remove($id)
    {
        $service = Service::find($id);
        $service->delete();
        Alert::success('success','Service supprime avec success');
        return redirect(route('service.index'));
    }
}
