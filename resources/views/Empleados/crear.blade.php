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
                <form action="{{route('save')}}" mathod="POST">
                    @csrf
                    <div class="card-header text-center text-white bg-success"><i class="far fa-user"></i> REGISTRAR NUEVO EMPLEADO</div>
                        <div class="card-body">

                                <div class=" form-group col-md-12 ">
                                    <label for="">Codigo</label>
                                    <input type="text" class="form-control border border-success" name="codigo_empleado" placeholder="">
                                    <input type="hidden" name="control" value="form">
                                </div>

                                <div class=" form-group col-md-12 ">
                                    <label for="">Nombre</label>
                                    <input type="text" class="form-control border border-success" name="nombre_empleado" placeholder="">
                                </div>



                                <div class=" form-group col-md-12 ">
                                    <label for="">Numero</label>
                                    <input type="text" class="form-control border border-success" name="numero_telefono" placeholder="">
                                </div>

                                <div class=" form-group col-md-12 ">
                                    <label for="">Departamento</label>
                                    <input type="text" class="form-control border border-success" name="departamento" placeholder="">
                                 </div>



                            <div class=" form-group col-md-12 ">
                                <label for="">Correo</label>
                                <input type="text" class="form-control border border-success " name="correo" placeholder="">
                            </div>


                            <div class="form-group col-md-12">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control border border-success" name="direccion"  placeholder="">
                            </div>


                            <div class="row form-group justify-content-center">
                                <button type="submit" class="btn btn-primary col-md-3 mt-3 mr-2 offset"><i class="far fa-save"></i> Guardar </button>

                                <a type="button " href="{{ url('/ver')}}" class="btn btn-danger col-md-3 mt-3 mr-2 offset float-right"><i class="fas fa-undo"></i> Volver  </a>
                            </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection

