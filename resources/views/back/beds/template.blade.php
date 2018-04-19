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

        {{-- <div class="form-group checkbox pull-right" style="margin-right: 60px;">
            <label>
                {!! Form::checkbox('is_menu') !!}
                в меню
            </label>
        </div> --}}

        <div class="form-group checkbox pull-right" style="margin-right: 60px;">
            <label>
                {!! Form::checkbox('is_main') !!}
                на главную
            </label>
        </div>

        <div class="form-group checkbox pull-right" style="margin-right: 60px; font-weight: bold;">
            <label>
                Sort
                <input style="width:70px;" type="number" id="sort" name="sort" value="{{ ( isset($post) && isset($post->sort) ) ? $post->sort  : 500 }}" required/>
            </label>
        </div>

        <div class="clearfix"></div>



        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
            {!! Form::label('slug', trans('back/all.permalink'), ['class' => 'control-label']) !!}
            {!! url('/') . '/beds/' . Form::text('slug', null, ['id' => 'permalink']) !!}
            <small class="text-danger">{!! $errors->first('slug') !!}</small>
        </div>

        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-4">
                {!! Form::controlBootstrap('text', 0, 'title', $errors, trans('back/all.title')) !!}
            </div>
            <div class="col-md-4">
                {!! Form::controlBootstrap('text', 0, 'description', $errors, trans('back/all.description')) !!}
            </div>
            <div class="col-md-4">
                {!! Form::controlBootstrap('text', 0, 'keywords', $errors, trans('back/all.keywords')) !!}
            </div>
        </div>
        <div class="clearfix"></div>


        <div class="row">
            <div class="col-md-4">
                {!! Form::controlBootstrap('textarea', 0, 'preview_text', $errors, trans('back/all.preview_text')) !!}
            </div>
            <div class="col-md-4">
                {!! Form::controlBootstrap('textarea', 0, 'detail_text', $errors, trans('back/all.detail_text')) !!}
            </div>
            <div class="col-md-4">
                {!! Form::controlBootstrap('textarea', 0, 'property', $errors, trans('back/all.property')) !!}
            </div>
        </div>
        <div class="clearfix"></div>




        <div class="row imagePreviewBlock">
            <div class="col-md-12"><h3>Image</h3></div>
            <div class="clearfix"></div>

            <div class="col-md-3 imagePreviewCol">
                <span class="close_img">&times;</span>
                <div>
                    <img class="image_passport" src="{{ ( isset($post) && isset($post->image_passport) && $post->image_passport != '' ) ? $post->image_passport  : '/files/no_photo.png' }}" />
                    <input type="hidden" id="image_passport" name="image_passport" value="{{ ( isset($post) && isset($post->image_passport) ) ? $post->image_passport  : '' }}"/>
                    <a href="" class="popup_selector" data-inputid="image_passport">Select Image Pasport</a>
                </div>
                {!! Form::controlBootstrap('text', 0, 'image_passport_description', $errors, 'Description image pasport') !!}
            </div>

            <div class="col-md-3 imagePreviewCol">
                <span class="close_img">&times;</span>
                <div>
                    <img class="image_list" src="{{ ( isset($post) && isset($post->image_list) && $post->image_list != '' ) ? $post->image_list  : '/files/no_photo.png' }}" />
                    <input type="hidden" id="image_list" name="image_list" value="{{ ( isset($post) && isset($post->image_list) ) ? $post->image_list  : '' }}"/>
                    <a href="" class="popup_selector" data-inputid="image_list">Select Image List</a>
                </div>
                {!! Form::controlBootstrap('text', 0, 'image_list_description', $errors, 'Description image list') !!}
            </div>

            <div class="col-md-3 imagePreviewCol">
                <span class="close_img">&times;</span>
                <div>
                    <img class="image_passport_left" src="{{ ( isset($post) && isset($post->image_passport_left) && $post->image_passport_left != '' ) ? $post->image_passport_left  : '/files/no_photo.png' }}"/>
                    <input type="hidden" id="image_passport_left" name="image_passport_left" value="{{ ( isset($post) && isset($post->image_passport_left) ) ? $post->image_passport_left  : '' }}"/>
                    <a href="" class="popup_selector" data-inputid="image_passport_left">Select Image pasport left</a>
                </div>
                {!! Form::controlBootstrap('text', 0, 'image_passport_left_description', $errors, 'Description image pasport left') !!}
            </div>

            <div class="col-md-3 imagePreviewCol">
                <span class="close_img">&times;</span>
                <div>
                    <img class="image_passport_right" src="{{ ( isset($post) && isset($post->image_passport_right) && $post->image_passport_right != '' ) ? $post->image_passport_right  : '/files/no_photo.png' }}"/>
                    <input type="hidden" id="image_passport_right" name="image_passport_right" value="{{ ( isset($post) && isset($post->image_passport_right) ) ? $post->image_passport_right  : '' }}"/>
                    <a href="" class="popup_selector" data-inputid="image_passport_right">Select Image pasport right</a>
                </div>
                {!! Form::controlBootstrap('text', 0, 'image_passport_right_description', $errors, 'Description image pasport right') !!}
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-12"><h3 style="text-align: center">Gallery</h3></div>
            <div class="col-md-12 sliderBlock">
                <div id="en_slidexBox" class="row en_slidexBox sliderxBox">
                    @if(isset($post) && isset($post->slider_input) && $post->slider_input != '')
                        @foreach(json_decode(urldecode($post->slider_input)) as $slide )
                            <div class="col-md-3 imgBlock">
                                <div class="deleteImageSlider">&times;</div>
                                <div style="text-align: center;">{{ $slide->alt  }}</div>
                                <img src="{{ $slide->src  }}" alt="{{ $slide->alt  }}" style="width: 150px; height: 150px;"/>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div>
                    <label>
                        Description
                        <input type="text" class="descriptionSlide" value="">
                    </label>
                    <a href="" class="popup_selector" data-inputid="en_slidexBox">Add Image</a>
                    <input type="hidden" class="slide_input" name="slider_input" value="{{ ( isset($post) && isset($post->slide_input) ) ? $post->slide_input  : '' }}"/>
                </div>
            </div>

        </div>
        <div class="clearfix"></div>

        {!! Form::submitBootstrap(trans('front/form.send')) !!}

    {!! Form::close() !!}

@endsection

@section('scripts')

{!! HTML::script('ckeditor/ckeditor.js') !!}


<script>

    $(document).ready(function(){

        $(".sliderxBox").sortable({
            revert:false,
            stop: function() {
                reinitSlider(this,true);
            }
        });
        //$(".imgBlock").draggable({ containment:"#en_slidexBox", scroll:false });
        // отменим возможность выделять текст внутри элементов
        $( "ul, li, img" ).disableSelection();

        $('.deleteImageSlider').on('click', function(){
            reinitSlider(this,false);
        });

    });

    function reinitSlider(el, drag ){
        if(drag){
            var slideField = $(el).parent('.sliderBlock');
        }else {
            var slideField = $(el).parents('.sliderBlock');
            $(el).parent('div.imgBlock').remove();
        }
        var images = $(slideField).find('img');
        var jsonInput = [];
        images.each(function(){
            var ob = {src:$(this).attr('src'),alt:$(this).attr('alt')};
            jsonInput.push(ob);
        });
        $(slideField).find('.slide_input').val(encodeURIComponent(JSON.stringify(jsonInput)));
    }

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
        ],
    };

    config['height'] = 100;

    CKEDITOR.replace('preview_text', config);
    CKEDITOR.replace('detail_text', config);
    CKEDITOR.replace('property', config);

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