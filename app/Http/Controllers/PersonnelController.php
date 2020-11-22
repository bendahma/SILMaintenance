<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnels;

class PersonnelController extends Controller
{
    
    public function index()
    {
        $personnels = Personnel::all();
        return view('personnel.index')->with('personnels',$personnels);
    }

    
    public function create()
    {
        return view('personnel.create');
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        $personnel = Personnel::find($id);
        return view('personnel.details')->with('personnel',$personnel);
    }

    
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        return view('personnel.create')->with('personnel',$personnel);
    }

    
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        Alert::success('Success','Personne supprime avec success');
        return redirect(route('personnel.index'));
    }
}
