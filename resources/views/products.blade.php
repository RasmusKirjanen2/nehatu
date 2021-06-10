@extends('layout.mainlayout')
@section('content')


   
        <div class="col-md-12 col-sm-12 carousel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            
                <div class="carousel-item active">
                <img src="/css/images/banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item ">
                <img src="/css/images/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="/css/images/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            
            
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
  


    <div class="container">

        <div class="row">
            <div class="col-md-7 col-12">
                <h2 class="main-title">NEHATU</h2>
            </div>
        </div>

        <div class="row row1">

            <div class="col-md-5 col-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce malesuada odio in efficitur rutrum. Integer maximus pulvinar neque cursus vehicula. Etiam semper libero id est porttitor viverra. Curabitur ultricies est nec neque hendrerit, a semper sem gravida. Donec fermentum condimentum magna, quis tristique turpis rhoncus venenatis. </p>
            </div>

            <div class="col-md-7 col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="css/images/7.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="css/images/8.png" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="css/images/9.png" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="product-wrapper">

        <div class="container">
        
            <h2 class="menu-title">Menüü</h2>

            @foreach($products->chunk(3) as $productChunk)
                <div class="row">
                    @foreach ($productChunk as $product)
                        <div class="col-md-4 col-12">
                            <div class="products-container">
                                <h3 class="product-title">
                                    <a href="/products/{{ $product->id }}" class="product-title">{{ $product->product_name }}</a>
                                </h3>

                                @if(!empty($product->factory_img))
                                <a href="/products/{{ $product->id }}">
                                    <img src="{{ $product->factory_img }}" class="img-fluid"/>
                                </a>    
                                @elseif((!empty($product->upload_img)))
                                <a href="/products/{{ $product->id }}">
                                    <img src="storage/uploads/{{ $product->upload_img }}" class="img-fluid"/>
                                </a>    
                                @else

                                @endif

                                <?php
                                $pieces = explode(" ", $product->product_desc);
                                $product_desc = implode(" ", array_splice($pieces, 0, 20));

                                //  <p>{{ substr($product->product_desc, 0, 120) }}</p>
                                ?>

                                <div class="product-desc">
                                    <p>{{ $product_desc }}</p>
                                </div>

                                @auth

                                    <a href="/products/edit/{{ $product->id }}" class="btn btn-light">Edit</a>
                                    <a href="/products/delete/{{ $product->id }}" class="btn btn-danger">Delete</a>

                                @endauth

                                    <a href="" class="btn add-to-cart">Lisa ostukorvi</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            <div class="row">
                <div class="col-md-4 col-12">
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row row2">
            <div class="col-md-5 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="box1"><img src="css/images/2.png" class="image" /></div>
                    </div>
                   
                </div>
            </div>
            <div class="col-md-5 col-12 align-vertical-middle">
                <h3 class="title">Lorem ipsum dolor sit amet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <a href="/products" class="show-btn">Vaata</a>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row row3">
            <div class="col-md-5 col-12 align-vertical-middle">
                <h3 class="title">Lorem ipsum dolor sit amet</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                <a href="/products" class="show-btn">Vaata</a>
            </div>
            <div class="col-md-5 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="box1"><img src="css/images/3.png" class="image" /></div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="bg-color1">
        <div class="container">
            <h3 class="title">Viimased uudised</h3>
            <div class="row row4">
                <div class="col-md-4 col-12">
                    <div class="box3"><img src="css/images/4.png" class="image" /></div>
                    <h5 class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                </div>
                <div class="col-md-4 col-12">
                    <div class="box3"><img src="css/images/5.png" class="image" /></div>
                    <h5 class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                </div>
                <div class="col-md-4 col-12">
                    <div class="box3"><img src="css/images/6.png" class="image" /></div>
                    <h5 class="title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat...</p>
                </div>

            </div>
        </div>
    </div>


@endsection
