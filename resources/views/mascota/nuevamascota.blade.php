@section('Cargadato')
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="principal">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="jsListarMascota('principal')">Mascotas</a></li>
                        <li class="breadcrumb-item" aria-current="page">Añadir Mascota</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Nueva Mascota</h1>
            </div>
        </div>
        <div class="card  " style="width:42rem;>
            <div class="card-body">
                <div class="form">
                    <div class="mb-3">
                        <label for="namepet" class="form-label">Nombre de la mascota</label>
                        <input type="text" class="form-control" id="nombre_mt"  placeholder="Nombre de mascota">
                    </div>
                    
                    <div class="row">
                        <div class="col-3">
                            <h4>Estado</h3>
                            <select class="form-select form-control" id="estado_mt" >
                                <option value="todos">Todos</option>
                                <option value="activo">Activos</option>
                                <option value="desactivo">Desactivados</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <h4>Tipo</h3>
                            <select class="form-select form-control" id="tipo_mt" >
                                @foreach ($ltipo as $listatipo)
                                <option value="{{ $listatipo->id }}">{{ $listatipo->nombre_tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <h4>Raza</h3>
                            <select name="raza" class="form-select" id="raza_mt">
                                @foreach ($lraza as $listaraza)
                                    <option value="{{ $listaraza->nombre_rz }}">{{ $listaraza->nombre_rz }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <h4>Propietario</h3>
                                <select name="" id="edper">
                                    @foreach ($lpersona as $listaper)
                                        <option value="{{ $listaper->id }}">{{ $listaper->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="namepet" class="form-label">Detalle/Observación</label>
                        <input type="text" class="form-control" id="detalle_mt"  placeholder="Detalles">
                    </div>
                    <div class="button text-end">
                        <button type="button" class="btn btn-primary" onclick="saveMascota()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection