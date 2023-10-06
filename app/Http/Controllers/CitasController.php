<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Medicines;
use App\Models\Pets;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitasController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
 
    public function index($id)
    {
        if(auth()->user()->rol == "Secretaria" && $id != auth()->user()->id){
            return redirect('Start');
        }

        $horarios = DB::select('select * from horarios where id_doctor = '.$id);

        $pacientes = Pets::all();

        $medicinas = Medicines::all();

        $citas = Citas::all()->where('id_doctor', $id);

        return view('modules.Citas', compact('horarios', 'pacientes', 'citas', 'medicinas'));

    }

    public function index1()
    {
                // if ((auth()->user()->role != "Administrador" && auth()->user()->role != "Secretaria")) {
                //     return redirect('Start'); //Si el rol del usuaario no es de administrador o secretaria, se le redirecciona
                // }
                $horarios = DB::select('select * from horarios');

                $pacientes = Pets::all();
        
                $medicinas = Medicines::all();
        
                $citas = Citas::all();
        
                return view('modules.search', compact('horarios', 'pacientes', 'citas', 'medicinas'));

    }

    public function HorarioDoctor(Request $request)
    {
        $datos = request();

        DB::table('horarios')->insert(['id_doctor'=> auth()->user()->id, 'horaInicio' => $datos["horaInicio"], 'horaFin' => $datos["horaFin"]]);

        return redirect('Citas/'.auth()->user()->id);
        

    }

    public function EditarHorario(Request $request)
    {
        $datos = request();

        DB::table('horarios')->where('id', $datos['id'])->update(['horaInicio' => $datos["horaInicioE"
        ], 'horaFin' => $datos["horaFinE"]]);

        return redirect('Citas/'.auth()->user()->id);
        

    }

    public function CrearCita(Request $id_doctor)
    {
        Citas::create(['id_doctor' => request('id_doctor'), 'id_paciente' => request('id_paciente'), 'id_animal' => request('id_animal'), 'id_medicamento' => request('id_medicamento'),
        'FyHinicio' => request('FyHinicio'), 'FyHfinal' => request('FyHfinal')]);
    
        return redirect('Citas/'.request('id_doctor'));
    }


    public function store(Request $request)
    {
        //
    }

    public function edit(Citas $citas)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Citas $citas)
    {
        DB::table('citas')->whereId(request('idCita'))->delete();

        return redirect('Citas/'.request('idDoctor'));
    }
}
