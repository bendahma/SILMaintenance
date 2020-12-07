<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Machine;

class Mark extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function machines(){
        return $this->hasMany(Machine::class);
    }

    public function NbrPanne($id){
        $marks = Panne::where('mark_id',$id)->get();
        return $marks->count();
    }

    public function MTTR($id){
        $marks = Panne::where('mark_id',$id)->get();
        $nbrPanne = $marks->count();
        $sumDureePanne = Panne::where('mark_id',$id)->sum('dureeRegelementMinute');

        return $nbrPanne > 0 ? $sumDureePanne / $nbrPanne : 0 ;

    }

    public function markNbrMachine($id){
        $machineCount = Machine::where('mark_id',$id)->count();
        return $machineCount;
    }

    
}
