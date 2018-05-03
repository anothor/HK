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
        <div class="card-footer text-center">
            <a href="{{ url('lotto-check') }}" class="btn btn-info"><h4 class="m-0">ตรวจหวยอื่นๆ</h4></a>
        </div>
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
