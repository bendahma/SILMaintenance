<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panne;
use App\Models\Machine;
use App\Models\Personnel;
use App\Models\User;
use App\Models\DemandeTravail;
use App\Models\PanneStatistic;

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

//https://stackoverflow.com/questions/51308503/php-carbon-date-difference-with-only-working-days
// https://gist.github.com/quawn/8503445

        $dateEntre = $request->dateEntre; // 2020-12-12 17:00:00        
        $dtSortie = new DateTime($request->dateSortie); // date: 2020-12-12 18:00:00.0 UTC (+00:00)
        $timeSortie = $dtSortie->format('Y-m-d H:i:s'); // 2020-12-12 18:00:00
        $datEntre = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$dateEntre);  // Carbon/Carbon object
        $datSortie = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$timeSortie); // Carbon/Carbon object
        $dureeRegelementInDays = $datEntre->diffInDays($datSortie) * 24;
        $dureeRegelementInMinutes = $datEntre->diffInMinutes($datSortie);

        $panne = Panne::find($id);
        
        $panne->update([
            'dateSortie' => $request->dateSortie,
            'reglePar' => $request->reglePar,
            'panneRegle' => true,
            'travailFait' => $request->travailFait,
            'category_id' => $request->category_id,
            'dureeRegelementMinute' => $dureeRegelementInMinutes,

        ]);
        
        $panneStat = PanneStatistic::where('anneePanne', $request->anneePanne)
                                        ->where('moisPanne',$request->moisPanne)
                                        ->where('machine_id',$panne->machine_id)
                                        ->first();
        
        if($panneStat != null){
            $oldPanneDuration = $panneStat->dureeRegelementInMinutes;
            $oldPanneNbr = $panneStat->nbrPanne;
            $newPanneDuration = $oldPanneDuration + $dureeRegelementInMinutes ;
            $newPanneNbr = $oldPanneNbr + 1;
            $panneStat->update([
                'dureeRegelementInMinutes' => $newPanneDuration,
                'nbrPanne' => $newPanneNbr,
            ]);
        }else{
            $panneStat = PanneStatistic::create([
                'panne_id' => $panne->id,
                'machine_id' => $panne->machine_id,
                'category_id' => $panne->category_id,
                'anneePanne' => $request->anneePanne,
                'moisPanne' => $request->moisPanne,
                'dureeRegelementInMinutes' => $dureeRegelementInMinutes,
                'nbrPanne' => 1,
            ]);
        }

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
