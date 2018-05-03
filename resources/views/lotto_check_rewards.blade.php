@extends('templates.lotto')
@section('title', 'หวยออนไลน์ 2 ตัว 3 ตัว')
@section('keywords', 'หวยออนไลน์')
@section('description', 'หวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')

<div class="row">
  <div class="col-md-8">
    <div class="card">
        <div class="card-body text-center pt-5">
        @if(count($reward) > 0)
            @foreach($reward as $no)
              <h3 class="card-title text-success"><i class="now-ui-icons emoticons_satisfied"></i> ยินดีด้วยคุณถูกรางวัลเลข {{ $no->type }} ตัว</h3>
              <p class="h1 text-success mb-2">{{ $no->number }}</p>
              <h5 class="text-success">มูลค่า {{ $price*getPriceNumber($no->type) }} บาท</h5>
              @if(!gotReward($id))
                <a href="{{ url('lotto-get-money/'.$id) }}" class="btn btn-info"><h4 class="m-0">รับรางวัล</h4></a>
              @else
                <button class="btn btn-info btn-simple" type="button">รับรางวัลแล้ว</button>
              @endif
            <a href="{{ url()->previous() }}" class="text-default"><h6 class="m-0"><< ย้อนกลับ</h6></a>              
            @endforeach
        @else
            <h3 class="card-title text-danger">เสียใจด้วยคุณไม่ถูกรางวัล !!</h3>
            <a href="{{ url()->previous() }}" class="btn btn-info"><h4 class="m-0">ย้อนกลับ</h4></a>
        @endif               
        </div>
        <div class="card-footer text-right">
            <div class="stats">
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
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body px-5 text-center">
        <h4 class="card-title">เงินรางวัล</h4>
        <h5>2 ตัว บาทละ {{ getPriceNumber(2) }}</h5>
        <h5>3 ตัว บาทละ {{ getPriceNumber(3) }}</h5>
      </div>
    </div>
  </div>
</div>

@endsection
