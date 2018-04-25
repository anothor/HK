@extends('templates.main')
@section('title', 'การเงิน')
@section('keywords', 'เติมเงิน')
@section('description', 'เติมเงิน ถอนเงิน')

@section('header')
    <div class="page-header page-header-mini" filter-color="blue">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg29.jpg') }}');"></div>
        
        <div class="content-center">
                                <div class="row">
                                    <div class="col-md-8 ml-auto mr-auto">
                                        <h1 class="title" data-rellax-speed="-1">การเงิน</h1>
                                    </div>
                                </div>
                            </div>
    </div>
@endsection

@section('content')
<div class="section py-5">
          <div class="container">
            <div class="card-deck mb-4">
              <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-center">กรุณาติดต่อเจ้าหน้าที่ผ่านทาง Line หรือ เบอร์โทรศัพท์</h4>
                    <a class="btn btn-success btn-block" href="http://line.me/ti/p/~0614569978" target="_blank"><h3 class="my-2">Line ID: 0614569978</h3></a>
                    <a class="btn btn-tumblr btn-block" href="tel:0614569978"><h3 class="my-2">โทรศัพท์ : 0614569978</h3></a>
                 </div>
              </div>

                <div class="card card-plain">
                    <div class="card-body">
                        <h4 class="card-title text-center">เมนู</h4>
                        <!-- <a href="{{ url('topup') }}" class="btn btn-success btn-block">เติมเงิน / ถอนเงิน</a> -->
                        <a href="{{ url('home') }}" class="btn btn-info btn-block btn-lg"><h3 class="m-0">เข้าเล่นเกม</h3></a>                      
                    </div>
                </div>
            </div>
          </div>
      </div>
@endsection
