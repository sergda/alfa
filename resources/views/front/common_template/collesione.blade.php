@extends('front.template')

@section('head')

<title>collesione</title>
<meta name="description" content="collesione">
<meta name="keywords" content="collesione">

@stop

@section('main')

    <section class="text-center main-prod">
        <div class="row">
            <div class="col-lg-3">
                <div class="block-image block-image-beds">11</div>
            </div>
            <div class="col-lg-3">
                <div class="block-image block-text-beds">
                    <div class="catalog-head">Letto</div>
                    <div class="catalog-text">
                        @if(isset($beds_count)){!! $beds_count !!}@else 0 @endif collezioni per soddisfare<br />
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
                        @if(isset($mattress_count)){!! $mattress_count !!}@else 0 @endif collezioni per soddisfare<br />
                        gusti diversi
                    </div>
                    @if(isset($mattress_count)  && $mattress_count > 0)
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
                <div class="block-image block-image-mattress">33</div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-3">
                <div class="block-image block-text-curbstones block-text-right">
                    <div class="catalog-head">Cassetti</div>
                    <div class="catalog-text">
                        @if(isset($curbstones_count)){!! $curbstones_count !!}@else 0 @endif collezioni per soddisfare<br />
                        gusti diversi
                    </div>
                    @if(isset($curbstones_count)  && $curbstones_count > 0)
                        <div class="catalog-link">
                            <a href="/curbstones" class="btn form-button">
                                            <span>
                                                VEDERE TUTTO &rarr;
                                            </span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3">
                <div class="block-image block-image-curbstones">11</div>
            </div>
            <div class="col-lg-3">
                <div class="block-image block-image-pouffes">33</div>
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
        </div>
    </section>

@endsection

