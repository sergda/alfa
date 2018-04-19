@extends('back.beds.template')

@section('entete')
    @include('back.partials.entete', ['title' => trans('back/all.dashboard'), 'icon' => 'pencil', 'fil' => link_to('adm_beds', trans('back/all.table')) . ' / ' . trans('back/all.edition')])
@endsection

@section('form')
    {!! Form::model($post, ['route' => ['adm_beds.update', $post->id], 'method' => 'put', 'enctype'=>'multipart/form-data', 'class' => 'form-horizontal panel']) !!}
@endsection
