@extends('user.layouts.master')


@section('content')
    <!-- single product  -->
    <div class="container-fluid text-white py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <a href="{{ route('userHome') }}"> Home </a> <i class=" mx-1 mb-4 fa-solid fa-greater-than"></i> Details
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="border rounded overflow-hidden ">
                                <a href="#">
                                    <img src="{{ $product->image }}" style="height: 300px; object-fit:cover;"
                                        class="img-fluid w-100 rounded" alt="Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h4 class="fw-bold text-warning">{{ $product->name }} </h4>
                            <span class=" fw-bold text-danger">({{ $product->available_item }} items left ! )</span>
                            <p class="mb-3">Category: {{ $product->category_name }}</p>
                            <h5 class="fw-bold mb-3 text-white">{{ $product->price }} mmk</h5>
                            <div class="d-flex mb-4">

                                @php
                                    $stars = number_format($rating);
                                @endphp


                                @for ($i = 1; $i <= $stars; $i++)
                                    <i class="fa fa-star text-secondary"></i>
                                @endfor

                                @for ($j = $stars + 1; $j <= 5; $j++)
                                    <i class="fa fa-star "></i>
                                @endfor



                            </div>

                            <div class="mb-2">
                                <i class="fas fa-eye"></i> <span class="fw-bold"> {{ $view_count }}</span>
                            </div>

                            <p class="mb-3">Description: {{ $product->description }}</p>
                            <p class="mb-4"></p>
                            <form action="{{ route('userList#addToCart') }}" method="post">
                                @csrf
                                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <div class="input-group quantity mb-5" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" name="count"
                                        class="form-control form-control-sm text-white text-center border-0 "
                                        style="background-color: black" id="quantity" value="1">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</button>

                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                        class="fa-solid fa-star me-2 text-secondary"></i> Rate this product</button>
                            </form>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Rate this product
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>


                                        <form action="{{ route('userList#rating') }}" method="post">
                                            @csrf
                                            <div class="modal-body">

                                                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="productId" value="{{ $product->id }}">


                                                <div class="rating-css">
                                                    <div class="star-icon">
                                                        @if ($user_rating == 0)
                                                            <input type="radio" value="1" name="productRating"
                                                                checked id="rating1">
                                                            <label for="rating1" class="fa fa-star"></label>
                                                            <input type="radio" value="2" name="productRating"
                                                                id="rating2">
                                                            <label for="rating2" class="fa fa-star"></label>
                                                            <input type="radio" value="3" name="productRating"
                                                                id="rating3">
                                                            <label for="rating3" class="fa fa-star"></label>
                                                            <input type="radio" value="4" name="productRating"
                                                                id="rating4">
                                                            <label for="rating4" class="fa fa-star"></label>
                                                            <input type="radio" value="5" name="productRating"
                                                                id="rating5">
                                                            <label for="rating5" class="fa fa-star"></label>
                                                        @else
                                                            @php
                                                                $userRating = number_format($user_rating);
                                                            @endphp
                                                            @for ($i = 1; $i <= $userRating; $i++)
                                                                <input type="radio" value="{{ $i }}"
                                                                    name="productRating" checked
                                                                    id="rating{{ $i }}">
                                                                <label for="rating{{ $i }}"
                                                                    class="fa fa-star"></label>
                                                            @endfor
                                                            @for ($j = $userRating + 1; $j <= 5; $j++)
                                                                <input type="radio" value="{{ $j }}"
                                                                    name="productRating" id="rating{{ $j }}">
                                                                <label for="rating{{ $j }}"
                                                                    class="fa fa-star"></label>
                                                            @endfor
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Rating</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button"
                                        role="tab" id="nav-about-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-about" aria-controls="nav-about"
                                        aria-selected="true">Description</button>
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Customer Comments

                                        <span
                                            class=" btn btn-sm btn-secondary rounted shadow-sm">{{ count($comment) }}</span>

                                    </button>


                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <div class="tab-pane active" id="nav-about" role="tabpanel"
                                    aria-labelledby="nav-about-tab">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="tab-pane" id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">


                                    @foreach ($comment as $item)
                                        <div class="d-flex mb-2">
                                            <img src="{{ Auth::check() && Auth::user()->profile
                                                ? (str_contains(Auth::user()->profile, 'http')
                                                    ? Auth::user()->profile
                                                    : asset('profile/' . Auth::user()->profile))
                                                : asset('admin/img/undraw_profile.svg') }}"
                                                style="width: 35px; height: 35px; object-fit: cover;"
                                                class="rounded-circle me-2" alt="User">
                                            <div class="">
                                                <p class="" style="font-size: 14px;">
                                                    {{ $item->created_at->format('j-F-Y / h:i A') }}
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <h5>{{ $item->user_name }}</h5>
                                                    @if ($item->user_id == Auth::user()->id)
                                                        <a href="{{ route('userList#deleteComment', $item->id) }}">
                                                            <button class="btn btn-sm btn-outline-danger ms-3"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </a>
                                                    @endif
                                                </div>
                                                <p>{{ $item->message }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>


                                </div>
                                <div class="tab-pane" id="nav-vision" role="tabpanel">
                                    <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et
                                        tempor
                                        sit. Aliqu diam
                                        amet diam et eos labore. 3</p>
                                    <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos
                                        labore.
                                        Clita erat ipsum et lorem et sit</p>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('userList#comment') }}" method="post">
                            @csrf
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <h4 class="mb-5 fw-bold">
                                Leave a Comments

                            </h4>

                            <div class="row g-1">

                                <div class="col-lg-12">
                                    <div class="border-bottom rounded ">
                                        <textarea name="comment" id="" class="form-control border-0 shadow" cols="30" rows="8"
                                            placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>

                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                        <button type="submit"
                                            class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                            Post
                                            Comment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>





            </div>




            @if (count($productList) != 0)
                <h1 class="mb-3 fw-bold">Related products</h1>
            @endif

            <div class=" @if (count($productList) >= 3) owl-carousel vegetable-carousel justify-content-center @endif "
                style="@if (count($productList) < 3) width:280px; @endif ">


                @foreach ($productList as $item)
                    @if ($product->id != $item->id)
                        <div class="border border-primary rounded  d-flex flex-column position-relative vesitable-item">
                            <div class="fruite-img overflow-hidden rounded-top ">

                                <img src="{{ str_contains($item->image, 'http') ? $item->image : asset('product/' . $item->image) }}"
                                    style="height: 320px; object-fit: cover;"
                                    class=" @if (count($productList) >= 3) img-fluid w-100 @endif" alt="Grapes">
                            </div>
                            <div class="text-white  px-3 py-1 rounded position-absolute"
                                style="top: 10px; left: 10px; background: rgba(0,0,0,0.6); backdrop-filter: blur(5px);  border: 1px solid rgba(255,255,255,0.1);">
                                {{ $item->category_name }}</div>
                            <div class="p-4 border d-flex flex-column flex-grow-1 h-50  border-secondary border-top-0 rounded-bottom"
                                style="height: 200px">
                                <h4 class="text-center text-warning">{{ $item['name'] }}</h4>

                                <p class="text-center">
                                    {{ Str::words($item['description'], 10, '...') }}
                                </p>

                                <div class="d-flex justify-content-between  flex-lg-wrap mt-auto">
                                    <p class="text-white fs-5 fw-bold mb-0">{{ $item->price }} mmk
                                    </p>

                                </div>


                            </div>
                        </div>
                    @endif
                @endforeach

            </div>



        </div>


    </div>

    <!-- Single Product End -->
@endsection

@section('content')
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // + ခလုတ်အတွက်
            $('.btn-plus').click(function() {
                var input = $('#quantity');
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal)) {
                    input.val(currentVal + 1);
                }
            });

            // - ခလုတ်အတွက်
            $('.btn-minus').click(function() {
                var input = $('#quantity');
                var currentVal = parseInt(input.val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    input.val(currentVal - 1);
                }
            });
        });
    </script>
@endsection
