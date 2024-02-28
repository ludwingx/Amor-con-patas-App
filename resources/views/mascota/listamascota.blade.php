@section('Cargadato')
<div class="container containerListMascotas">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="principal">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Mascotas</li>
                </ol>
            </nav>
        </div>
    </div>
    <h2><i class="fa-solid fa-paw"></i> Gestión de Mascotas </h2>

    {{-- Agrega cualquier formulario o botón necesario para gestionar las mascotas --}}
    <div class="row ">
        <div class="col text-end">
            <button type="button" class="btn btn-outline-danger" ">PDF</button>
            <button type="button" class="btn btn-outline-success" onclick="nuevaMascota('accion')">Agregar Mascota</button>
        </div>

    </div>
    <div class="row">
        <div class="col-3">
            <h4>Estado</h3>
            <select class="form-select form-control" id="edestado" onchange="filtrarMascotas('principal')">
                <option value="todos">Todos</option>
                <option value="activo">Activos</option>
                <option value="desactivado">Desactivados</option>
            </select>
        </div>
        <div class="col-3">
            <h4>Tipo</h3>
            <select class="form-select form-control" id="edtipo" onchange="filtrarMascotas('principal')">
                <option value="todos">Todos</option>
                <option value="gatos">Gatos</option>
                <option value="perros">Perros</option>
                <option value="aves">Aves</option>
            </select>
        </div>
        <div class="col-3">
            <h4>Raza</h3>
            <select name="raza" class="form-select" id="edraza">
                @foreach ($lraza as $listaraza)
                    <option value="{{ $listaraza->nombre_rz }}">{{ $listaraza->nombre_rz }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <h4>Propietario</h3>
            <input type="text" name="edbusca" id="edbusca" placeholder="Buscar">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Configuraciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lmascotas as $listap)
                        <tr>
                            <td>{{ $listap->cod_mt }}</td>
                            <td>{{ $listap->nombre_mt }}</td>
                            <td>{{ $listap->raza_mt }}</td>
                            <td>{{ $listap->tipo_mt }}</td>
                            <td>{{ $listap->name }}</td>
                            <td>{{ $listap->estado_mt }}</td>
                            <td> 
                                <button type="button" class="btn btn-outline-primary" 
                                    onclick="jsEditarMascota( {{ $listap->cod_mt }})">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" 
                                onclick="jsEliminarMascota({{ $listap->cod_mt }})">
                                <i class="fa-solid fa-eye"></i>
                            </button>
                            </td>
                            {{-- Agrega más detalles según tus necesidades --}}
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
