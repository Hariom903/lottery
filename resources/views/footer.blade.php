<!-- filepath: resources/views/footer.blade.php -->
<footer id="footer" class="bg-primary text-white pt-5 pb-3 mt-5 shadow-sm overflow-hidden">
    <div class="container">
        <div class="row footer-top-area pb-4">
            <div class="col-lg-3 col-sm-6 mb-4">
                <h5 class="widget-title pb-2 text-uppercase fw-bold">Quick Links</h5>
                <ul class="menu-list list-unstyled text-uppercase">
                    <li class="menu-item pb-2">
                        <a href="/" class="text-white text-decoration-none">Home</a>
                    </li>
                    <li class="menu-item pb-2">
                        <a href="#" class="text-white text-decoration-none">About</a>
                    </li>
                    <li class="menu-item pb-2">
                        <a href="{{ url('mytickets') }}" class="text-white text-decoration-none">My Tickets</a>
                    </li>
                    <li class="menu-item pb-2">
                        <a href="{{ url("/#contact-us") }}" class="text-white text-decoration-none">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <h5 class="widget-title pb-2 text-uppercase fw-bold">Policies</h5>
                <ul class="menu-list list-unstyled text-uppercase">
                    <li class="menu-item pb-2">
                        <a href="{{ route('terms.of.use') }}" class="text-white text-decoration-none">Terms of Use</a>
                    </li>
                    <li class="menu-item pb-2">
                        <a href="{{ route('cookie.policy') }}" class="text-white text-decoration-none">Cookie Policy</a>
                    </li>
                    <li class="menu-item pb-2">
                        <a href="{{ route('privacy.notice') }}" class="text-white text-decoration-none">Privacy Notice</a>
                    </li>
                    <li class="menu-item pb-2">
                        <a href="#" class="text-white text-decoration-none">Responsible Gaming</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <h5 class="widget-title text-uppercase pb-2 fw-bold">Contact Us</h5>
                <p class="mb-2">Have queries or suggestions? <br>
                    <a href="mailto:info@ignisitsolutions.com" class="text-white text-decoration-underline">info@ignisitsolutions.com</a>
                </p>
                <p class="mb-0">Need support? Call us: <br>
                    <a href="tel:+4733378901" class="text-white text-decoration-underline">+91 XX XXXX XXXX</a>
                </p>
            </div>
            <div class="col-lg-2 col-sm-12 mb-4 d-flex align-items-center justify-content-lg-end justify-content-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 110px; background: #fff; border-radius: 12px; padding: 8px;">
            </div>
        </div>
        <hr class="border-light opacity-50">
        <div class="row">
            <div class="col-md-8 text-center text-md-start mb-2 mb-md-0">
                <p class="m-0 small">Gradient Able &#9829; crafted by Team
                    <a href="http://hariom.ct.ws" target="_blank" class="text-white text-decoration-underline">Hariom Dangi</a>
                </p>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <span class="small">&copy; {{ date('Y') }} Lottery App. All rights reserved.</span>
            </div>
        </div>
    </div>
</footer>
