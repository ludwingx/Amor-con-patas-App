@section('Cargadato')

    <div class="container containerEditPet">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="principal">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" onclick="jsListarMascota('principal')">Mascotas</a></li>
                        <li class="breadcrumb-item" aria-current="page">Editar Mascota</li>
                    </ol>
                </nav>
            </div>
        </div>
        


        @foreach ($datosmascota as $dmascota)
        <div class="row">
            <div class="col-8">
                <h1>Editar Mascota</h1>
            </div>
            <div class="col-auto d-flex justify-content-end">
                <button type="button" class="btn btn-success me-2" onclick="updateEditPet({{ $dmascota->cod_mt }})">Guardar</button>
                <button type="button" class="btn btn-danger me-2" onclick="jsListarMascota('principal')">Cancelar</button>
            </div>
        </div>
            <div class="container">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <h3>{{ $dmascota->nombre_mt }}</h3>
                    </div>
                </div>
                <div class="row ">
                    <div class="col d-flex justify-content-center">
                        
                        <img class="roundPhotoPetEdit" src="https://randomuser.me/api/portraits/women/20.jpg" alt="user" />
                    </div>
                </div>
                <h4>Datos de la mascota:</h4>
                <div class="row mt-3">
                    <di class="col-6">
                        <label for="" class="form-label">Nombre de mascota:</label>
                        <input class="form-control" type="text" name="nombre_mt" id="nombre_mt" value=" {{ $dmascota->nombre_mt }}">
                    </di>
                    <div class="col-6">
                        <label for="" class="form-label">Raza:</label>
                        <select name="raza" class="form-select" id="raza_mt" >
                            @foreach ($lraza as $listaraza)
                            <option value="{{ $listaraza->nombre_rz }}" @if ($listaraza->nombre_rz == $razaActualNombre) selected @endif>
                                {{ $listaraza->nombre_rz }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="" class="form-label">Tipo:</label>
                        <select name="tipo" class="form-select" id="idTipo">
                            @foreach ($ltipo as $listatipo)
                            <option value="{{ $listatipo->id }}" @if ($listatipo->id == $tipoActualNombre) selected @endif>
                                {{ $listatipo->nombre_tipo }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Propietario:</label>
                            <select class="form-select form-control" name="propietario" id="idper">
                                @foreach ($lpersona as $listaper)
                                <option value="{{ $listaper->id }}" @if ($listaper->id == $propietarioActualId) selected @endif>
                                    {{ $listaper->name }}
                                </option>
                                @endforeach
                            </select>
                    </div>
                    <div class="col-6">
                        <label for="namepet" class="form-label">Detalle/Observación</label>
                        <input type="text" class="form-control" id="detalle_mt" value="{{ $dmascota->detalle_mt }}"  placeholder="Detalles">
                    </div>

                </div>
            </div>
        @endforeach

    </div>
@endsection