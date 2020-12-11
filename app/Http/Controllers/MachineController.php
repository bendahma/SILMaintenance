<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Type;
use App\Models\Category;
use App\Models\Panne;
use App\Models\DemandeTravail;

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
        $types = Type::all();
        $categories = Category::all();
        return view('Machine.create')
                        ->with('types',$types)
                        ->with('categories',$categories);
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

    public function MachineList($typeId,$category_id){
        $machines = Machine::where('type_id',$typeId)->where('category_id',$category_id)->get();
        return view('machine.index',compact('machines'));
    }

    public function edit(Machine $machine)
    {
        $categories = Category::all();
        return view('machine.create', compact(['machine','categories']));

    }

    public function update(Request $request, Machine $machine)
    {
        $machine->update($request->only(['immatriculation','numeroSerie','type_id','category_id','obs']));
        Alert::success('Success','La machine à été mis à jours avec success');
        return redirect(route('machine.index'));
    }

    public function remove($id){
        $machine = Machine::find($id);
        $machine->delete();
        Alert::success('Success','Machine supprime avec success');
        return redirect(route('machine.index'));
    }

    public function panneList(Machine $machine){
        $pannes = Panne::where('machine_id',$machine->id)->with('demandetravail')->get();
        return view('machine.panneList')
                ->with('machine',$machine)
                ->with('pannes',$pannes);

    }
}
