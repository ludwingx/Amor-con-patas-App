@section('Cargadato')

    <div class="container">
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
        <div class="row">
            <div class="col">
                <h1>Editar Mascota</h1>
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
                    <select name="raza" class="form-select" id="edp">
                        @foreach ($lpersona as $listap)
                            <option value="{{ $listap->id }}">{{ $listap->name }}</option>
                        @endforeach
                    </select>
            </div>
        </div>

        @foreach ($datosmascota as $dmascota)
            <div class="row">
                <di class="col-6">
                    <label for="">Id: {{ $dmascota->cod_mt }}</label>

                </di>
                <di class="col-6">
                    <label for="">Nombre de mascota</label>
                    <input type="text" name="ednom" id="ednom" value=" {{ $dmascota->nombre_mt }}">
                </di>
            </div>
        @endforeach

    </div>
@endsection