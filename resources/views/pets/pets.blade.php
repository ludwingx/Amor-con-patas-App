
    <div class="pets-container">
        <div class="row">
            @foreach($vadoptionlist as $mascota)
            <div class="col-3 petCard">
              <a href="#" class="card" onclick="jsProfilePet({{ $mascota->id }})">
                
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset ($mascota->imagen_path) }}" class="card-img-bottom" alt="{{ $mascota->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $mascota->name }}</h5>
                    </div>
                </div>
              </a>

            </div>
        @endforeach
        </div>
    </div>