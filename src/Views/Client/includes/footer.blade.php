<!-- resources/views/includes/footer.blade.php -->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 text-center text-md-left mb-4">
                <ul class="list-inline footer-list mb-0">
                    <li class="list-inline-item"><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="{{ url('terms-conditions') }}">Terms Conditions</a></li>
                </ul>
            </div>

            <div class="col-md-5 text-md-right text-center mb-4">
                <ul class="list-inline footer-list mb-0">
                    <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</footer>
<!-- JS Plugins -->
<script src="{{ asset('assets/clientplugins/jQuery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/clientplugins/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/clientplugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/clientplugins/instafeed/instafeed.min.js') }}"></script>
<!-- Main Script -->
<script src="{{ asset('assets/clientjs/script.js') }}"></script>
</body>
</html>
