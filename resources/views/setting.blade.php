@extends('templates.admin')
@section('title', 'Settings')
@section('keywords', 'Settings')
@section('description', 'Settings')

@section('content')
<div class="row">
  <div class="col-lg-4">
      <div class="card card-chart">
          <div class="card-header text-center">
              <h4 class="card-title">สมาชิกทั้งหมด</h4>
          </div>
          <div class="card-body text-center">
              <p class="h1 mb-0">999 <small>คน</small></p>
          </div>
          <div class="card-footer mt-0 text-right">
              <div class="stats">
                  <i class="now-ui-icons loader_gear"></i> ตั้งค่า
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
      <div class="card card-chart">
          <div class="card-header text-center">
              <h4 class="card-title">ยอดรวมการเติมเงิน</h4>
          </div>
          <div class="card-body text-center">
              <p class="h1 mb-0">8,888 <small>บาท</small></p>
          </div>
          <div class="card-footer mt-0 text-right">
              <div class="stats">
                  <i class="now-ui-icons loader_gear"></i> ตั้งค่า
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-4">
      <div class="card card-chart">
          <div class="card-header text-center">
              <h4 class="card-title">เวลาออกรางวัล</h4>
          </div>
          <div class="card-body text-center">
          {{ now() }}
              <p class="h1 mb-0">15 นาที<small>น.</small></p>
          </div>
          <div class="card-footer mt-0 text-right">
              <div class="stats">
                  <i class="now-ui-icons loader_gear"></i> ตั้งค่า
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
