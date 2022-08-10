
<div class="row clearfix mt-4">
    <div class="col-md-12 col-lg-12">
        <div class="card active-bg2">
            <div class="body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <div class="widgets_container widget_app pt-70 text-white text-center text-md-left">

                            <a href="">
                               <span class="text-warning" style="font-size: 40px;">MR.Wickramaarachchi</span><small class="text-white"> Videography</small>
                            </a>
                            {{-- <div class="footer_logo text-center">
                                <h6 class="text-left mt-4 text-white footer-meaning">
                                    <strong class="font-weight-500">Creativity</strong> .
                                    <strong class="font-weight-500">Arrangement</strong> .
                                    <strong class="font-weight-500">Colorful</strong> .
                                    <strong class="font-weight-500">Amazing</strong></h6>
                            </div> --}}
                            <div class="single-footer-widget text-left">
                                <p class="text-white footer-gifter-text">
                                   The best Videography service in SRI-LANKA
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu pt-80">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-footer-widget">
                                        <ul class="import-link">
                                            <li>
                                                <a class="footer-link" href="{{ route('home') }}">Home</a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="{{ route('portfolio') }}">Portfolio</a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="{{ route('pricing') }}">Pricing</a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="{{ route('contact') }}">Contact
                                                    Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-12 col-lg-12">
        <div class="card active-bg1">
            <div class="body">
                <div class="row">

                    <div class="col-lg-4 copyright_area text-center text-lg-left od-2 od-sm-2 od-2 od-md-2 od-lg-1 od-xl-1">
                        <p class="copyright_text">Copyright &copy; {{ Date('Y') }} MR. Wickramaarachchi Videography. All Rights Reserved.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@push("css")

@endpush
