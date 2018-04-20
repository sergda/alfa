@extends('front.template')

@section('head')

<title>{!! $title !!}</title>
<meta name="description" content="{!! $description !!}">
<meta name="keywords" content="{!! $keywords !!}">

@stop

@section('main')

    <section class="text-center main-prod">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="catalog-lest-h1">{!! $title !!}</h1>
            </div>
        </div>

        <div class="row catalog-list">

            @foreach($items as $item)

                <div class="col-lg-3">
                    <div class="list-image">
                        <a href=" {!! $items->resolveCurrentPath() !!}/{!! $item->slug !!}" title="{!! $item->title !!}">
                            <img src="{!! $item->image_list !!}" alt="{!! $item->title !!}" />
                        </a>
                    </div>
                    <div class="list-text">{!! $item->title !!}</div>
                </div>
            @endforeach
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-12 fedback">
                <div class="span1"><span> Riceve delle notizie su nuove collezioni </span></div>
                <div class="span2">

                    <div class="feedbackForm">
                        <form name="sentMessage" class="form form-register1" id="fedbackForm"  novalidate>
                            {{ csrf_field() }}
                            <div class="modal-body form-group">
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" onblur='if(this.value=="") this.placeholder="Nome"' onfocus='if(this.value=="Nome") this.value=""' placeholder="NOME" id="name" required data-validation-required-message="Please, indicate Your Nome" />
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" onblur='if(this.value=="") this.placeholder="Your e-mail"' onfocus='if(this.value=="Your e-mail") this.value=""' placeholder="E-MAIL" id="email" required data-validation-required-message="Please, indicate Your e-mail" />
                                    </div>
                                    <input type="hidden" name="name" value="">
                                    <input type="hidden" name="catalogueFeedback" value="catalogueFeedback">
                                    <button type="submit" class="btn form-button">
                                        <span>
                                            INVIARE
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div id="success"> </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <div class="row catalog-list-category">

            @if( isset($table) && $table == 'beds'  )
                <div class="col-lg-3">
                    <div class="block-image block-text-mattress block-text-right">
                        <div class="catalog-head">Reticolo</div>
                        <div class="catalog-head1">comodino</div>
                        <div class="catalog-text">
                            @php
                            $mattress_count = DB::table('mattress')->whereActive(true)->count();
                            @endphp
                            @if(isset($mattress_count) && $mattress_count > 0){!! $mattress_count !!}@else 0 @endif collezioni per soddisfare<br />
                            gusti diversi
                        </div>
                        @if(isset($mattress_count) && $mattress_count > 0)
                            <div class="catalog-link">
                                <a href="/mattress" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="block-image block-image-mattress"></div>
                </div>

                <div class="col-lg-3">
                    <div class="block-image block-image-pouffes"></div>
                </div>
                <div class="col-lg-3">
                    <div class="block-image block-text-pouffes block-text-left">
                        <div class="catalog-head">poggiapiedi<br />da comodino</div>
                        <div class="catalog-text">
                            @if(isset($pouffes_count)){!! $pouffes_count !!}@else 0 @endif collezioni per soddisfare<br />
                            gusti diversi
                        </div>
                        @if(isset($pouffes_count)  && $pouffes_count > 0)
                            <div class="catalog-link">
                                <a href="/pouffes" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @elseif(isset($table) && $table == 'mattress')

                <div class="col-lg-3">
                    <div class="block-image block-image-beds"></div>
                </div>
                <div class="col-lg-3">
                    <div class="block-image block-text-beds">
                        <div class="catalog-head">Letto</div>
                        <div class="catalog-text">
                            @php
                            $beds_count = DB::table('beds')->whereActive(true)->count();
                            @endphp
                            @if(isset($beds_count) && $beds_count > 0){!! $beds_count !!}@else 0 @endif collezioni per soddisfare<br />
                            gusti diversi
                        </div>
                        @if(isset($beds_count) && $beds_count > 0)
                            <div class="catalog-link">
                                <a href="/beds" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="block-image block-image-pouffes"></div>
                </div>
                <div class="col-lg-3">
                    <div class="block-image block-text-pouffes block-text-left">
                        <div class="catalog-head">poggiapiedi<br />da comodino</div>
                        <div class="catalog-text">
                            @if(isset($pouffes_count)){!! $pouffes_count !!}@else 0 @endif collezioni per soddisfare<br />
                            gusti diversi
                        </div>
                        @if(isset($pouffes_count)  && $pouffes_count > 0)
                            <div class="catalog-link">
                                <a href="/pouffes" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            @else

                <div class="col-lg-3">
                    <div class="block-image block-image-beds"></div>
                </div>
                <div class="col-lg-3">
                    <div class="block-image block-text-beds">
                        <div class="catalog-head">Letto</div>
                        <div class="catalog-text">
                            @php
                            $beds_count = DB::table('beds')->whereActive(true)->count();
                            @endphp
                            @if(isset($beds_count) && $beds_count > 0){!! $beds_count !!}@else 0 @endif collezioni per soddisfare<br />
                            gusti diversi
                        </div>
                        @if(isset($beds_count) && $beds_count > 0)
                            <div class="catalog-link">
                                <a href="/beds" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="block-image block-text-mattress block-text-right">
                        <div class="catalog-head">Reticolo</div>
                        <div class="catalog-head1">comodino</div>
                        <div class="catalog-text">
                            @php
                            $mattress_count = DB::table('mattress')->whereActive(true)->count();
                            @endphp
                            @if(isset($mattress_count) && $mattress_count > 0){!! $mattress_count !!}@else 0 @endif collezioni per soddisfare<br />
                            gusti diversi
                        </div>
                        @if(isset($mattress_count) && $mattress_count > 0)
                            <div class="catalog-link">
                                <a href="/mattress" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="block-image block-image-mattress"></div>
                </div>

            @endif

        </div>


    </section>

@endsection

