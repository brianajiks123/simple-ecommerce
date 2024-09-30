<!DOCTYPE html>
<html>

<head>
    @include('admin.head')
</head>

<body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
        @include('admin.sidebar_navigation')

        <div class="page-content">
            @include('admin.show_product_content')

            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <p class="no-margin-bottom">&copy; {{ date('Y') }} Brian Aji Pamungkas</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admin/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admin/js/front.js') }}"></script>

    {{-- Sweet Alert v2.1.2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Custom Script --}}
    <script type="text/javascript">
        function confirmation(event)
        {
            event.preventDefault();

            var urlToRedirect = event.currentTarget.getAttribute('href');

            swal({
                title: "Delete Confirmation",
                text: "Are you sure to delete this?",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then((canceled) => {
                if (canceled) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>
</body>

</html>
