@section('Cargadato')
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
                                @if ($listap->estado_mt == 'activo')
                                    <button type="button" class="btn btn-outline-danger" onclick="jsDesactivarMascota('desactivo',{{ $listap->cod_mt }})">
                                        <span >Desactivar</span>
                                    </button>
                                @else
                                <button type="button" class="btn btn-outline-success" onclick="jsDesactivarMascota('activo',{{ $listap->cod_mt }})">
                                    <span >Activar</span>
                                </button>
                                    
                                @endif

                            </button>
                            </td>
                            {{-- Agrega más detalles según tus necesidades --}}
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection('Cargadato')