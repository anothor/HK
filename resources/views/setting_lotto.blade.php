@extends('templates.admin') 
@section('title', 'ตั้งค่าระบบหวยออนไลน์') 
@section('keywords', 'Settings') 
@section('description','ตั้งค่าระบบหวยออนไลน์') 
@section('content')

<div class="row">
    <div class="col">
        <div class="card card-chart">
            <div class="card-body">
                <form id="setting-lotto-price" action="/settingUpdate" class="form-horizontal" method="POST">
                    {{ csrf_field() }}
                    <!-- {{ method_field($method) }} -->
                    <input type="hidden" name="app_key" value="1">
                    <input type="hidden" name="id_price_2" value="{{ $id_price_2 }}">
                    <input type="hidden" name="id_price_3" value="{{ $id_price_3 }}">
                    <input type="hidden" name="id_runtime" value="{{ $id_runtime }}">
                    <input type="hidden" name="id_enable" value="{{ $id_enable }}">
                    <h5 class="ml-5">ราคารางวัลสำหรับหวยแต่ละประเภท</h5>
                    <div class="row">
                        <p class="col-md-1 col-form-label">2 ตัว</p>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="price_2" class="form-control" placeholder="0" value="{{ $price_2 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-1 col-form-label">3 ตัว</p>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="price_3" class="form-control" placeholder="0" value="{{ $price_3 }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="from-group">
                        <div class="form-check ml-5">
                                            <label class="form-check-label">
                                                <input name="reward_enable" class="form-check-input" type="checkbox" value="1" {{ $enable=='1' ? 'checked' : '' }}>
                                                <span class="form-check-sign"></span>
                                            </label>

                                        <p class="ml-5">เปิดระบบการออกรางวัล</p>
                                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <h5 class="ml-5">ตั้งเวลาออกรางวัล</h5>
                        
                        <div class="form-check form-check-radio ml-5">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reward_time" value="1" {{ $runtime=='1' ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                1 นาที
                            </label>
                        </div>
                        <div class="form-check form-check-radio ml-5">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reward_time" value="5" {{ $runtime=='5' ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                5 นาที
                            </label>
                        </div>
                        <div class="form-check form-check-radio ml-5">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reward_time" value="15" {{ $runtime=='15' ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                15 นาที
                            </label>
                        </div>
                        <div class="form-check form-check-radio ml-5">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reward_time" value="30" {{ $runtime=='30' ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                30 นาที
                            </label>
                        </div>
                        <div class="form-check form-check-radio ml-5">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="reward_time" value="60" {{ $runtime=='60' ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                1 ชั่วโมง
                            </label>
                        </div>
                    </div>
                    <hr>
                    <div class="text-left pl-5">
                        <input type="submit" name="submit" class="btn btn-info btn-lg" value="บันทึก" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="notify">
    @if (session('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <span class="h5 mb-0">{{ session('error') }}</span>
    </div>
    @endif @if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <i class="now-ui-icons ui-1_simple-remove"></i>
        </button>
        <span class="h5 mb-0">{{ session('success') }}</span>
    </div>
    @endif

                <script>
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove(); 
                    });
                }, 4000);
                </script>
</div>
@endsection