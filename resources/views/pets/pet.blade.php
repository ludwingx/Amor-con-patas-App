
@section('Cargadato')
    @foreach ($datosmascota as $datosmascota) )
        

    <div class="container petContainer">
        <div class="row">
            <div class="col-6 petImg">
                <img src="{{ asset($datosmascota->imagen_path) }}" class="card-img-bottom" alt="{{ $datosmascota->name }}">
                <div class="pet-guardian" >
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Refugio</h5>
                            <p class="card-text"> <span class="fw-bold">Nombre:</span>
                                {{ $datosmascota->guardian_name }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Asociación:</span>
                                 {{ $datosmascota->guardian_association }}
                                </p>
                            <p class="card-text"> <span class="fw-bold">Email:</span>
                                {{ $datosmascota->guardian_email }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Requerimientos para adoptar:</span> 
                                {{ $datosmascota->adoption_requirements }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="pet-details">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $datosmascota->name }}</h5>
                            <p class="card-text"> <span class="fw-bold">Genero:</span>
                                {{ $datosmascota->gender }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Edad:</span>
                                {{ $datosmascota->age }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Tamaño:</span>
                                {{ $datosmascota->size }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Sociable con:</span>
                                {{ $datosmascota->sociable_with }}
                            </p>
                            <p class="card-text"> <span class="fw-bold">Ubicación:</span>
                                {{ $datosmascota->location }}
                            </p>
                        </div>

                    </div>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    
                    <a href="#" onclick="adoptionForm({{ $datosmascota->id }} )" class="btn btn-primary" target="_blank">Adoptar</a>
                    <button class="btn btn-primary" type="button" >Button</button>
                  </div>
            </div>

        </div>
    </div>
    @endforeach
@endsection
 

