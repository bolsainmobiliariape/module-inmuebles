<x-panel title="Informacion del inmueble" description="Llene todos los campos">
    @if(auth()->user()->isAdministrator())
    <div class="col-span-6"> 
        <label class="">
            <span class="text-gray-700">Agente</span>
            <select class="form-select mt-1 block w-full" wire:model="inmueble.user_id" required>
                <option value="">Selecciona agente</option>
                @foreach($users as $user) 
                <option value="{{ $user->id }}">{{$user->name}}</option>
                @endforeach
            </select>
            @error('operacion') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
        </label>
    </div>
    @else
    <input type="hidden" wire:model="inmueble.user_id" value="{{ auth()->user()->id }}">
    @endif

    <div class="col-span-6">
        <x-form.label for="operation" value="{{ __('Operacion') }}" />
        <select id="operation" class="form-select mt-1 block w-full" name="operation" wire:model="inmueble.operation" required>
            <option value="">Operacion</option>
            <option value="venta">Venta</option>
            <option value="alquiler">Alquiler</option>
        </select>
        @error('inmueble.operation') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-6">
        <x-form.label for="type" value="{{ __('Tipo de inmueble') }}" />
        <select id="type" class="form-select mt-1 block w-full" name="type" wire:model="inmueble.type" required>
            <option value="">Inmueble</option>
            <option value="casa">Casa</option>
            <option value="departamento">Departamento</option>
            <option value="terreno">Terreno</option>
            <option value="oficina">Oficina</option>
            <option value="local-comercial">Local comercial</option>
            <option value="local-industrial">Local industrial</option>
            <option value="habitacion">Habitación</option>
            <option value="otros">Otros</option>
        </select>
        @error('inmueble.type') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    <div class="col-span-6">
        <x-form.label for="departamento" value="{{ __('Departamento') }}" />
        <select id="departamento" class="form-select mt-1 block w-full" name="departamento_id" wire:model="departamentoid" required>
            <option value="">Departamento</option>
            @foreach($departamentos as $departamento)
            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endforeach
        </select>
        @error('departamentoid') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>
        
    <div class="col-span-6">
        <x-form.label for="provincia" value="{{ __('Provincia') }}" />
        <select id="provincia" class="form-select mt-1 block w-full" name="provincia_id" wire:model="provinciaid" required>
            <option value="">Provincia</option>
            @if($provincias)
            @foreach($provincias as $provincia)
            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
            @endforeach
            @endif
        </select>
        @error('provincia_id') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>
        
    <div class="col-span-6">
        <x-form.label for="distrito" value="{{ __('Distrito') }}" />
        <select id="distrito" class="form-select mt-1 block w-full" name="distrito_id" wire:model="distritoid" required>
            <option value="">Distrito</option>
            @if($distritos)
            @foreach($distritos as $distrito)
            <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
            @endforeach
            @endif
        </select>
        @error('distrito_id') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>
    
    <div class="col-span-6">
        <div class="grid grid-cols-2 gap-4">
            <x-form.image-field wire:model="picture.1" name="picture" label="Imagen {{ empty($inmueble->id) ? '*' : ''}}" :path="isset($inmueble->photo[0]) ? (string) url(Storage::url($inmueble->photo[0]->path)) : 'null'"/>
            <x-form.image-field wire:model="picture.2" name="picture" :path="isset($inmueble->photo[1]) ? (string) url(Storage::url($inmueble->photo[1]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.3" name="picture" :path="isset($inmueble->photo[2]) ? (string) url(Storage::url($inmueble->photo[2]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.4" name="picture" :path="isset($inmueble->photo[3]) ? (string) url(Storage::url($inmueble->photo[3]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.5" name="picture" :path="isset($inmueble->photo[4]) ? (string) url(Storage::url($inmueble->photo[4]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.6" name="picture" :path="isset($inmueble->photo[5]) ? (string) url(Storage::url($inmueble->photo[5]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.7" name="picture" :path="isset($inmueble->photo[6]) ? (string) url(Storage::url($inmueble->photo[6]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.8" name="picture" :path="isset($inmueble->photo[7]) ? (string) url(Storage::url($inmueble->photo[7]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.9" name="picture" :path="isset($inmueble->photo[8]) ? (string) url(Storage::url($inmueble->photo[8]->path)) : 'null'" />
            <x-form.image-field wire:model="picture.10" name="picture" :path="isset($inmueble->photo[9]) ? (string) url(Storage::url($inmueble->photo[9]->path)) : 'null'" />
        </div>
    </div>

    @if($map)
    <div class="col-span-6">
        <label class="col-span-6">
            <span class="text-gray-700">Ubicacion (Opcional)</span>
            <input class="form-input mt-1 block w-full" type="text" placeholder="Ubicacion" name="ubicacion" required wire:model="inmueble.ubication" value="{{ old('inmueble.ubicacion') }}" id="searchMap">
            @error('inmueble.ubication') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
        </label>
    </div>

    <div class="col-span-6">
        <input type="hidden" name="lng" id="lng" value="">
        <input type="hidden" name="lat" id="lat" value="">
        <div style="width: 100%; height: 400px" id="map" wire:ignore></div>
    </div>
    @endif
    

    <label class="col-span-6">
        <span class="text-gray-700">Area de terreno (Opcional)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Area de terreno" name="area_terreno" wire:model="inmueble.area_terreno">
        @error('inmueble.area_terreno') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </label>
     
      <label class="col-span-6">
        <span class="text-gray-700">Area Construida (Opcional)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Area construida" name="area_construida" wire:model="inmueble.area_construida">
        @error('inmueble.area_construida') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </label>
     
      <label class="col-span-6">
        <span class="text-gray-700">Dormitorios (Opcional)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Dormitorios" name="dormitorios" wire:model="inmueble.dormitorios">
        @error('inmueble.dormitorios') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </label>
     
      <label class="col-span-6">
        <span class="text-gray-700">Baños (Opcional)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Baños" name="banos" wire:model="inmueble.banos">
        @error('inmueble.banos') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </label>
     
      <label class="col-span-6">
        <span class="text-gray-700">Estacionamientos (Opcional)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Estacionamientos" name="estacionamientos" wire:model="inmueble.garages">
        @error('inmueble.garages') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </label>

      <label class="col-span-6">
        <span class="text-gray-700">Antiguedad (Opcional)</span>
        <select class="form-select mt-1 block w-full" wire:model="inmueble.antiguedad" name="antiguedad">
          <option value="">Seleccionar</option>
          <option value="En construccion">En construcción</option>
          <option value="A estrenar">A estrenar</option>
          <option value="Entre 5 y 10 años">Entre 5 y 10 años</option>
          <option value="Entre 10 y 20 años">Entre 10 y 20 años</option>
          <option value="Entre 20 y 30 años">Entre 20 y 30 años</option>
          <option value="Más de 30 años">Más de 30 años</option>
        </select>
        @error('inmueble.antiguedad') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
      </label>


    <label class="col-span-6">
        <span class="text-gray-700">Descripcion (*)</span>
        <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="Describre el inmueble" name="descripcion" wire:model="inmueble.description" required></textarea>
        @error('inmueble.descripcion') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </label>

    <label class="col-span-6">
        <span class="text-gray-700">Precio (*)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Precio" name="precio" wire:model="inmueble.price">
        @error('inmueble.price') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </label>

    <label class="col-span-6">
        <span class="text-gray-700">Precio soles (Opcional)</span>
        <input class="form-input mt-1 block w-full" type="number" placeholder="Precio Soles" wire:model="inmueble.soles">
        @error('inmueble.soles') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
    </label>

    @if($map)
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GMAP_KEY') }}&callback=initMap&libraries=places" async defer></script> 
    <script>
            var map;
            var marker;
            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: {{null!=null? null : '-12.025932'}}, 
                    lng: {{null!=null? null : '-76.9141305'}}
                },
                zoom: 15
                });
                marker = new google.maps.Marker({
                position: {
                    lat: {{null!=null? null : '-12.025932'}}, 
                    lng: {{null!=null? null : '-76.9141305'}}
                },
                map:map,
                draggable: true
                });

                var searchBox = new google.maps.places.Autocomplete(document.getElementById('searchMap'));
                searchBox.setComponentRestrictions(
                    {'country': ['pe']});
                searchBox.addListener('place_changed',function(){
                var place = searchBox.getPlace();
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                    marker.setPosition(place.geometry.location);
                } else {
                    map.setCenter(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                });
            }


        document.addEventListener('livewire:load', function () {
            google.maps.event.addListener(marker,'position_changed',function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                @this.set('inmueble.lat', lat)
                @this.set('inmueble.lng', lng)
            }); 
        })
    </script>
    @endif
</x-panel>