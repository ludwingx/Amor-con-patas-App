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
    <div class="row">
        <div class="col-3">
            <h4>Estado</h3>
            <select class="form-select form-control" id="estado_mt" onchange="filtrarMascotas()">

                <option value="todos">Todos</option>
                <option value="activo">Activos</option>
                <option value="desactivo">Desactivados</option>
            </select>
        </div>
        <div class="col-3">
            <h4>Tipo</h3>
            <select class="form-select form-control" id="ftipo"  onchange="filtrarMascotas()">
                <option value="todos">Todos</option>
                @foreach ($ltipo as $listatipo)
                    <option value="{{ $listatipo->id}}">{{ $listatipo->nombre_tipo }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <h4>Raza</h3>
            <select name="raza" class="form-select" id="fraza"  onchange="filtrarMascotas()">
                <option value="todos">Todos</option>
                @foreach ($lraza as $listaraza)
                    <option value="{{ $listaraza->cod_rz }}">{{ $listaraza->nombre_rz }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <h4>Propietario</h3>
            <input type="text" name="edbusca" id="fpropietario" placeholder="Buscar"  onchange="filtrarMascotas()">
        </div>

        <div class="row ">
            <div class="col text-end">
                <button type="button" class="btn btn-outline-danger" ">PDF</button>
                <button type="button" class="btn btn-outline-success" onclick="nuevaMascota('accion')">Agregar Mascota</button>
            </div>
    
        </div>

    </div>
</div>
<div id="paneldetalle">

</div>
@endsection
