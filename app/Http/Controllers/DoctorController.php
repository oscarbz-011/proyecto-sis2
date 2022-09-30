<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DoctorController extends Controller
{
    public function index()
    {
        $date = Date::all();
        $doctor =Doctor::all();
        return view('doctores.index', compact('doctor','date'));
    }

    public function create()
    {
        $dates = Date::all();
        return response()->view('doctores.create',compact('dates'));
    }

    public function store(Request $request)
    {

        $rules= request()->validate([
            'name' => 'required |string',
            'specialty' => 'required |alpha',
        ]);
       $doctor = Doctor::create([
            'name' => $rules['name'],
            'specialty' =>$rules['specialty'],
        ]);
        if ($request->has('dates')){
            $doctor->dates()->attach($request->dates);
        }
        //Flash::success('Creado correctamente');
        return redirect (route('doctores.index'));
    }

    public function show($id)
    {
        $date = date::all();
        $doctors = Doctor::findorFail($id);
        return view('doctores.show',compact('doctors','date'));
    }

    public function edit($id)
    {

        $dates = Date::all();
        $doctors=Doctor::findorFail($id);
        return view('doctores.edit',compact('doctors','dates'));
    }

    public function update(Request $request, $id)
    {
        //$doctor=request()->except(['_token','_method','dates']);
        $doctor = Doctor::where('id_doctor','=',$id)->update([
            'name' => request('name'),
            'specialty' =>request('specialty'),
        ]);
        $doc = Doctor::find($id);
        if ($request->has('dates')){
            $doc->dates()->sync($request->dates);
        }
        //Flash::success('Actualizado correctamente');
        return redirect ('doctores');
    }

    public function destroy($id)
    {
        Doctor::destroy($id);
        //Flash::error('Eliminado correctamente');
        return redirect('doctores');
    }
}
