<!DOCTYPE html>
<html>

<head>
    @include('home.head')
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <!-- end hero area -->

    <!-- contact us section -->
    <section class="contact_section layout_padding">
        <div class="container px-0">
            <div class="heading_container ">
                <h2 class="text-center">Contact Us</h2>
            </div>
        </div>
        <div class="container container-bg">
            <div class="row">
                <div class="col-lg-7 col-md-6 px-0">
                    <div class="map_container">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1102111923933!2d110.39542507570674!3d-6.996299993004851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b46faaaaaab%3A0xef7fe551fe13bd76!2sSAM%20POO%20KONG!5e0!3m2!1sid!2sid!4v1727695228760!5m2!1sid!2sid"
                                width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <form action="{{ route('userSendMsg') }}" method="get">
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control fs-6" placeholder="Name" />
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control fs-6" placeholder="Email" />
                        </div>
                        <div class="mb-3">
                            <input type="number" name="phone" class="form-control fs-6" placeholder="Phone (81390xxx)" />
                        </div>
                        <div class="mb-3">
                            <textarea name="msg" id="msg" class="form-control fs-6" cols="30" rows="10" placeholder="Message"></textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit">SEND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us section -->

    <!-- footer section -->
    @include('home.footer')
    <!-- end footer section -->

    <script src="{{ asset('ecommerce/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('ecommerce/js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('ecommerce/js/custom.js') }}"></script>
</body>

</html>
