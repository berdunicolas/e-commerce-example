<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!--
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <!--
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> -->

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            href="https://getbootstrap.com/docs/5.3/assets/css/docs.css"
            rel="stylesheet"
        />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </head>
    <body class="bg-light" style="font-family: 'Gothic A1' !important; font-weight: 300;">
        <nav class="navbar bg-black">
            <div class="container-lg">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-tam-1.png') }}" alt="Logo" height="40" class="d-inline-block align-text-top">
              </a>

              <button type="button" class="btn border-2 border-light position-relative ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill text-light" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                </svg>
                <span class="position-absolute top-0 start-100 translate-middle p-2 bg-light rounded-circle">
                  <span class="visually-hidden">New alerts</span>
                </span>
              </button>
            </div>
        </nav>

        <main class="container-lg p-0 pb-5 bg-light ">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://media.istockphoto.com/id/973716000/photo/computer-programmer-working-over-new-software-in-office.jpg?s=612x612&w=0&k=20&c=Q6apyekoygNCkiCLYhl6hXR62caRdLWMwVD6peKQF-k=" class="d-block w-100 object-fit-cover" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://i.pinimg.com/736x/1c/07/08/1c0708a88937e5970cf48c40e7db6a7f.jpg" class="d-block w-100 object-fit-cover" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://plus.unsplash.com/premium_photo-1661497675847-2075003562fd?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y29ycG9yYXRlfGVufDB8fDB8fHww" class="d-block w-100 object-fit-cover" alt="...">
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
              </div>

              <div class="mt-5">
                <h2 class="display-5">Nuestros Cursos</h2>
                <div class="mt-4 row">
                  <div class="col-3 p-2">
                    <div class="card">
                      <img src="{{ asset('images/python.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Curso</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 p-2">
                    <div class="card">
                      <img src="{{ asset('images/python.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Curso</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 p-2">
                    <div class="card">
                      <img src="{{ asset('images/python.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Curso</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 p-2">
                    <div class="card">
                      <img src="{{ asset('images/python.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Curso</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 p-2">
                    <div class="card">
                      <img src="{{ asset('images/python.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Curso</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-3 p-2">
                    <div class="card">
                      <img src="{{ asset('images/python.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Curso</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Añadir al carrito</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </main>
        <div class="container-fluid bg-black pt-5" style=" height: 500px ">
          <div class="d-flex flex-column justify-content-between container-lg h-100">

            <div> 
              <img src="{{ asset('images/logo-tam-2.png') }}" alt="Logo" height="50" class="d-inline-block align-text-top">
            </div>

            <div>
              <p class="text-center text-light">Developed by 
                <span style="font-weight: 700";>
                  Nicolás E. Berdú 
                  <svg id="Componente_31_1" data-name="Componente 31 – 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 2445 2445">
                    <defs>
                      <filter id="Rectángulo_28">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur"/>
                        <feFlood flood-opacity="0.8" result="color"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur"/>
                        <feComposite operator="in" in="color"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_29">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-2"/>
                        <feFlood flood-opacity="0.8" result="color-2"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-2"/>
                        <feComposite operator="in" in="color-2"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_30">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-3"/>
                        <feFlood flood-opacity="0.8" result="color-3"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-3"/>
                        <feComposite operator="in" in="color-3"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_31">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-4"/>
                        <feFlood flood-opacity="0.8" result="color-4"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-4"/>
                        <feComposite operator="in" in="color-4"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_32">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-5"/>
                        <feFlood flood-opacity="0.8" result="color-5"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-5"/>
                        <feComposite operator="in" in="color-5"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_33">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-6"/>
                        <feFlood flood-opacity="0.8" result="color-6"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-6"/>
                        <feComposite operator="in" in="color-6"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_33-2">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-7"/>
                        <feFlood flood-opacity="0.8" result="color-7"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-7"/>
                        <feComposite operator="in" in="color-7"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                      <filter id="Rectángulo_33-3">
                        <feOffset input="SourceAlpha"/>
                        <feGaussianBlur stdDeviation="49.5" result="blur-8"/>
                        <feFlood flood-opacity="0.8" result="color-8"/>
                        <feComposite operator="out" in="SourceGraphic" in2="blur-8"/>
                        <feComposite operator="in" in="color-8"/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                      </filter>
                    </defs>
                    <circle id="Elipse_2" data-name="Elipse 2" cx="1222.5" cy="1222.5" r="1222.5"/>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_28-2" data-name="Rectángulo 28" width="337" height="1169" rx="168.5" transform="translate(560 326)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_28)">
                        <rect id="Rectángulo_28-3" data-name="Rectángulo 28" width="337" height="1169" rx="168.5" transform="translate(560 326)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_29-2" data-name="Rectángulo 29" width="337" height="565" rx="168.5" transform="translate(560 1554)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_29)">
                        <rect id="Rectángulo_29-3" data-name="Rectángulo 29" width="337" height="565" rx="168.5" transform="translate(560 1554)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_30-2" data-name="Rectángulo 30" width="336" height="566" rx="168" transform="translate(1057 326)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_30)">
                        <rect id="Rectángulo_30-3" data-name="Rectángulo 30" width="336" height="566" rx="168" transform="translate(1057 326)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_31-2" data-name="Rectángulo 31" width="336" height="1169" rx="168" transform="translate(1052 950)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_31)">
                        <rect id="Rectángulo_31-3" data-name="Rectángulo 31" width="336" height="1169" rx="168" transform="translate(1052 950)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_32-2" data-name="Rectángulo 32" width="336" height="1169" rx="168" transform="translate(1548 326)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_32)">
                        <rect id="Rectángulo_32-3" data-name="Rectángulo 32" width="336" height="1169" rx="168" transform="translate(1548 326)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_33-4" data-name="Rectángulo 33" width="336" height="565" rx="168" transform="translate(1548 1554)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_33)">
                        <rect id="Rectángulo_33-5" data-name="Rectángulo 33" width="336" height="565" rx="168" transform="translate(1548 1554)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_33-6" data-name="Rectángulo 33" width="336" height="565" rx="168" transform="translate(1548 1554)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_33-2)">
                        <rect id="Rectángulo_33-7" data-name="Rectángulo 33" width="336" height="565" rx="168" transform="translate(1548 1554)" fill="#fff"/>
                      </g>
                    </g>
                    <g data-type="innerShadowGroup">
                      <rect id="Rectángulo_33-8" data-name="Rectángulo 33" width="336" height="565" rx="168" transform="translate(1548 1554)" fill="#fff"/>
                      <g transform="matrix(1, 0, 0, 1, 0, 0)" filter="url(#Rectángulo_33-3)">
                        <rect id="Rectángulo_33-9" data-name="Rectángulo 33" width="336" height="565" rx="168" transform="translate(1548 1554)" fill="#fff"/>
                      </g>
                    </g>
                  </svg>
                </span>
              </p>
            </div>
          </div>
        </div>
    </body>
</html>
