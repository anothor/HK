@extends('templates.default')
@section('title', 'Home')
@section('keywords', 'keyword')
@section('description', 'Description')
@section('robots', 'index,follow') <!-- noindex -->

@section('fb_og')
<meta property="og:url"                content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="Title" />
<meta property="og:description"        content="Description" />
<meta property="og:image"              content="http://static01.nyt.com/images/2015/02/19/arts/international/19iht-btnumbers19A/19iht-btnumbers19A-facebookJumbo-v2.jpg" />
@endsection

@section('header')
    <!-- <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg5.jpg') }}');"> -->
    <div class="page-header header-filter">
        <div class="page-header-image" style="background-image: url('{{ asset('img/bg5.jpg') }}');"></div>
        <div class="content-center">
            <div class="container text-left">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <h1 class="title">หวยออนไลน์ รูปแบบใหม่</h1>
                            <h3 class="description ">รองรับการใช้งานทุกอุปกรณ์ สะดวก สามารถเล่นได้ทุกที่ทุกเวลา การเงิน ปลอดภัย รวดเร็ว โปร่งใส จ่ายหนัก จ่ายจริง แล้วมาสนุกด้วยกันที่นี่</h3>
                            <h3>{{date("d/m/Y H:i:s")}}</h3>
                            <!-- <div class="buttons">
                                            <a href="{{ route('register') }}" class="btn btn-info btn-lg">
                                                <h3 class="m-0"><i class="now-ui-icons gestures_tap-01"></i> สมัครสมาชิก ฟรี!</h3>
                                            </a>
                            </div> -->
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div class="section py-5">
          <div class="container">
            <div class="card-deck">
              <div class="card card-plain p-3" data-background-color="green">
                  <div class="row">
                      <div class="col-md-5">
                          <div class="card-image text-center">
                                <img src="{{ asset('img/Line.png') }}" alt="line official" class="img-rounded">
                          </div>
                      </div>
                      <div class="col-md-7">
                          <div class="card-block text-center">
                              <p class="h2 mb-3">LINE ID</p>
                              <button class="btn btn-primary btn-simple h2 m-0">@herekai</button>
                          </div>
                      </div>
                  </div>
              </div>

                <div class="card card-plain p-3" data-background-color="blue">
                    <div class="card-block text-center">
                          <p class="h2 mb-3">CALL CENTER</p>
                        <a href="tel:0848991898" class="btn btn-primary btn-lg"><p class="h2 m-0">081-2345678</p></a>
                    </div>
                  </div>
            </div>
            <div class="card">
                <div class="card-block">
                    <h4 class="card-title">
                        ประกาศข่าวสาร
                    </h4>
                    <p class="card-description">
                        An immersive production studio focused on virtual reality content, has closed a $10 million Series A round led by Discovery Communications
                    </p>
                </div>
            </div>
          </div>
      </div>
@endsection
