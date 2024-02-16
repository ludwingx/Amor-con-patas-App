@extends('layouts.app')
@include('include.scripts')
@section('content')
<div class="container mt-5 loginContainer">
    <div class="row justify-content-center">
        <form>
            <div class="mb-3">
              <label  class="form-label">Nombre</label>
              <input type="name"  id="name"   >
        
            </div>
            <div class="mb-3">
                <label  class="form-label">Correo Electronico</label>
                <input type="email"  id="email" >
          
              </div>
            <div class="mb-3">
              <label  class="form-label">Contraseña</label>
              <input type="password"  id="password" >
            </div>
        
            <button type="submit" class="btn btn-primary" onclick="createUser()">Registrar</button>
          </form> 
    </div>
    
</div>
@endsection