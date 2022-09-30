<?php

namespace App\Http\Controllers;
use \App\Models\Patient;
use \App\Models\Relative;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    public function index()
    {
        $patient =Patient::all();
        return view('pacientes.index', compact('patient'));
    }

    public function create()
    {
        $relatives = Relative::all();
        return view('pacientes.create', compact('relatives'));
    }

    public function store(Request $request)
    {
        $rules=[
            'name' => 'required |string',
            'race' => 'required |alpha',
            'age' => 'required |numeric',
            'relatives_id' => 'required',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'race.required' => 'La raza es requerida',
            'age.required' => 'La edad es requerida',
        ];
        $this->validate($request, $rules, $mensaje);

        $patient = request()->except('_token');
        Patient::insert($patient);
        //Flash::success('Creado correctamente');
        return redirect (route('pacientes.index'));
    }

    public function show($id)
    {
        $patient = patient::findorFail($id);
        return view('pacientes.show',compact('patient'));
    }

    public function edit($id)
    {
        $relative_list = Relative::all();
        $lista = array("lista_relative" => $relative_list);
        $patient=Patient::findorFail($id);
        return view('pacientes.edit',compact('patient','lista'));
    }

    public function update(Request $request, $id)
    {
        $patient=request()->except(['_token','_method']);
        patient::where('id_patient','=',$id)->update($patient);
        //Flash::success('Actualizado correctamente');
        return redirect ('pacientes');
    }

    public function destroy($id_relative)
    {
        Patient::destroy($id_relative);
        //Flash::error('Eliminado correctamente');
        return redirect('pacientes');
    }
}
