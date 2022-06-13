@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <h2 class="text-center mb-5">  EMPLEADOS REGISTRADOS <i class="fas fa-user-friends"></i> </h2>
            <a type="button " href="{{ url('/mas')}}" class="btn btn-primary mb-3 mt-3 mr-2 md-3 offset float-left"> <i class="fas fa-user-plus"></i> Nuevo empleado  </a>

            <table class="table table-striped table-strpied text-center">
                <thead class="thead-success">
                <tr class="table-success">
                    <th scope="col">Usuario</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Direcciòn</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Opciones</th>


                </tr>
                </thead>
                <tbody>
                    @foreach($emplaeados as $empleado)
                    <tr>
                        <td class=" border px-4 py-2">{{$empleado->name}}</td>
                        <td class=" border px-4 py-2">{{$empleado->codigo_empleado}}</td>
                        <td class=" border px-4 py-2">{{$empleado->nombre_empleado}}</td>
                        <td class=" border px-4 py-2">{{$empleado->numero_telefono}}</td>
                        <td class=" border px-4 py-2">{{$empleado->correo}}</td>
                        <td class=" border px-4 py-2">{{$empleado->direccion}}</td>
                        <td class=" border px-4 py-2">{{$empleado->departamento}}</td>

                        <td class=" border px-4 py-2">
                            <div class="btn-group flex justify-center rounded-lg text-lg">
                                <a href="{{ route('modificar',$empleado->id)}}" class=" mr-2 btn btn-success">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                            </div>


                            <form action="{{ route('delete',$empleado->id)}}" id="{{$empleado->id}}" method="POST">
                                @csrf @method('DELETE')
                                <button type="button" onclick="Eliminar({{$empleado->id}})" class=" btn btn-danger" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div
            {{$emplaeados->links()}}

        </div>
    </div>
</div>
@endsection
@section('apartado')


@section('eliminar')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function Eliminar(Estudiante){
            Swal.fire({
                title: '¿Quieres eliminar al empleado?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(Estudiante).submit()
                    Swal.fire(
                        'Eliminado!',

                    )
                }
            })
        }
    </script>
@endsection

