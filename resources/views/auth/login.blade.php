@extends('layouts.app')
@include('include.scripts')
@section('content')
<div class="container mt-5 loginContainer">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header fw-bold">
                    Iniciar Sesión
                </div>
                <div class="card-body">
 
                    <div class="mb-3 row">
                        <label for="email" class="col-form-label">Correo Electronico:</label>
                        <div class="col-sm-10">
                         <input type="text" class="form-control" id="email" onclick="resetCampos('msUSA')">
                          <div id="msUSA" class="text-start text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-form-label">Contraseña:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" onclick="resetCampos('msCLAVE')">
                        <div id="msCLAVE" class="text-start text-danger"></div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="validarcampos()">Ingresar</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
