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
            <h4 class="card-title">ระบบถอนเงิน <span class="float-right">ยอดเงินของคุณ {{ number_format(Auth::user()->money) }} บาท</span></h4>   
          </div>
          <hr>
          <div class="card-body">

                                <form class="form-horizontal" action="{{ url('transfer') }}" method="post"> 
                                    {{ csrf_field() }}
                                    <!-- <input type="hidden" name="user" value="{{ Auth::user()->id }}"> -->
                                    <input type="hidden" name="type" value="withdraw">
                                    <input type="hidden" name="bank" value="{{ Auth::user()->bank.' : '.Auth::user()->bank_acc }}">                                    
                                        <div class="text-center">
                                            <h5>จำนวนเงิน</h5>
                                            <input type="number" name="money" placeholder="0" class="form-control text-center h4" autofocus required>
                                            <input type="submit" name="submit" class="btn btn-info btn-lg" value="ตกลง" /> 
                                        </div>
                                    </form>
          </div>
      </div>
  </div>
  <div class="col-lg-6">
      <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">ขั้นตอนการถอนเงิน</h4>  
          </div>
          <hr>
          <div class="card-body">
              <ul>
                <li>คุณสามารถถอนเงินได้ไม่เกินยอดเงินคงเหลือ ระหว่างทำรายการถอนเงินจากระบบ กรุณารักษายอดเงินของคุณให้คงเหลือมากว่ายอดที่ทำการแจ้งถอนเงินล่าสุด</li>
                <li>หากยอดเงินของคุณไม่พอสำหรับการถอนเงิน ระบบจะทำการยกเลิกรายการถอนเงินของคุณ และต้องทำการแจ้งถอนเงินใหม่อีกครั้ง</li>
                <li>คุณจะได้รับรหัสยืนยันการเติมเงินหลักจากทำรายการแจ้งเติมเงินสำเร็จ นำรหัสยืนยันนี้ส่งไปยัง LINE หรือ โทรแจ้งไปยังเจ้าหน้าที่ของเราอีกครั้ง</li>
                  <li>
                      เจ้าหน้าที่จะใช้รหัสยืนยันนี้ไปตรวจสอบข้อมูลของคุณก่อนทำการโอนเงินไปยังบัญชีธนาคารของคุณที่ลงทะเบียนไว้ ถ้าขอมูลถูกต้องจะทำการโอนเงินให้คุณโดยเร็วที่สุด
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
