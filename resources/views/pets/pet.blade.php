@extends('layouts.app')

@section('content')
 {{-- gender, age, size, sociable_with, location, guardian_name, guardian_association, guardian_email, adoption_requirements --}}
    <div class="container petContainer">
        <div class="row">
            <div class="col-6 petImg">
                <img src="{{ asset($mascota->imagen_path) }}" class="card-img-bottom" alt="{{ $mascota->name }}">
                <div class="pet-guardian" >
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Refugio</h5>
                            <p class="card-text"> <span class="fw-bold">Nombre:</span>
                                {{ $mascota->guardian_name }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Asociación:</span>
                                 {{ $mascota->guardian_association }}
                                </p>
                            <p class="card-text"> <span class="fw-bold">Email:</span>
                                {{ $mascota->guardian_email }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Requerimientos para adoptar:</span> 
                                {{ $mascota->adoption_requirements }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="pet-details">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mascota->name }}</h5>
                            <p class="card-text"> <span class="fw-bold">Genero:</span>
                                {{ $mascota->gender }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Edad:</span>
                                {{ $mascota->age }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Tamaño:</span>
                                {{ $mascota->size }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Sociable con:</span>
                                {{ $mascota->sociable_with }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Ubicación:</span>
                                {{ $mascota->location }}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    
                    <a href="#" onclick="adoptionForm({{ $mascota->id }} )" class="btn btn-primary" target="_blank">Adoptar</a>
                    <button class="btn btn-primary" type="button" >Button</button>
                  </div>
            </div>

        </div>
    </div>
@endsection
 

