<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Personnel;
use App\Models\Service;
use Alert;
class PersonnelController extends Controller
{
    
    public function index()
    {
        $personnels = Personnel::all();
        return view('personnel.index')->with('personnels',$personnels);
    }

    
    public function create()
    {
        $services = Service::all();
        return view('personnel.create')->with('services',$services);
    }

    
    public function store(Request $request)
    {
        $user = User::create([
            'nom' => $request->nom ,
            'prenom' => $request->prenom ,
            'dateNaissance' => $request->dateNaissance ,
            'adresse' => $request->adresse ,
            'commune' => $request->commune ,
            'wilaya' => $request->wilaya ,
        ]);

        if($request->has('access') && $request->access == 'oui'){
            $user->update([
                'username'=>$request->username,
                'password'=> Hash::make($request->password),
            ]);
        }

        $personnel = Personnel::create([
            'user_id' => $user->id ,
            'fonction' => $request->fonction ,
            'titre' => $request->titre ,
            'service_id' => $request->service_id ,
        ]);

        Alert::success('Success','Une nouvelle personnee ajouté avec success');

        return redirect(route('personnel.index'));
    }

    
    public function show($id)
    {
        $personnel = Personnel::find($id);
        return view('personnel.details')->with('personnel',$personnel);
    }

    
    public function edit($id)
    {
        $personnel = Personnel::find($id);
        $services = Service::all();

        return view('personnel.create')
                    ->with('personnel',$personnel)
                    ->with('services',$services);
    }

    
    public function update(Request $request, $id)
    {
        $personnel = Personnel::find($id);
        $user = User::find($personnel->user_id);
        $user->update([
            'nom' => $request->nom ,
            'prenom' => $request->prenom ,
            'dateNaissance' => $request->dateNaissance ,
            'adresse' => $request->adresse ,
            'commune' => $request->commune ,
            'wilaya' => $request->wilaya ,
        ]);

        if($request->has('access') && $request->access == 'oui'){
            $user->update([
                'username'=>$request->username,
                'password'=> Hash::make($request->password),
            ]);
        }

        $personnel->update([
            'user_id' => $user->id ,
            'fonction' => $request->fonction ,
            'titre' => $request->titre ,
            'service_id' => $request->service_id ,
        ]);

        Alert::success('Success','Mise à jours terminé');

        return redirect(route('personnel.index'));
    }

  
    public function remove($id)
    {
        $personnel = Personnel::find($id);
        $personnel->delete();
        Alert::success('Success','Personne supprime avec success');
        return redirect(route('personnel.index'));
    }
}
