<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Mark;

use Alert;
class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::all();
        return view('machine.index',compact('machines'));
    }

    public function create()
    {
        $marks = Mark::all();
        return view('Machine.create')->with('marks',$marks);
    }

    public function store(Request $request)
    {

        Machine::create($request->all());
        Alert::success('Success','La machine à été ajouté avec success');
        return redirect(route('machine.index'));
    }

    public function show(Machine $machine)
    {
        return view('machine.details', compact('machine'));
    }

    public function edit(Machine $machine)
    {
        $marks = Mark::all();
        return view('machine.create', compact(['machine','marks']));

    }

    public function update(Request $request, Machine $machine)
    {
        $machine->update($request->only(['matricule','mark_id','matriel','machineType','obs']));
        Alert::success('Success','La machine à été mis à jours avec success');
        return redirect(route('machine.index'));
    }

    public function remove($id){
        $machine = Machine::find($id);
        $machine->delete();
        Alert::success('Success','Machine supprime avec success');
        return redirect(route('machine.index'));
    }

    public function createMark(){
        return view('machine.addMark');
    }

    public function storeMark(Request $request){
        //
    }
}
