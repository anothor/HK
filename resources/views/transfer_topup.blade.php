@extends('templates.lotto')
@section('title', 'ระบบการเงิน')
@section('keywords', 'หวยออนไลน์')
@section('description', 'ระบบการเงิน หวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col-lg-6">
      <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">ระบบเติมเงิน <span class="float-right">ยอดเงินของคุณ {{ number_format(Auth::user()->money) }} บาท</span></h4>   
          </div>
          <hr>
          <div class="card-body">

                                <form class="form-horizontal" action="{{ url('transfer') }}" method="post" enctype="multipart/form-data"> 
                                    {{ csrf_field() }}
                                    <!-- <input type="hidden" name="user" value="{{ Auth::user()->id }}"> -->
                                    <input type="hidden" name="type" value="topup">
                                    <div class="row">
                                        <p class="col-md-3 col-form-label">โอนเงินไปยังธนาคาร</p>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <select name="bank" class="form-control" required>
                                                    <option value="-">----</option>
                                                    @foreach($banks as $bank)
                                                        @if($bank)
                                                            <option value="{{ $bank }}">{{ $bank }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="col-md-3 col-form-label">จำนวนเงิน</p>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="number" name="money" placeholder="0" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="col-md-3 col-form-label">หลักฐานการโอนเงิน</p>
                                        <div class="col-md-8">
                                            <input type="file" name="slip" class="form-control" required>
                                        </div>
                                    </div>                                 
                                        <div class="text-center">
                                            <input type="submit" name="submit" class="btn btn-info btn-lg" value="ตกลง" /> 
                                        </div>
                                    </form>
          </div>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">ขั้นตอนการเติมเงิน</h4>  
          </div>
          <hr>
          <div class="card-body">
          <ul>
                  <li>
                      <strong class="text-danger">กรุณาโอนเงินไปยังบัญชีของเราและเตรียมหลังฐานการโอนเงินให้พร้อมก่อนแจ้งเติมเงิน</strong>
                  </li>
                  <li>
                      แจ้งเติมเงินผ่านระบบเติมเงินโดยกรอกรายละเอียดและแนบหลักฐานการโอนเงินตามขั้นตอนให้ถูกต้อง
                  </li>
                  <li>
                      คุณจะได้รับรหัสยืนยันการเติมเงินหลักจากทำรายการแจ้งเติมเงินสำเร็จ นำรหัสยืนยันนี้ส่งไปยัง LINE หรือ โทรแจ้งไปยังเจ้าหน้าที่ของเราอีกครั้ง
                  </li>
                  <li>
                      เจ้าหน้าที่จะใช้รหัสยืนยันนี้ไปตรวจสอบข้อมูลของคุณก่อนทำการเติมเงิน ถ้าขอมูลถูกต้องจะทำการเติมเงินเข้าสู่ระบบให้คุณโดยเร็วที่สุด
                  </li>
              </ul>
          </div>
      </div>
  </div>
</div>

    <div class="notification">
    @if (session('error'))
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                    <span class="h5 mb-0">{{ session('error') }}</span>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="now-ui-icons ui-1_simple-remove"></i>
                                    </button>
                                    <span class="h5 mb-0">{{ session('success') }}</span>
                                </div>
                            @endif
    </div>

@endsection
