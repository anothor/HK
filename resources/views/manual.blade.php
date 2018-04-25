@extends('templates.main')
@section('title', 'คู่มือการเล่น')
@section('keywords', 'คู่มือการเล่น')
@section('description', 'คู่มือการเล่น')

@section('header')
    <div class="page-header page-header-mini" filter-color="blue">
        <div class="page-header-image" data-parallax="true" style="background-image: url('{{ asset('img/bg29.jpg') }}');"></div>
        
        <div class="content-center">
                                <div class="row">
                                    <div class="col-md-8 ml-auto mr-auto">
                                        <h1 class="title" data-rellax-speed="-1">คู่มือการเล่น</h1>
                                    </div>
                                </div>
                            </div>
    </div>
@endsection

@section('content')
<div class="section py-5">
          <div class="container">
            <div class="card">
                 <div class="card-body">
                    <h4 class="card-title text-center">กรุณาติดต่อเจ้าหน้าที่ผ่านทาง Line หรือ เบอร์โทรศัพท์</h4>
                 </div>
              </div>
          </div>
      </div>
@endsection
