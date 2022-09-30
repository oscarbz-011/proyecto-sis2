<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Models\Relative;
use \App\Models\User;
use App\Models\Patient;

use Spatie\Permission\Traits\HasRoles;
use Flash;
use Psy\Command\WhereamiCommand;

class RelativeController extends Controller
{

    public function index()
    {
        $user = User::find( Auth::user()->id_user )->first();
        if( $user->hasRole('admin')){
            $patient = Patient::all();
            $relatives = Relative::all();
            return view('familiares.index', compact('relatives','patient'));
        }
        else{

            $patient = Patient::all();
            $relative = Relative::findorFail($user->id_user);
            return view('index.show',compact('relative', 'patient'));
        }

    }

    public function create()
    {


        $user_list = User::all();
        //$user_list = Auth::user();
        $lista = array("lista_user" => $user_list);
        return response()->view('familiares.create', $lista);


    }

    public function store(Request $request)
    {

        $rules=[
            'name' => 'required |string',
            'surname' => 'required |alpha',
            'document' => 'required |numeric',
            'address' => 'required',
            'phone' => 'required |max:13',
            'users_id' => 'required',

        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'phone.required' => 'El número de teléfono es requerido',
            'address.required' => 'La dirección es requerida',
        ];
        $this->validate($request, $rules, $mensaje);

        $relatives = request()->except('_token');
        Relative::insert($relatives);
        //Flash::success('Creado correctamente');
        return redirect (route('familiares.index'));
    }

    public function show($id)
    {
        /*
        $patient = Patient::join('relatives','relatives.id_relative','=','patients.relatives_id')
        ->select('patients.name')->where('relatives_id', 'LIKE', $id)->first();
        */
        $patient = Patient::all();
        $relative = Relative::findorFail($id);
        return view('familiares.show',compact('relative', 'patient'));



        
    }

    public function edit($id)
    {
            $user_list = User::all();
            $lista = array("lista_user" => $user_list);

            $relative=Relative::findorFail($id);
            return view('familiares.edit',$lista,compact('relative'));

    }

    public function update(Request $request, $id)
    {
        $relative=request()->except(['_token','_method']);
        Relative::where('id_relative','=',$id)->update($relative);
        //Flash::success('Actualizado correctamente');
        return redirect ('familiares');
    }

    public function destroy($id_relative)
    {
        Relative::destroy($id_relative);
        //Flash::error('Eliminado correctamente');
        return redirect('familiares');
    }
}
