<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Horarios;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function hours(Request $request){

        $rules = [
            'date' => 'required|date_format:"Y-m-d"',
            'doctor_id' => 'required|exists:users,id'
        ];
        $this->validate($request, $rules);

        $date = $request->input('date');
        $dateCarbon = new Carbon($date);
        $i = $dateCarbon->dayOfWeek;
        $day = ($i==0 ? 6 : $i-1);
        $doctorId = $request->input('doctor_id');

        $horario = Horarios::where('active', true)
        ->where('day', $day)
        ->where('user_id', $doctorId)
        ->first([
            'morning_start','morning_end',
            'afternoon_start', 'afternoon_end'
        ]);
        if(!$horario){
            return [];
        }
        $morningIntervalos = $this->getIntervalos(
            $horario->morning_start, $horario->morning_end
        );

        $afternoonIntervalos = $this->getIntervalos(
            $horario->afternoon_start, $horario->afternoon_end
        );

        $data = [];
        $data['morning'] = $morningIntervalos;
        $data['afternoon'] = $afternoonIntervalos;

        return $data;
    }

    private function getIntervalos($start, $end){
        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervalos = [];
        while($start < $end){
            $intervalo = [];
            $intervalo['start'] = $start->format('g:i A');
            $start->addMinutes(30);
            $intervalo['end'] = $start->format('g:i A');
            $intervalos [] = $intervalo;
        }
        return $intervalos;
    }
}
