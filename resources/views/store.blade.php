<x-store-layout>
  <x-store-navbar/>

  <main class="container-lg p-0 pb-5 bg-light ">
    <!--
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="{{ asset('images/Image-not-found.png') }}" class="d-block w-100 img-fluid object-fit-cover" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="{{ asset('images/Image-not-found.png') }}" class="d-block w-100 img-fluid object-fit-cover" alt="...">
            </div>
            <div class="carousel-item">
              <img src="{{ asset('images/Image-not-found.png') }}" class="d-block w-100 img-fluid object-fit-cover" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>-->

        <div class="mt-5">
          <h2 class="display-5">Nuestras Prendas</h2>
          <div class="mt-4 row">
            @for ($i=0; $i<7; $i++) 
              <div class="col-3 p-2">
                <div class="card">
                  <img src="{{ asset('images/image-not-found.png') }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Prenda</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-dark">Añadir al carrito</a>
                  </div>
                </div>
              </div>
            @endfor
  </main>
  <x-store-footer/>
</x-store-layout>

