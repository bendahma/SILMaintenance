<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Machine;
use App\Models\Personnel;
use App\Models\Mark;
use App\Models\DemandeTravail;
use App\Models\Panne;

use Alert;
use DB;
class DemandeTravailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $machines = Machine::machineNotEnPanne();
        return view('DemandeTravail.index')->with('machines',$machines);
    }

    public function NewDemandeTravail($id){
        $machine = Machine::find($id);
        $personnels = Personnel::all();
        return view('DemandeTravail.create')
                    ->with('machine',$machine)
                    ->with('personnels',$personnels);
    }

    
    public function create()
    {
        return view('DemandeTravail.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $demandeTravail = DemandeTravail::create($request->except(['mark_id']));

        $panne = Panne::create([
            'demande_travail_id' => $demandeTravail->id,
            'machine_id' => $request->machine_id,
            'mark_id' => $request->mark_id,
        ]);

        Alert::success('Success','Une demande de travail à été ajouté avec success');

        return redirect(route('demandeTravail.index'));
    }


    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $demande = DemandeTravail::find($id);
        $demande->update($request->only(['dateEntre','description','declarePar']));
        Alert::success('Success','La panne à été mettre à jours avec success');
        return redirect(route('panne.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
