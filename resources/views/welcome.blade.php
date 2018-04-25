@extends('templates.landing')
@section('title', 'HEREKAI')
@section('keywords', 'หวยออนไลน์')
@section('description', 'หวยออนไลน์ รูปแบบใหม')
@section('robots', 'index,follow')

@section('header')
    <div class="page-header">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg1.jpg') }}');">
        </div>
        <div class="content-center">
            <div class="container">
                <div class="row">
                  <div class="col-md-10 offset-md-1 text-left">
                    <img src="{{ asset('img/herekai-v2.png') }}" alt="" class="img-rounded center-block mascot-header">
                        <h1 class="h2 title">หวยออนไลน์ รูปแบบใหม่</h1>
                        <h2 class="description">พร้อมเปิดให้บริการเร็วๆนี้ รองรับการใช้งานทุกอุปกรณ์ สะดวก สามารถเล่นได้ทุกที่ทุกเวลา การเงิน ปลอดภัย รวดเร็ว โปร่งใส จ่ายหนัก จ่ายจริง แล้วมาสนุกด้วยกันที่นี่</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
