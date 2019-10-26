@include('partials.header')
@include('partials.topbar')
<div class="clearfix"></div>
<div class="page-container">

    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-md-12">

                    @yield('content')

                </div>
            </div>

        </div>
    </div>
</div>

<div class="scroll-to-top"
     style="display: none;">
    <i class="fa fa-arrow-up"></i>
</div>
@include('partials.javascripts')

@yield('javascript')
@include('partials.footer')


