@extends('templates.lotto')
@section('title', 'ระบบการเงิน')
@section('keywords', 'หวยออนไลน์')
@section('description', 'ระบบการเงิน หวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col-lg-7">
      <div class="card card-chart">
          <div class="card-header">
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
              <div class="row">
                  <div class="col-md-6">
                        <h4 class="card-title">ยอดเงินของคุณ {{ number_format(Auth::user()->money) }} บาท</h4>                     
                  </div>
                  <div class="col-md-6 text-center">
                  <a href="{{ url('transfer-form/topup') }}" class="btn btn-info mr-3">เติมเงิน</a> <a href="{{ url('transfer-form/withdraw') }}" class="btn btn-primary">ถอนเงิน</a> 
                  </div>
              </div>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
                <table id="transferTable" class="display table">
                    <thead class=" text-primary">
                        <tr><th>
                            วันที่
                        </th>
                        <th>
                            ประเภท
                        </th>
                        <th>
                            จำนวนเงิน
                        </th>
                        <th>
                            สถานะ
                        </th>
                    </tr></thead>
                    <tbody>
                        
                        @foreach($transfers as $transfer)
                        <tr>
                            <td>
                            {{ date('Y-m-d',strtotime($transfer->created_at)) }}
                            </td>
                            <td>
                                {!! $transfer->type == "topup" ? "<span class='text-info'>เติมเงิน</span>" : "<span class='text-warning'>ถอนเงิน</span>" !!}
                            </td>
                            <td>
                                {{ $transfer->money }}
                            </td>
                            <td>
                               {!! getTransferStatus($transfer->status) !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
      </div>
  </div>
  <div class="col-lg-5">
      <div class="card card-chart">
          <div class="card-header">
            <h4 class="card-title">บัญชีธนาคารสำหรับโอนเงิน</h4>
          </div>
          <hr>
          <div class="card-body">
              <ul>
                @foreach($banks as $bank)
                    <li>{{ $bank }}</li>
                @endforeach
              </ul>
          </div>
      </div>
      <div class="card card-chart">
          <div class="card-header">
            <strong class="card-title">ขั้นตอนการเติมเงิน</strong>  
          </div>
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
      <div class="card card-chart">
          <div class="card-header">
            <strong class="card-title">ขั้นตอนการถอนเงิน</strong>  
          </div>
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


@endsection
