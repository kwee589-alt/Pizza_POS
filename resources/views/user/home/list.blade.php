@extends('user.layouts.master')



@section('content')
    <div class="container-fluid p-0">



        <!-- 2. Hero Card (Navbar နဲ့ မထိအောင် Margin Top ပေးထားပါတယ်) -->
        <div class="container-fluid px-3 px-md-5 mt-n5" style="margin-top: -95px;">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden"
                style="background-image: url('{{ asset('user/img/photo_2026-01-09_04-45-45.jpg') }}');
                   min-height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">

                <div class="card-body d-flex align-items-center">
                    <div class="container">
                        <div class="row w-100">
                            <div class="col-lg-6 d-none d-lg-block"></div>
                            <div
                                class="col-lg-5 col-md-8 text-white text-center text-md-start bg-dark bg-opacity-25 p-4 rounded">
                                <h4 class="mb-0 text-white fw-bold">CHOOSE YOUR IDEAL</h4>
                                <h4 class="fw-bold text-white">PORTION OR SIZE</h4>
                                <div class="my-4">
                                    <h1 class="text-warning display-4 fw-bold">30% OFF</h1>
                                    <h5 class="fw-bold">DISCOUNT ONLINE</h5>
                                    <p class="small opacity-75">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Facilis aperiam deserunt et numquam natus accusamus quas dicta quam maiores earum.
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h6 class="mb-0 text-warning">DELIVERY</h6>
                                    <p class="fw-bold">+95 09250016897</p>
                                </div>
                                <button class="btn btn-warning px-4 py-2 fw-bold rounded-pill shadow">Order Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Section Start -->
        <div class="container-fluid px-3 px-md-5 mt-5" style="margin-top: -95px;">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden"
                style="background-image: url('{{ asset('user/img/photo_2026-01-09_06-07-41.jpg') }}');
                   min-height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">

                <div class="card-body d-flex align-items-center">
                    <div class="container py-5">
                        <div class="tab-class text-center">
                            <!-- Header Row -->
                            <h2 class="section-title"><span>[</span> Choose Our Best Taste<span>]</span></h2>

                            <!-- Product Grid Area -->
                            <div class="col-12 ">
                                <div class="row g-4">

                                    @foreach ($products as $item)
                                        <!-- Product Item 1: *** col-xl-3 သို့ ပြောင်းလိုက်ပါပြီ *** -->
                                        <div class="col-sm-6 col-md-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item  h-100">
                                                <div class="fruite-img overflow-hidden rounded-top">
                                                    <a href="{{ route('userList#details', $item->id) }}">
                                                        <img src="{{ str_contains($item->image, 'http') ? $item->image : asset('product/' . $item->image) }}"
                                                            style="height: 200px; object-fit: cover;"
                                                            class="img-fluid w-100" alt="Grapes">
                                                    </a>
                                                </div>
                                                <div class="text-white  px-3 py-1 rounded position-absolute"
                                                    style="top: 10px; left: 10px; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px);  border: 1px solid rgba(255,255,255,0.1);">
                                                    {{ $item->category_name }}</div>
                                                <div class="p-4 border d-flex flex-column flex-grow-1 h-50 border-secondary border-top-0 rounded-bottom"
                                                    style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); height:300px; border: 1px solid rgba(255,255,255,0.1);">
                                                    <h4 class="text-start text-warning">{{ $item->name }}</h4>
                                                    <p class="text-start small mb-3">{{ $item->description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap mt-auto">
                                                        <p class="text-white  fs-5 fw-bold mb-0">{{ $item->price }} mmk</p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach




                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Products Section Start -->
        <div class="container-fluid px-3 px-md-5 mt-5" style="margin-top: -95px;">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden"
                style="background-image: url('{{ asset('user/img/photo_2026-01-09_06-07-41.jpg') }}');
                   min-height: 100vh; background-position: center; background-repeat: no-repeat; background-size: cover;">

                <div class="card-body d-flex align-items-center">
                    <div class="container py-5">
                        <div class="tab-class text-center">
                            <!-- Header Row -->
                            <div class="row g-4 align-items-center mb-5">
                                <div class="col-lg-4 text-center text-lg-start">
                                    <h1 class="mb-0">Our Organic Products</h1>
                                </div>
                                <div class="col-lg-8 text-center text-lg-end">
                                    <ul class="nav nav-pills d-inline-flex text-center">
                                        <li class="nav-item">
                                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" href="">
                                                <span class="text-dark" style="width: 130px;">All Products</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-4">
                                        <!-- Sidebar (Search & Filter) -->
                                        <div class="col-3">
                                            <div class="form">
                                                <form action="{{ route('userHome') }}" method="get">
                                                    @csrf
                                                    <div class="input-group">
                                                        <input type="text" name="searchKey"
                                                            value="{{ request('searchKey') }}" class=" form-control"
                                                            placeholder="Enter Search Key...">
                                                        <button type="submit" class=" btn"> <i
                                                                class="fa-solid fa-magnifying-glass"></i> </button>
                                                    </div>
                                                </form>
                                            </div>




                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <form action="{{ route('userHome') }}" method="get">
                                                        @csrf
                                                        <input type="text" name="minPrice"
                                                            value="{{ request('minPrice') }}"
                                                            placeholder="Minimum Price..." class=" form-control my-2">
                                                        <input type="text" name="maxPrice"
                                                            value="{{ request('maxPrice') }}"
                                                            placeholder="Maximun Price..." class=" form-control my-2">
                                                        <input type="submit" value="Search"
                                                            class=" btn btn-success my-2 w-100">
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <form action="{{ route('userHome') }}" method="get">

                                                        <select name="sortingType"
                                                            class="form-control w-100 bg-white mt-3">
                                                            <option value="name,asc">Alphabet A - Z</option>
                                                            <option value="name,desc">Alphabet Z - A</option>
                                                            <option value="price,asc">Price Lowest to Highest</option>
                                                            <option value="price,desc">Price Hightest to Lowest</option>
                                                            <option value="created_at,asc">Date Asc to Desc</option>
                                                            <option value="created_at,desc">Date Desc to Asc</option>


                                                        </select>

                                                        <input type="submit" value="Sort"
                                                            class=" btn btn-success my-3 w-100">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Grid Area -->
                                        <div class="col-12 col-lg-9">
                                            <div class="row g-4">

                                                @foreach ($products as $item)
                                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                                        <div class="rounded position-relative fruite-item  h-100">
                                                            <div class="fruite-img overflow-hidden rounded-top">
                                                                <a href="{{ route('userList#details', $item->id) }}">
                                                                    <img src="{{ str_contains($item->image, 'http') ? $item->image : asset('product/' . $item->image) }}"
                                                                        style="height: 200px; object-fit: cover;"
                                                                        class="img-fluid w-100" alt="Grapes">
                                                                </a>
                                                            </div>
                                                            <div class="text-white  px-3 py-1 rounded position-absolute"
                                                                style="top: 10px; left: 10px; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px);  border: 1px solid rgba(255,255,255,0.1);">
                                                                {{ $item->category_name }}</div>
                                                            <div class="p-4 border d-flex flex-column flex-grow-1 h-50 border-secondary border-top-0 rounded-bottom"
                                                                style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); height:300px; border: 1px solid rgba(255,255,255,0.1);">
                                                                <h4 class="text-start text-warning">{{ $item->name }}
                                                                </h4>
                                                                <p class="text-start small mb-3">{{ $item->description }}
                                                                </p>
                                                                <div
                                                                    class="d-flex justify-content-between flex-lg-wrap mt-auto">
                                                                    <p class="text-white  fs-5 fw-bold mb-0">
                                                                        {{ $item->price }} mmk</p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid fruite py-5 mt-5">

            </div>

        </div>


        <!-- Products Section Start -->
        <div class="container-fluid px-3 px-md-5 mt-2" style="margin-top: -95px;">
            <div class="card border-0 shadow-lg rounded-5 overflow-hidden"
                style="background-image: url('{{ asset('user/img/dark_pizza.jpg') }}');
                   min-height: 200vh; background-position: center; background-repeat: no-repeat; background-size: cover;">






                <section class="delivery-section"
                    style="background-image: url('{{ asset('user/img/dark_pizza.jpg') }}');
                   min-height: 200vh; background-position: center; background-repeat: no-repeat; background-size: cover;">
                    <h2 class="section-title"><span>[</span> Our Best Delivered <span>]</span></h2>

                    <div class="delivery-card">
                        <div class="card-image">
                            <img src="{{ asset('user/img/end_pizza.jpg') }}" alt="Breakfast Specials">
                        </div>
                        <div class="card-content">
                            <h3>Breakfast Specials</h3>
                            <p>Explore our top-rated food categories, crafted to satisfy every craving! From delicious
                                breakfasts.</p>
                            <div class="card-footer">
                                <span class="price text-white">100000 mmk</span>

                            </div>
                        </div>
                    </div>

                    <div class="delivery-card">
                        <div class="card-image">
                            <img src="{{ asset('user/img/two_pizza.jpg') }}" alt="Breakfast Specials">
                        </div>
                        <div class="card-content">
                            <h3>Breakfast Specials</h3>
                            <p>Explore our top-rated food categories, crafted to satisfy every craving! From delicious
                                breakfasts.</p>
                            <div class="card-footer">
                                <span class="price text-white">85000 mmk</span>

                            </div>
                        </div>
                    </div>

                    <div class="delivery-card">
                        <div class="card-image">
                            <img src="{{ asset('user/img/cheese_pz.jpg') }}" alt="Breakfast Specials">
                        </div>
                        <div class="card-content">
                            <h3>Breakfast Specials</h3>
                            <p>Explore our top-rated food categories, crafted to satisfy every craving! From delicious
                                breakfasts.</p>
                            <div class="card-footer">
                                <span class="price text-white">70000 mmk</span>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


    </div>


    </div>
@endsection
