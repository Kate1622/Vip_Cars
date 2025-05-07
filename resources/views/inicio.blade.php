@extends('layout.apppagina')
@section('content')


    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last">
                            <img class="img-fluid" src="./assetsPagina/img/log2.png" alt="Visión"
                            style="border-radius: 80% 115% 60% 40% / 40% 60% 20% 80%;
                            max-width: 400px;
                            height: auto;
                            object-fit: cover;
                            transition: transform 0.3s ease-in-out; ">
                        </div>
                        <div class="col-lg-8 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">👁️ Atención</h1>
                                <h3 class="h2">🌟 Por lanzamiento exclusivo en el departamento de San Martín de productos de la marca "Vikingo"</h3>
                                <p>
                                    ¡Aprovecha descuentos <strong>especiales e imperdibles</strong> por <strong>tiempo limitado</strong>!<br>
                                    Las promociones estarán disponibles durante <strong>7 días</strong> o hasta agotar stock.
                                </p>
                                <p>
                                    <strong>Stock disponible por punto de recojo:</strong><br>
                                    - Shampoo y bálsamo: <strong>12 unidades</strong><br>
                                    - Otros productos: <strong>6 unidades</strong>
                                </p>
                                <p>
                                    <strong>Importante:</strong> Estas promociones aplican únicamente para compradores que acrediten, con su DNI, residencia en el <strong>departamento de San Martín</strong> y recojan el producto en los <strong>puntos habilitados dentro del mismo departamento</strong>.
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last">
                            <img class="img-fluid" src="./assetsPagina/img/mision1.png" alt=""  style="border-radius: 80% 115% 60% 40% / 40% 60% 20% 80%;
                            max-width: 400px;
                            height: auto;
                            object-fit: cover;
                            transition: transform 0.3s ease-in-out;">
                        </div>
                        <div class="col-lg-8 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">🎯 Misión</h1>
                                <h3 class="h2"> 💋 Inspirar belleza real, sin límites ni etiquetas</h3>
                                <p>
                                    “Ofrecemos experiencias de belleza y cuidado personal con calidad, estilo y calidez, a través de productos innovadores pensados para tu bienestar. Crecemos contigo, impulsando el emprendimiento y el desarrollo desde Soritor, San Martín hacia todo el Perú.”

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item  ">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-4 order-lg-last d-flex justify-content-center">
                            <img class="img-fluid shadow-lg carousel1" src="./assetsPagina/img/logoo.jpg"
                                alt="Logo"
                                style="border-radius: 80% 115% 60% 40% / 40% 60% 20% 80%;
                                        max-width: 400px;
                                        height: auto;
                                        object-fit: cover;
                                        transition: transform 0.3s ease-in-out;">
                        </div>
                        <div class="col-lg-8 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">🏆 Visión</h1>
                                <h3 class="h2"> 🔷 "Inspirando confianza y empoderamiento a través de la belleza, el bienestar y el emprendimiento en todo el Perú."</h3>
                                <p>
                                    Ser una marca líder en belleza y cuidado personal del Perú, transformando vidas a través de experiencias y oportunidades de emprendimiento, con productos de calidad y una red de personas que inspiran confianza, bienestar y empoderamiento.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        

            
        </div>

        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
            role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuestras Líneas de Producto</h1>
                <p>LÍNEAS DESTACADAS</p>
            </div>
        </div>
        <div class="row " >
            
            <div class="col-12 col-md-2 mb-2"></div>
            <div class="col-12 col-md-4 mb-4" style="" >
                <div class="card h-100 product-wap">
                    <a href="/mujeres">
                        <img src="/assetsPagina/img/lineaFemenina.png" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            {{-- <li class="text-muted text-right">$240.00</li> --}}
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">👠 Línea Femenina</a>
                        <p class="card-text">
                            Valkiria es una marca de productos de belleza que busca empoderar a las mujeres a través de la
                            belleza. Con una amplia gama de productos, desde maquillaje hasta cuidado de la piel, Valkiria
                        </p>
                        <p class="text-muted">productos (+25)</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card h-100 product-wap">
                    <a href="/hombres">
                        <img src="/assetsPagina/img/lineaMasculina.png" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <ul class="list-unstyled d-flex justify-content-between">
                            <li>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-warning fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                                <i class="text-muted fa fa-star"></i>
                            </li>
                            {{-- <li class="text-muted text-right">$480.00</li> --}}
                        </ul>
                        <a href="shop-single.html" class="h2 text-decoration-none text-dark">👔  Línea Masculino</a>
                        <p class="card-text">
                            Shampo, Balsamo, Ceras y Gorras de la marca Vikingo.
                        </p>
                        <p class="text-muted">Productos (+38)</p>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-md-2 mb-2"></div>
        </div>

    </section>


@endsection
