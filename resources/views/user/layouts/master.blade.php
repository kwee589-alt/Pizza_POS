<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('user/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('user/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('user/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('user/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/ratingStar.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/discount_card.css') }}">
</head>

<body style="background-color: black;">

    <!-- 1. Navbar ကို Card ရဲ့ အပြင်မှာ ထားပြီး sticky-top ပေးလိုက်ပါ -->
    <div class="sticky-top w-100" style="z-index: 1050;">
        <div class="container py-3">
            <nav class="navbar navbar-expand navbar-dark rounded-pill px-4 py-2 shadow"
                style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);">

                <a href="{{ route('userHome') }}" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('user/img/download (4).jpg') }}" alt="Logo" class="rounded"
                        style="widows: 40px; height:40px; ,margin-right:10px;">
                    <h1 class="text-warning mb-0" style="font-size: 1.8rem;">Pizza Hunter</h1>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-warning"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="{{ route('userHome') }}"
                            class="nav-item nav-link {{ Request::routeIs('userHome') ? 'active text-warning' : 'text-white' }} fw-bold">Home</a>
                        <a href="" class="nav-item nav-link text-white fw-bold">Shop</a>
                        <a href="{{ route('userList#addToCartPage') }}"
                            class="nav-item nav-link text-white fw-bold">Cart</a>
                        <a href="{{ route('userList#contact') }}"
                            class="nav-item nav-link text-white fw-bold">Contact</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-start justify-content-xl-end mt-3 mt-xl-0">
                        <a href="{{ route('userList#addToCartPage') }}" class="text-white me-4">
                            <i class="fa fa-shopping-bag fa-lg"></i>
                        </a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle p-0 d-flex align-items-center text-white"
                                data-bs-toggle="dropdown">
                                <img src="{{ Auth::user()->profile && str_contains(Auth::user()->profile, 'http') ? Auth::user()->profile : asset('admin/img/undraw_profile.svg') }}"
                                    style="width: 35px; height: 35px; object-fit: cover;" class="rounded-circle me-2"
                                    alt="User">
                                <span class="small">{{ Auth::user()->name ?? Auth::user()->nickname }}</span>
                            </a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="{{ route('user#useraccountProfile') }}" class="dropdown-item my-2">Profile</a>
                                <a href="{{ route('user#editProfile') }}" class="dropdown-item  my-2 ">Edit Profile</a>
                                <a href="{{ route('user#changePasswordPage') }}" class="dropdown-item  my-2">Change
                                    Password</a>
                                <a href="#" class="dropdown-item  my-2 ">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <input type="submit" value="Logout"
                                            class="btn btn-outline-success rounded w-100 ">
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    @yield('content')

    @include('sweetalert::alert')

    <!-- Footer Start -->
    <div class="container-fluid  text-white-50 footer pt-5"
        style="background: rgba(0,0,0,0.6); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1);">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5);">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-3 text-center text-lg-start">
                        <a href="#">
                            <h1 class="text-primary mb-0">Pizza Hunter</h1>
                            <p class="text-secondary mb-0">Best Your Choice</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="email"
                                placeholder="Your Email">
                            <button type="submit"
                                class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white"
                                style="top: 0; right: 0;">Subscribe</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-center justify-content-lg-end pt-3">
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i
                                    class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">Typesetting, remaining essentially unchanged. It was popularised in the 1960s
                            with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read
                            More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link text-white-50" href="">About Us</a>
                        <a class="btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn-link text-white-50" href="">Terms & Condition</a>
                        <a class="btn-link text-white-50" href="">Return Policy</a>
                        <a class="btn-link text-white-50" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link text-white-50" href="">My Account</a>
                        <a class="btn-link text-white-50" href="">Shop details</a>
                        <a class="btn-link text-white-50" href="">Shopping Cart</a>
                        <a class="btn-link text-white-50" href="">Wishlist</a>
                        <a class="btn-link text-white-50" href="">Order History</a>
                        <a class="btn-link text-white-50" href="">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="Payment Methods">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light">
                        <a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All
                        rights reserved.
                    </span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    {{-- <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a> --}}

    <!-- JavaScript Libraries -->
    <script src="{{ asset('user/lib/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('user/lib/lightbox/js/lightbox.min.js') }}"></script>

</body>

<script>
    function loadFile(event) {
        var reader = new FileReader();

        reader.onload = function() {
            var output = document.getElementById("output");
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0])
    }
</script>




<script>
    //owl carousel

    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            autoplay: true
        })
    })
</script>


<script>
    // + -
    $(document).ready(function() {
        // --- အပိုင်း (၁) အရေအတွက် (Quantity) တိုးလျော့ခြင်း သီးသန့် ---

        // အပေါင်းခလုတ်အတွက်
        $(document).on('click', '.btn-plus', function() {
            let $input = $(this).closest('.input-group').find('.qty');
            let currentVal = parseInt($input.val()) || 0;
            $input.val(currentVal + 1);


        });

        // အနှုတ်ခလုတ်အတွက်
        $(document).on('click', '.btn-minus', function() {
            let $input = $(this).closest('.input-group').find('.qty');
            let currentVal = parseInt($input.val()) || 1;
            if (currentVal > 1) {
                $input.val(currentVal - 1);


            }
        });

        // အပေါင်းခလုတ်နှိပ်လျှင် စျေးနှုန်းတွက်ချက်မှုကိုပါ ခေါ်ယူရန်
        $(document).on('click', '.btn-plus', function() {
            let $input = $(this).closest('.input-group').find('.qty');
            calculateAndRefresh($input);
        });

        // အနှုတ်ခလုတ်နှိပ်လျှင် စျေးနှုန်းတွက်ချက်မှုကိုပါ ခေါ်ယူရန်
        $(document).on('click', '.btn-minus', function() {
            let $input = $(this).closest('.input-group').find('.qty');
            calculateAndRefresh($input);
        });

        // စျေးနှုန်းတွက်ချက်မှု logic ကို function တစ်ခုအနေနဲ့ သတ်မှတ်ခြင်း
        function calculateAndRefresh($inputEl) {
            let $parentNode = $inputEl.parents("tr");
            let price = parseInt($parentNode.find(".price").text().replace(/[^0-9]/g, '')) || 0;
            let qty = parseInt($inputEl.val()) || 0;
            let totalAmt = price * qty;

            // Row Total ကို update လုပ်သည်
            $parentNode.find(".total").text(totalAmt + " mmk");

            // Grand Total ကို update လုပ်ရန် (မူရင်း code ထဲက function နာမည်ကို ခေါ်ပါ)
            if (typeof finalCalculation === "function") {
                finalCalculation();
            }
        }
    })
</script>







<script>
    $(document).ready(function() {
        //plus btn click
        $('.btn-plus').click(function() {
            $parentNode = $(this).parents("tr");

            $price = $parentNode.find(".price").text().replace("mmk", "")
            $qty = $parentNode.find(".qty").val();
            $totalAmt = $price * $qty;

            $parentNode.find(".total").text($totalAmt + "mmk")
            finalCalculation();
        })

        // minus btn click
        $('.btn-minus').click(function() {
            $parentNode = $(this).parents("tr");

            $price = $parentNode.find(".price").text().replace("mmk", "")
            $qty = $parentNode.find(".qty").val();
            $totalAmt = $price * $qty;

            $parentNode.find(".total").text($totalAmt + "mmk")
            finalCalculation();
        })

        function finalCalculation() {
            $total = 0;

            $('#productTable tbody tr').each(function(index, item) {
                $total += Number($(item).find('.total').text().replace("mmk", ""))
            })

            $('#subTotal').html(`${$total} mmk`)
            $('#finalTotal').html(`${$total + 5000} mmk`)
        }

        // when remove btn click
        $(".btn-remove").click(function() {
            $parentNode = $(this).parents("tr");
            $cartId = $parentNode.find('.cartId').val();

            $data = {
                'cartId': $cartId
            };

            // ajax
            $.ajax({
                type: 'get',
                url: '/user/addToCard/delete',
                data: $data,
                dataType: 'json',
                success: function(response) {
                    response.status == 'success' ? location.reload() : '';
                }
            })
        })


        // click btn check out

        $('#btn-checkout').click(function() {

            // console.log($('#finalTotal').text().replace('mmk', ''));

            $orderList = [];
            $userId = $("#userId").val();
            $orderCode = "CL-POS" + Math.floor(Math.random() * 1000000000);
            $totalAmount = $('#finalTotal').text().replace("mmk", "") * 1;

            $('#productTable tbody tr').each(function(index, row) {
                $productId = $(row).find('.productId').val();
                $qty = $(row).find('.qty').val();


                $orderList.push({
                    'user_id': $userId,
                    'product_id': $productId,
                    'qty': $qty,
                    'order_code': $orderCode,
                    'total_amount': $totalAmount
                })

            })



            // ajax
            $.ajax({
                type: 'get',
                url: '/user/cart/temp',
                data: Object.assign({}, $orderList),
                dataType: 'json',
                success: function(response) {
                    if (response.status == 'success') {
                        location.href = '/user/payment'
                    }
                }


            })

        })

    })
</script>


< /html>
