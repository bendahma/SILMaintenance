<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panne;
use App\Models\Machine;
use App\Models\Personnel;
use App\Models\User;
use App\Models\DemandeTravail;
use DateTime;
use Alert;

class PanneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $machines = Machine::with('pannes')->whereHas('pannes',function($q){
            $q->where('panneRegle',false);
        })->get();

        return view('Panne.index')->with('machines',$machines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function machineEnPanne($machineId)
    {
        $machine = Machine::find($machineId);
        $personnels = Personnel::all();
        return view('Panne.create')
                ->with('machine',$machine)
                ->with('personnels',$personnels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function detailsPanne($id)
    {
        $machine = Machine::where('id',$id)->first();
        $panne = Panne::with(['machines'])->where('machine_id',$machine->id)->where('panneRegle',false)->first();
        $demande = DemandeTravail::find($panne->demande_travail_id);
        $personnel = Personnel::find($demande->declarePar);

        return view('Panne.detailsPanne')
                    ->with('panne',$panne)
                    ->with('demande',$demande)
                    ->with('machine',$machine)
                    ->with('personnel',$personnel);
    }

    public function editPanne($id){
        $machine = Machine::where('id',$id)->first();
        $panne = Panne::with(['machines'])->where('machine_id',$machine->id)->where('panneRegle',false)->first();
        $demande = DemandeTravail::find($panne->demande_travail_id);
        $personnel = Personnel::find($demande->declarePar);

        return view('Panne.editPanne')
                    ->with('panne',$panne)
                    ->with('demande',$demande)
                    ->with('machine',$machine)
                    ->with('personnel',$personnel);
    }

    public function ReglePanne($id){
        $machine = Machine::where('id',$id)->first();
        $panne = Panne::with(['machines'])->where('machine_id',$machine->id)->where('panneRegle',false)->first();
        $demande = DemandeTravail::find($panne->demande_travail_id);
        $personnel = Personnel::find($demande->declarePar);
        $personnels = Personnel::all();


        return view('Panne.panneRegle')
                        ->with('panne',$panne)
                        ->with('demande',$demande)
                        ->with('machine',$machine)
                        ->with('personnel',$personnel)
                        ->with('personnels',$personnels);
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



        $dateEntre = $request->dateEntre;
        $dateSortie = $request->dateSortie;
        $dtSortie = new DateTime($dateSortie);
        $timeSortie = $dtSortie->format('Y-m-d H:i:s');
        
        $datEntre = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$request->dateEntre); 
        $datSortie = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$timeSortie);
        $dureeRegelement = $datEntre->diffInMinutes($datSortie);

        $panne = Panne::find($id)->update([
            'dateSortie' => $request->dateSortie,
            'reglePar' => $request->reglePar,
            'panneRegle' => true,
            'travailFait' => $request->travailFait,
            'dureeRegelementMinute' => $dureeRegelement,
            'mark_id' => $request->mark_id,
        ]);

        Alert::success('Success','Panne réglé avec success');

        return redirect(route('machine.index'));
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
