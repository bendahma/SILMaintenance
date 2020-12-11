<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Panne;
use App\Models\DemandeTravail;
use App\Models\Type;
use App\Models\Category;
use DB;
class Machine extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pannes(){
        return $this->hasMany(Panne::class);
    }

    public function demandeTravail(){
        return $this->hasMany(demandeTravail::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    

    static public function machineNotEnPanne(){

        $machineEnPanne = Machine::whereHas('pannes',function($q){
            $q->where('panneRegle',false);
        })->get();

        $data = array();

        foreach ($machineEnPanne as $key => $m) { $data[] = (array)$m->id; }

        $machines = Machine::whereNotIn('id',$data)->with('category')->get();

        return $machines;
    }

    public function NbrPanne($id){
        $machine = Panne::where('machine_id',$id)->get();
        return $machine->count();
    }

    public function mtbf($id){
        $machines = Panne::where('machine_id',$id)->get();
        $nbrPanne = $machines->count();
        $sumDureePanne = Panne::where('machine_id',$id)->sum('dureeRegelementMinute');
        return $nbrPanne > 0 ? $sumDureePanne / $nbrPanne : 0 ;
    }
}
