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

class PerfilController extends Controller
{
    public function index()
    {
        if( Auth::user()->hasRole('admin')){
            $patient = Patient::all();
            $relatives = Relative::all();
            return view('perfil.index', compact('relatives','patient'));
        }
        else{

            $user = Auth::user()->id_user;
            $id = Relative::where('users_id','=',$user)->pluck("id_relative");
            $relative = Relative::join("users","relatives.users_id","=","users.id_user")
            ->where('users.id_user','=',$user)
            ->first();
            $patients = Patient::where('relatives_id','=',$id)->get();
            return view('perfil.index',compact('relative', 'patients'));
        }

    }

    public function create()
    {


        $user_list = User::all();
        //$user_list = Auth::user();
        $lista = array("lista_user" => $user_list);
        $relatives = Relative::all();
        return response()->view('perfil.create', compact('lista','relatives'));


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
        if(Auth::user()->hasRole('admin')){
            $patient = Patient::all();
            $relative = Relative::findorFail($id);
            return view('familiares.show',compact('relative', 'patient'));
        }
        else{
            $user = Auth::user()->id_user;
            $patients = Patient::all()->where('relatives_id','=',$user);
            $relative = Relative::findorFail($id);
            //return view('perfil.index',compact('relative', 'patient'));
        }





    }

    public function edit($id)
    {
        if( Auth::user()->hasRole('admin')){
            $user_list = User::all();
            $lista = array("lista_user" => $user_list);

            $relative=Relative::findorFail($id);
            return view('familiares.edit',$lista,compact('relative'));
        }
        else{
            $user = Auth::user()->id_user;

            $relative = Relative::join("users","relatives.users_id","=","users.id_user")
            ->where('users.id_user','=',$user)
            ->first();
            $patient = Patient::all();

            return view('perfil.edit',compact('relative', 'patient'));
        }


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
