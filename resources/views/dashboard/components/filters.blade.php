<div>
    <div class="web-width">
      <section class="filtro-top">
        <form wire:submit.prevent="submit">
          <select wire:model="operacion" class="filtro-top__input filtro-top__mobile1">
            <option value="">Operación</option>
            <option value="venta">Venta</option>
            <option value="alquiler">Alquiler</option>
          </select>
          <select wire:model="tipo" class="filtro-top__input filtro-top__mobile2">
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
          <select wire:model="preciomin" class="filtro-top__input filtro-top__mobile">
            <option value="">Precio mín</option>
            <option value="0">$0</option>
            <option value="50000">$50,000</option>
            <option value="75000">$75,000</option>
            <option value="100000">$100,000</option>
            <option value="150000">$150,000</option>
            <option value="200000">$200,000</option>
            <option value="250000">$250,000</option>
            <option value="300000">$300,000</option>
            <option value="400000">$400,000</option>
            <option value="500000">$500,000</option>
            <option value="1000000">$1,000,000</option>
          </select>
          <select wire:model="preciomax" class="filtro-top__input filtro-top__mobile">
            <option value="">Precio máx</option>
            <option value="50000">$50,000</option>
            <option value="75000">$75,000</option>
            <option value="100000">$100,000</option>
            <option value="150000">$150,000</option>
            <option value="200000">$200,000</option>
            <option value="250000">$250,000</option>
            <option value="300000">$300,000</option>
            <option value="400000">$400,000</option>
            <option value="500000">$500,000</option>
            <option value="1000000">$1,000,000</option>
            <option value="10">+ $1,000,000</option>
          </select>
          <select wire:model="dormitorios" class="filtro-top__input filtro-top__mobile">
            <option value="0">Dormitorios</option>
            <option value="1">1 dormitorio</option>
            <option value="2">2 dormitorios</option>
            <option value="3">3 dormitorios</option>
            <option value="4">4 dormitorios</option>
            <option value="5">5 o más dormitorios</option>
          </select>
          <input wire:model="ubicacion" class="filtro-top__location" type="search" placeholder="Escribir distrito">
          <button wire:target="submit" type="submit" class="filtro-top__button">
            <div class="icon-search"><i class="fas fa-search"></i><span class="icon-search-text">Buscar</span></div>
          </button>
        </form>
      </section>
    </div>
    <div class="web-width">
      <section class="contador-resultados">
        <div class="contador-resultadosA ie-grid__1">
          <h1 class="contador-resultadosA__text">
            <strong>{{ $inmuebles->total()}}</strong>
            <span class="contador-resultadosA__main">
              {{ $title }}
            </span>
          </h1>
        </div>
      </section>
    </div>
  
    <div class="web-width">
      <div class="anuncios">
        @foreach($inmuebles as $inmueble)
        <a href="{{ route('inmuebles.show', $inmueble->slug) }}">
          <div class="anuncio ie-grid__1">
            <img class="anuncio__picture" src="{{ Storage::url($inmueble->imagen()) }}" alt="{{ $inmueble->titulo() }}">
            <div class="anuncio__contenedortexto">
              <h2 class="anuncio__title">{{ $inmueble->titulo() }}</h2>
              <div class="anuncio__location">{{ $inmueble->ubicacion }}</div>
              <div class="anuncio__contenedor3">
                <div class="anuncio__data">{{ $inmueble->data() }}</div>
                <div class="anuncio__prize">US$ {{ $inmueble->price }}</div>
              </div>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  
    {{-- <link rel="stylesheet" href="{{asset('css/app.css') }}"> --}}
    <div class="pagination web-width">
    {{ $inmuebles->links() }}
    </div>
</div>
  