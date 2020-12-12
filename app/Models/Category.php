<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Type;
use App\Models\Machine;
use App\Models\PanneStatistic;
use App\Models\Panne;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function machine(){
        return $this->hasMany(Machine::class);
    }

    public function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }


    public function MTTR_Monthly($id,$month,$year){

        $panneMonth = PanneStatistic::where('category_id',$id)
                    ->where('anneePanne',$year)
                    ->where('moisPanne',$month)
                    ->first();
        if($panneMonth == null){
            return 0;
        }
        $sumDureePanne = $panneMonth->dureeRegelementInMinutes;
        $nbrPanne = $panneMonth->nbrPanne;
        $duree = $nbrPanne > 0 ? $sumDureePanne / $nbrPanne : 0 ;
        return $this->convertToHoursMins($duree, '%02d:%02d:00');
    }

    public function MTTR_Yearly($id,$year){
        $panneMonth = PanneStatistic::where('category_id',$id)
                                    ->where('anneePanne',$year)
                                    ->first();
        if($panneMonth == null){
            return 0;
        }
        $sumDureePanne = $panneMonth->dureeRegelementInMinutes;
        $nbrPanne = $panneMonth->nbrPanne;
        $duree = $nbrPanne > 0 ? $sumDureePanne / $nbrPanne : 0 ;

        return  $this->convertToHoursMins($duree, '%02d:%02d:00');
    }

    public function MTTR_Global($id){
        $panneMonth = PanneStatistic::where('category_id',$id)->first();
        if($panneMonth == null){
        return 0;
        }
        $sumDureePanne = $panneMonth->dureeRegelementInMinutes;
        $nbrPanne = $panneMonth->nbrPanne;

        return $nbrPanne > 0 ? $sumDureePanne / $nbrPanne : 0 ;
    }
}
