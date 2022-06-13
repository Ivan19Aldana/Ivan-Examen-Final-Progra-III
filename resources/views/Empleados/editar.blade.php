@extends('layouts.app')
@section('content')
    <div class="container mt-6">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <!--MENSAJE FLASH-->
                @if(session('empleadoguardado'))
                    <div class="alert alert-success">
                        {{ session('empleadoguardado') }}
                    </div>
                @endif

            <!--VALIDACION DE ERRORES-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card bg-light border-success ">
                    <form action="{{route('edit',$empleado->id)}}" mathod="POST">
                        @csrf
                        @method('patch')
                        <div class="card-header text-center text-white bg-success"><i class="far fa-edit"></i> EDITAR NUEVO EMPLEADO</div>
                        <div class="card-body">

                                <div class=" form-group col-md-12 ">
                                    <label for="">Codigo</label>
                                    <input type="text" class="form-control border border-success" value="{{$empleado->codigo_empleado}}" name="codigo_empleado" >
                                </div>

                                <div class=" form-group col-md-12 ">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control border border-success" value="{{$empleado->nombre_empleado}}" name="nombre_empleado" >
                                </div>



                                <div class=" form-group col-md-12 ">
                                    <label for="">Número</label>
                                    <input type="text" class="form-control border border-success" value="{{$empleado->numero_telefono}}" name="numero_telefono" >
                                </div>

                                <div class=" form-group col-md-12 ">
                                    <label for="">Departamento</label>
                                    <input type="text" class="form-control border border-success" value="{{$empleado->departamento}}" name="departamento" >
                                </div>


                            <div class=" form-group col-md-12 ">
                                <label for="">Correo</label>
                                <input type="text" class="form-control border border-success " value="{{$empleado->correo}}" name="correo" >
                            </div>


                            <div class="form-group col-md-12">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control border border-success" value="{{$empleado->direccion}}" name="direccion"  >
                            </div>


                            <div class="row form-group justify-content-center">
                                <button type="submit" class="btn btn-primary col-md-3 mt-3 mr-2 offset">Editar  <i class="fas fa-edit"></i></button>

                                <a type="button " href="{{ url('/ver')}}" class="btn btn-danger col-md-3 mt-3 mr-2 offset float-right"><i class="fas fa-undo"></i> Volver  </a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
