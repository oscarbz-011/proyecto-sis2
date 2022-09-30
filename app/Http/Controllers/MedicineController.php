<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;


class MedicineController extends Controller
{
    public function index()
    {
        $medicines =Medicine::all();
        return view('medicamentos.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    public function store(Request $request)
    {
        $rules=[
            'name' => 'required |string',
            'brand' => 'required',
            'price' => 'required |numeric',
            'stock' => 'required |numeric',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
        ];
        $this->validate($request, $rules, $mensaje);

        $medicines = request()->except('_token');
        Medicine::insert($medicines);
        //Flash::success('Creado correctamente');
        return redirect (route('medicamentos.index'));
    }

    public function show($id)
    {
        $medicines = Medicine::findorFail($id);
        return view('medicamentos.show',compact('medicines'));
    }

    public function edit($id)
    {
        $medicines=Medicine::findorFail($id);
        return view('medicamentos.edit',compact('medicines'));
    }

    public function update(Request $request, $id)
    {
        $medicines=request()->except(['_token','_method']);
        Medicine::where('id_medicine','=',$id)->update($medicines);
        //Flash::success('Actualizado correctamente');
        return redirect ('medicamentos');
    }

    public function destroy($id)
    {
        Medicine::destroy($id);
        //Flash::error('Eliminado correctamente');
        return redirect('medicamentos');
    }
}
