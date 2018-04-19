@extends('back.curbstones.template')

@section('entete')
    @include('back.partials.entete', ['title' => trans('back/all.dashboard'), 'icon' => 'pencil', 'fil' => link_to('adm_curbstones', trans('back/all.table')) . ' / ' . trans('back/all.creation')])
@endsection

@section('form')
    {!! Form::open(['url' => 'adm_curbstones', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}
@endsection
