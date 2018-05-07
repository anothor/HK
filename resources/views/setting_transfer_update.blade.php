@extends('templates.admin') 
@section('title', 'ระบบเติมเงิน ถอนเงิน') 
@section('keywords', 'Settings') 
@section('description','ตั้งค่าระบบหวยออนไลน์') 
@section('content')

@section('content')
<div class="row">
  <div class="col-md-5">
      <div class="card card-chart">
          <div class="card-header text-center">
          @if($status == "pending")
              <h4>รายละเอียดการ{{ $type == "topup" ? "เติมเงิน" : "ถอนเงิน" }}</h4>
            @elseif($status == "completed")
                <h4 class="text-success">รายการนี้สำเร็จแล้ว</h4>
            @else
                <h4 class="text-danger">รายการนี้ถูกยกเลิก</h4>
            @endif
          </div>
          <div class="card-body">
            <p>ชื่อผู้เล่น : {{ $user }}</p>
            <p>ยอดเงินคงเหลือ : {{ number_format($balance) }} บาท</p>
            <p><u>ข้อมูลการโอนเงิน</u></p>
            @if($type == "topup")
                <p>โอนเงินไปยังบัญชีเจ้าหน้าที่ธนาคาร : {{ $bank }}</p>
                <p>วันที่ทำรายการ : {{ $created_at }}</p>
            @else
                <p>โอนเงินไปยังบัญชีผู้เล่นธนาคาร : {{ $bank_user }}</p>
                <p>วันที่ทำรายการ : {{ $created_at }}</p>
            @endif
              <div class="text-center">
            @if($status == "pending")
                    <a href="{{ url('setting/transfer-update/'.$id) }}" class="btn btn-success btn-block h5">{{ $type == "topup" ? "เติมเงิน" : "ถอนเงิน" }} {{ number_format($money) }} บาท</a>   
                    <a href="{{ url('setting/transfer-cancel/'.$id) }}" class="btn btn-danger btn-sm">X ยกเลิกรายการ</a>
            @else
                <a href="{{ url()->previous() }}" class="btn btn-default">ย้อนกลับ</a>
            @endif      
              </div>
            
          </div>
      </div>
  </div>
  @if($type == "topup")
  <div class="col-md-5">
      <div class="card card-chart">
          <div class="card-body">
                <img src="{{ asset('storage/'.$slip) }}" alt="slip" class="mb-4">
          </div>
      </div>
  </div>
@endif
</div>


@endsection
