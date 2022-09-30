<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Date;
use App\Models\Transfer;

class TransferController extends Controller
{
    public function index()
    {
        $transfers = Transfer::all();
        return view('derivaciones.index', compact('transfers'));
    }

 
    public function create()
    {



        $patients= Patient::all();

        return view('derivaciones.create', compact('patients'));

    }


    public function store(Request $request)
    {
        $rules=[
            'description' => 'required',
            'hospital' => 'required',
            'patients_id' => 'required',
            'date' => 'required',

        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'dates_id.required' => 'La fecha es requerida',
        ];
        $this->validate($request, $rules, $mensaje);

        $transfers = request()->except('_token');
        Transfer::insert($transfers);
        //Flash::success('Creado correctamente');
        return redirect (route('derivaciones.index'));
    }


    public function show($id)
    {
        $transfers = Transfer::findorFail($id);
        return view('derivaciones.show',compact('transfers'));
    }


    public function edit($id)
    {

        $patients = Patient::all();


        $transfers=Transfer::findorFail($id);
        return view('derivaciones.edit',compact('transfers','patients'));
    }

    public function update(Request $request, $id)
    {
        $transfers=request()->except(['_token','_method']);
        Transfer::where('id_transfer','=',$id)->update($transfers);
        //Flash::success('Actualizado correctamente');
        return redirect ('derivaciones');
    }


    public function destroy($id)
    {
        Transfer::destroy($id);
        //Flash::error('Eliminado correctamente');
        return redirect('derivaciones');
    }
}
