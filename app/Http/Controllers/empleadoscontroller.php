<?php

namespace App\Http\Controllers;
use App\Models\empleados;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class empleadoscontroller extends Controller
{
    public function listado(){
        $emplaeados = DB::table('registro_de_empleados')
            ->join('users', 'registro_de_empleados.id_usuario', '=', 'users.id')
            ->select('registro_de_empleados.*', 'users.name')
            ->paginate(10);
        return view('Empleados.lista', compact('emplaeados'));
    }

    public function delete($id){
        empleados::destroy($id);
        return back() ->with('empleadoguardado', 'Empleado guardado con exito');
    }

    public function crear(){

        return view('Empleados.crear');
    }

    public function save(Request $request){
        $validator=$this->validate($request,[

            'codigo_empleado'=>'required',
            'nombre_empleado'=>'required',
            'numero_telefono'=>'required',
            'correo'=>'required|email|unique:registro_de_empleados',
            'direccion'=>'required',
            'departamento'=>'required',

        ]);

        empleados::create([
            'codigo_empleado' => $validator['codigo_empleado'],
            'nombre_empleado' => $validator['nombre_empleado'],
            'numero_telefono' => $validator['numero_telefono'],
            'correo' => $validator['correo'],
            'direccion' => $validator['direccion'],
            'departamento' => $validator['departamento'],
            'id_usuario'=>Auth()->user()->id
            //'idjornada'=>$validator['jornada'],
        ]);
        //si funciona este
        return back()->with('empleadoguardado', 'Empleado guardado con exito');
    }

    public function modificar ($id){
        $empleado=empleados::findorfail($id);
        return view('Empleados.editar', compact('empleado'));

    }

    public function edit(Request $request,$id){
        $datosempleado=request()->except((['_token','_method']));
        empleados::where('id','=', $id)->update($datosempleado);
        return back() ->with('empleadoguardado', 'Empleado modificado con exito');

    }

}
