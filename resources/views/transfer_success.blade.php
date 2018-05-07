@extends('templates.lotto')
@section('title', 'ระบบการเงิน')
@section('keywords', 'หวยออนไลน์')
@section('description', 'ระบบการเงิน หวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col">
      <div class="card card-chart">
        <div class="card-body text-center">
            @if($type=="withdraw")
                <h3 class="text-success mb-0">การแจ้งถอนเงินของคุณสำเร็จแล้ว</h3>
                <button class="btn btn-success btn-lg h4" type="button">{{ $code }}</button>
                <h5>นำรหัสยืนยันนี้ส่งไปยัง LINE หรือ โทรแจ้งไปยังเจ้าหน้าที่ของเราอีกครั้ง เพื่อยืนยันการถอนเงิน เจ้าหน้าที่จะทำการโอนเงินให้คุณโดยเร็วที่สุด</h5>
                <a href="{{ url('transfer') }}" class="btn btn-info">ตกลง</a>
            @elseif($type=="topup")
                <h3 class="text-success mb-0">การแจ้งเติมเงินของคุณสำเร็จแล้ว</h3>
                <button class="btn btn-success btn-lg h4" type="button">{{ $code }}</button>
                <h5>นำรหัสยืนยันนี้ส่งไปยัง LINE หรือ โทรแจ้งไปยังเจ้าหน้าที่ของเราอีกครั้ง เพื่อยืนยันการถอนเงิน เจ้าหน้าที่จะทำการโอนเงินให้คุณโดยเร็วที่สุด</h5>
                <a href="{{ url('transfer') }}" class="btn btn-info">ตกลง</a>
            @endif
        </div>
      </div>
  </div>
</div>
@endsection
