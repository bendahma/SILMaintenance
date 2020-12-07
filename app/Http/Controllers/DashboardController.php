<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Machine;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $nbrMachines = Machine::count();

        $nbrMachineEnPanne = Machine::whereHas('pannes',function($q){
            $q->where('panneRegle',false);
        })->count();

        return view('admin.index')
                ->with('nbrMachines',$nbrMachines)
                ->with('nbrMachineEnPanne',$nbrMachineEnPanne);
    }
}
