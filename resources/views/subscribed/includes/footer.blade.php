<footer class="footer-area section-padding-100-0" style="background-color: #e6e6e6">
    <div class="container-fluid">
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-xl-2">
                <div class="footer-widget-area mb-100">
                    <div class="widget-title">
                        <h4>Links</h4>
                    </div>
                    <nav>
                        <ul class="footer-nav">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">The team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-xl-2">
                <div class="footer-widget-area mb-100">
                    <div class="widget-title">
                        <h4>Social</h4>
                    </div>
                    <nav>
                        <ul class="footer-nav">
                            @foreach ($data_medsos as $item)
                            <li><a href="{{ $item->url_medsos }}{{ $item->username_medsos }}">{{ $item->name_medsos }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Footer Widget Area -->
        </div>
        <div class="row">
            <!-- Footer Widget Area -->
            <div class="col-12 col-md-12 col-xl-3">
                <div class="footer-widget-area mb-100">
                    <a href="/"><h3 >Lomba</h3></a>
                    <p class="copywrite-text"><a href="#">
                        @foreach ($data_footer as $item)
                            {{ $item->name_copyright }}
                        @endforeach
                    </p>
                </div>
            </div>

            <!-- Footer Widget Area -->
        </div>
    </div>
</footer>