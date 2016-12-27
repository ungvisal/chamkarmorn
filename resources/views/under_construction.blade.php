@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/home')}}"><i class="fa fa-home"></i> Home</a></li> >
                Under Construction
            </ol>
        </section>
        <br>
        <section class="content">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title box_title">Under Construction</h3>
                </div>
                <div class="box-body" style="text-align: center;">
                    <img src="{{asset('plugins/pic/under-construction.png')}}" width="70%">
                </div>
                <div class="box-footer"></div>
            </div>
        </section>
    </div>

@endsection