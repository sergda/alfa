@extends('back.template')

@section('head')

    {!! HTML::style('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') !!}

@endsection

@section('main')

    @yield('entete')

    <div class="col-sm-12">
        @yield('form')

            <div class="form-group checkbox pull-right">
                <label>
                    {!! Form::checkbox('active') !!}
                    {{ trans('back/all.published') }}
                </label>
            </div>

        <div class="form-group checkbox pull-right" style="margin-right: 60px;">
            <label>
                {!! Form::checkbox('is_menu') !!}
                в меню
            </label>
        </div>

        <div class="form-group checkbox pull-right" style="margin-right: 60px; font-weight: bold;">
            <label>
                Sort
                <input style="width:70px;" type="number" id="sort" name="sort" value="{{ ( isset($post) && isset($post->sort) ) ? $post->sort  : '500' }}" required/>
            </label>
        </div>

        <div class="clearfix"></div>

        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
            {!! Form::label('slug', trans('back/all.permalink'), ['class' => 'control-label']) !!}
            {!! url('/') . '/design/' . Form::text('slug', null, ['id' => 'permalink']) !!}
            <small class="text-danger">{!! $errors->first('slug') !!}</small>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::controlBootstrap('text', 0, 'title', $errors, trans('back/all.title')) !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::controlBootstrap('text', 0, 'description', $errors, trans('back/all.description')) !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::controlBootstrap('text', 0, 'keywords', $errors, trans('back/all.keywords')) !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::controlBootstrap('text', 0, 'name', $errors, 'Имя') !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                {!! Form::controlBootstrap('text', 0, 'slogan', $errors, 'Слоган') !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row imagePreviewBlock">
            <div class="col-md-12"><h3>Image</h3></div>
            <div class="clearfix"></div>
            <div class="col-md-6 imagePreviewCol">
                <span class="close_img">&times;</span>
                <div>
                    <img class="preview_picture" src="{{ ( isset($post) && isset($post->preview_picture) && $post->preview_picture != '' ) ? $post->preview_picture  : '/files/no_photo.png' }}" />
                    <input type="hidden" id="preview_picture" name="preview_picture" value="{{ ( isset($post) && isset($post->preview_picture) ) ? $post->preview_picture  : '' }}"/>
                    <a href="" class="popup_selector" data-inputid="preview_picture">Select Preview Image</a>
                </div>
                {!! Form::controlBootstrap('text', 0, 'preview_picture_description', $errors, 'Description image') !!}
            </div>
            <div class="col-md-6 imagePreviewCol">
                <span class="close_img">&times;</span>
                <div>
                    <img class="detail_picture" src="{{ ( isset($post) && isset($post->detail_picture) && $post->detail_picture != '' ) ? $post->detail_picture  : '/files/no_photo.png' }}" />
                    <input type="hidden" id="detail_picture" name="detail_picture" value="{{ ( isset($post) && isset($post->detail_picture) ) ? $post->detail_picture  : '' }}"/>
                    <a href="" class="popup_selector" data-inputid="detail_picture">Select Detail Image</a>
                </div>
                {!! Form::controlBootstrap('text', 0, 'detail_picture_description', $errors, 'Description image') !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row" style="margin-bottom: 20px;">




        </div>
        <div class="clearfix"></div>


        {!! Form::submitBootstrap(trans('front/form.send')) !!}

    {!! Form::close() !!}

@if( isset($post) )

@endif

@endsection

@section('scripts')

{!! HTML::script('ckeditor/ckeditor.js') !!}


<script>

    $(document).ready(function(){

        $(".close_img").on("click",function(){
            var boxImg = $(this).parent("div.col-md-4");
            //$(this).hide();
            $(boxImg).find("img").attr("src","/files/no_photo.png");
            $(boxImg).find("input").val("");
        });
    });

    var config = {
        codeSnippet_theme: 'Monokai',
        language: '{{ config('app.locale') }}',
        height: 100,
        allowedContent: true,
        filebrowserBrowseUrl: '/elfinder/ckeditor',
        toolbarGroups: [
            {name: 'clipboard', groups: ['clipboard', 'undo']},
            {name: 'editing', groups: ['find', 'selection', 'spellchecker']},
            {name: 'links'},
            {name: 'insert'},
            {name: 'forms'},
            {name: 'tools'},
            {name: 'document', groups: ['mode', 'document', 'doctools']},
            {name: 'others'},
            //'/',
            {name: 'basicstyles', groups: ['basicstyles', 'cleanup']},
            {name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi']},
            {name: 'styles'},
            {name: 'colors'}
        ]
    };

    //CKEDITOR.replace('en_summary', config);
    //CKEDITOR.replace('fr_summary', config);

    config['height'] = 100;

   // CKEDITOR.replace('en_content', config);
  //  CKEDITOR.replace('en_content_bottom', config);
  //  CKEDITOR.replace('fr_content', config);
  //  CKEDITOR.replace('fr_content_bottom', config);
  //  CKEDITOR.replace('de_content', config);
  //  CKEDITOR.replace('de_content_bottom', config);

    function removeAccents(str) {
        var accent = [
            /[\300-\306]/g, /[\340-\346]/g, // A, a
            /[\310-\313]/g, /[\350-\353]/g, // E, e
            /[\314-\317]/g, /[\354-\357]/g, // I, i
            /[\322-\330]/g, /[\362-\370]/g, // O, o
            /[\331-\334]/g, /[\371-\374]/g, // U, u
            /[\321]/g, /[\361]/g, // N, n
            /[\307]/g, /[\347]/g // C, c
        ];
        var noaccent = ['A', 'a', 'E', 'e', 'I', 'i', 'O', 'o', 'U', 'u', 'N', 'n', 'C', 'c'];
        for (var i = 0; i < accent.length; ++i) {
            str = str.replace(accent[i], noaccent[i]);
        }
        return str;
    }

    $("#title").keyup(function () {
        var str = removeAccents($(this).val())
            .replace(/[^a-zA-Z0-9\s]/g, "")
            .toLowerCase()
            .replace(/\s/g, '-');
        $("#permalink").val(str);
    });

</script>

@endsection