<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        @yield('head')
        {!! HTML::style('css/lightbox.css') !!}
        {!! HTML::style('css/front.css') !!}
    </head>

  <body>

    <header>

        <nav class="navbar navbar-default">
            <div class="container">

                <div class="row text-center">
                    <div class="col-lg-4">

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="dropdown" {!! classActivePath('collezione') !!}>
                                    {!! link_to('/collezione', 'COLLEZIONE', "title='collezione'" ) !!}
                                    <ul class="dropdown-menu">
                                            <li>
                                                {!! link_to('/link1', 'link1', "title='link1'" ) !!}
                                            </li>
                                            <li>
                                                {!! link_to('/link2', 'link2', "title='link2'" ) !!}
                                            </li>
                                    </ul>
                                </li>

                                <li {!! classActivePath('storia') !!}>
                                    {!! link_to('/storia', 'STORIA', "title='storia'" ) !!}
                                </li>


                            </ul>
                        </div>




                    </div>

                    <div class="col-lg-4" style="padding-top: 23px;">

                        <a href="/" title="main"><img src="/img/logo.jpg" alt="logo"></a>

                    </div>

                    <div class="col-lg-4">

                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li {!! classActivePath('contatto') !!}>
                                    {!! link_to('/contatto', 'CONTATTO', "title='contatto'" ) !!}
                                </li>

                                <li {!! classActivePath('societa') !!}>
                                    <a onclick="javascript:void(0)" href="#" title="SOSIETA"> SOSIETA </a>
                                    {{-- !! link_to('/societa', 'SOSIETA', "title='societa'" ) !! --}}
                                </li>


                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </nav>

        @yield('main_slider')

    </header>
    @yield('body')
    <main class="container">
        @yield('main')
    </main>




    <footer class="text-muted">
        <div class="row">

            <div class="col-lg-6 footer-logo-block">
                <img src="/img/logo.jpg" alt="logo">
            </div>
            <div class="col-lg-6">
                <div class="footer-right-copy">
                    <span class="coppy">&copy; Produciamo mobili dal 1990</span>
                    <span class="flag"><img src="/img/flag.jpg" alt="" /></span>
                </div>
            </div>

        </div>


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">To Subcribe</h4>
                    </div>
                    <form name="sentMessage" class="form form-register1" id="fedbackForm"  novalidate>
                        {{ csrf_field() }}
                        <div class="modal-body form-group">


                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" name="name" class="form-control" onblur='if(this.value=="") this.placeholder="Your Name"' onfocus='if(this.value=="Your Name") this.value=""' placeholder="Your Name" id="name" required data-validation-required-message="Please, indicate Your Name" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" onblur='if(this.value=="") this.placeholder="Your e-mail"' onfocus='if(this.value=="Your e-mail") this.value=""' placeholder="Your e-mail" id="email" required data-validation-required-message="Please, indicate Your e-mail" />
                                </div>
                            </div>
                            <!-- div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control" onblur='if(this.value=="") this.placeholder="Телефон"' onfocus='if(this.value=="Телефон") this.value=""' placeholder="Телефон" id="phone" required data-validation-required-message="Пожалуйста, укажите номер телефона" />
                                </div>
                            </div -->



                            <div id="success"> </div>
                        </div>
                        <div class="modal-footer">
                            <!-- button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button -->
                            <input type="submit" class="btn btn-secondary form-button" value="Send">
                        </div>
                        <div id="success"> </div>
                    </form>
                </div>
            </div>
        </div>

    </footer>

    {!! HTML::script('js/jquery-3.0.0.js') !!}
    {!! HTML::script('js/jquery-migrate-3.0.1.min.js') !!}
    {!! HTML::script('js/tether.min.js') !!}
    {!! HTML::script('js/bootstrap3.3.7.min.js') !!}
    {!! HTML::script('js/jqBootstrapValidation.js') !!}
    {!! HTML::script('js/jquery.form.min.js') !!}
    {!! HTML::script('js/jquery.colorbox-min.js') !!}
    {!! HTML::script('/packages/barryvdh/elfinder/js/standalonepopup.js') !!}
    {!! HTML::script('js/lightbox.js') !!}
    {!! HTML::script('js/query_lazyload/jquery.lazyload.min.js') !!}
    {!! HTML::script('js/script.js') !!}


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(function() {
            $('#logout').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit();
            })
        });
    </script>

    @yield('scripts')

  </body>
</html>