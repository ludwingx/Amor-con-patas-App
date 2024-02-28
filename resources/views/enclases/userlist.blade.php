@section('Cargadato')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Listado de Jugadores</h1>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>pais</th>
                        <th>equipo</th>
                        <th>posicion</th>
                        <th>estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listaJugadores as $jugador)
                        <tr>
                            <td>{{ $jugador-> cod_jd}}</td>
                            <td>{{ $jugador-> nombre_jd}}</td>  
                            <td>{{ $jugador->pais_jd }}</td>  
                            <td>{{ $jugador->equipo_jd }}</td>
                            <td>{{ $jugador->posicion_jd }}</td>
                            <td>{{ $jugador->estado_jd }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
