<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Medicine;
use App\Models\Prescription;

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescriptions = Prescription::all();
        return view('recetas.index', compact('prescriptions'));
    }

    public function create()
    {

        $patients = Patient::all();
        $medicines= Medicine::all();
        return view('recetas.create', compact('patients','medicines'));

    }

    public function store(Request $request)
    {
        $rules=[
            'details' =>'required',
            'patients_id' => 'required',
            'medicines_id' => 'required',
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $rules, $mensaje);
        $prescriptions = request()->except('_token');
        Prescription::insert($prescriptions);
        //Flash::success('Creado correctamente');
        return redirect (route('recetas.index'));
    }

    public function show($id)
    {
        $prescriptions = Prescription::findorFail($id);
        return view('recetas.show',compact('prescriptions'));
    }

    public function edit($id)
    {
        $patients = Patient::all();
        $medicines = Medicine::all();
        $prescriptions=Prescription::findorFail($id);
        return view('recetas.edit',compact('prescriptions','patients','medicines'));
    }

    public function update(Request $request, $id)
    {
        $prescriptions=request()->except(['_token','_method']);
        Prescription::where('id_prescription','=',$id)->update($prescriptions);
        //Flash::success('Actualizado correctamente');
        return redirect ('recetas');
    }

    public function destroy($id)
    {
        Prescription::destroy($id);
        //Flash::error('Eliminado correctamente');
        return redirect('recetas');
    }
}
