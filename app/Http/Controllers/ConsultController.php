<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consult;
use App\Models\Date;
use App\Models\Patient;
use App\Models\Doctor;


class ConsultController extends Controller
{
    public function index()
    {
        $consult = Consult::all();
        return view('turnos.index', compact('consult'));
    }

    public function create()
    {
        $patients = Patient::all();
        $doctors= Doctor::all();
        return view('turnos.create', compact('patients','doctors'));

    }

    public function store(Request $request)
    {
        $txt = 'TRN-';
        $nro = random_int(0,1000);
        $code = $txt.$nro;
        $rules= request()->validate([
            'date' => 'required',
            'patients_id' => 'required',
            'doctors_id' => 'required',
        ]);

        $consult = Consult::create([
            'code' => $code,
            'date' =>$rules['date'],
            'patients_id' => $rules['patients_id'],
            'doctors_id'=> $rules['doctors_id'],
        ]);
        //Flash::success('Creado correctamente');
        return redirect (route('turnos.index'));
    }

    public function show($id)
    {
        $consult = Consult::findorFail($id);
        return view('turnos.show',compact('consult'));
    }

    public function edit($id)
    {

        $patients = Patient::all();
        $doctors = Doctor::all();
        $consult=Consult::findorFail($id);
        return view('turnos.edit',compact('consult','patients','doctors'));
    }

    public function update(Request $request, $id)
    {
        $consult=request()->except(['_token','_method']);
        Consult::where('id_consult','=',$id)->update($consult);
        //Flash::success('Actualizado correctamente');
        return redirect ('turnos');
    }

    public function destroy($id)
    {
        Consult::destroy($id);
        //Flash::error('Eliminado correctamente');
        return redirect('turnos');
    }
}
