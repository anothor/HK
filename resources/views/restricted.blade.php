@extends('templates.landing')
@section('title', 'Restricted Area !!')
@section('keywords', 'หวยออนไลน์')
@section('description', 'หวยออนไลน์ รูปแบบใหม')
@section('robots', 'index,follow') <!-- noindex -->

@section('fb_og')
<meta property="og:url"                content="http://herekai.com" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="HEREKAI หวยออนไลน์" />
<meta property="og:description"        content="หวยออนไลน์ รูปแบบใหม" />
<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
@endsection

@section('header')
    <!-- <div class="page-header-image" data-parallax="true" style="background-image: url('https://static.pexels.com/photos/189349/pexels-photo-189349.jpeg');"> -->
    <div class="page-header">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg1.jpg') }}');">
        </div>
        <div class="content-center">
            <div class="container">
                <div class="row">
                  <div class="col-md-10 offset-md-1 text-center">
                    <img src="{{ asset('img/herekai-v2.png') }}" alt="" class="img-rounded center-block mb-5">
                        <h1 class="title">พื้นที่สำหรับผู้ดูแลระบบเท่านั้น</h1>
                        <a href="{{ url('/') }}" class="btn btn-danger"><h3 class="m-0">กลับหน้าแรก</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
