@extends('templates.main')
@section('title', 'Profile')
@section('keywords', 'ข้อมูลส่วนตัว')
@section('description', 'ข้อมูลส่วนตัว')

@section('header')
    <div class="page-header page-header-mini" filter-color="blue">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg29.jpg') }}');"></div>
        
        <div class="content-center">
                                <div class="row">
                                    <div class="col-md-8 ml-auto mr-auto">
                                        <h1 class="title" data-rellax-speed="-1">{{ Auth::user()->username }}</h1>
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
                    <h4 class="card-title text-center">ข้อมูลส่วนตัว</h4>
                    <ul>
                        <li>ชื่อ : {{ Auth::user()->name }}</li>
                        <li>เบอร์โทรศัพท์ : {{ Auth::user()->phone }}</li>
                        <li>อีเมล : {{ Auth::user()->email }}</li>
                        <li>ธนาคาร : {{ Auth::user()->bank }}</li>
                        <li>หมายเลขบัญชี : {{ Auth::user()->bank_acc }}</li>
                    </ul>
                 </div>
              </div>

                <div class="card card-plain">
                    <div class="card-body px-5">
                        <h4 class="card-title text-center">เมนู</h4>
                        <a href="{{ url('changePassword') }}" class="btn btn-tumblr btn-block">เปลี่ยนรหัสผ่าน</a>
                        <a href="{{ url('topup') }}" class="btn btn-success btn-block">เติมเงิน / ถอนเงิน</a>
                        <a href="{{ url('home') }}" class="btn btn-info btn-block">เข้าเล่นเกม</a>                      
                    </div>
                </div>
            </div>
          </div>
      </div>
@endsection
