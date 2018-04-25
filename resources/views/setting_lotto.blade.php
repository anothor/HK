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
                    <input type="hidden" name="id_start" value="{{ $id_start }}">                    
                    <input type="hidden" name="id_end" value="{{ $id_end }}">                                                           
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
                        <div class="row ml-5">
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">เริ่ม</label>
                                    <select name="reward_start" class="form-control" id="exampleFormControlSelect1">
                                    <option value="1" {{ $start=='1' ? 'selected' : '' }} >01:00</option>
                                    <option value="2" {{ $start=='2' ? 'selected' : '' }} >02:00</option>
                                    <option value="3" {{ $start=='3' ? 'selected' : '' }} >03:00</option>
                                    <option value="4" {{ $start=='4' ? 'selected' : '' }} >04:00</option>
                                    <option value="5" {{ $start=='5' ? 'selected' : '' }} >05:00</option>
                                    <option value="6" {{ $start=='6' ? 'selected' : '' }} >06:00</option>
                                    <option value="7" {{ $start=='7' ? 'selected' : '' }} >07:00</option>
                                    <option value="8" {{ $start=='8' ? 'selected' : '' }} >08:00</option>
                                    <option value="9" {{ $start=='9' ? 'selected' : '' }} >09:00</option>
                                    <option value="10" {{ $start=='10' ? 'selected' : '' }} >10:00</option>
                                    <option value="11" {{ $start=='11' ? 'selected' : '' }} >11:00</option>
                                    <option value="12" {{ $start=='12' ? 'selected' : '' }} >12:00</option>
                                    <option value="13" {{ $start=='13' ? 'selected' : '' }} >13:00</option>
                                    <option value="14" {{ $start=='14' ? 'selected' : '' }} >14:00</option>
                                    <option value="15" {{ $start=='15' ? 'selected' : '' }} >15:00</option>
                                    <option value="16" {{ $start=='16' ? 'selected' : '' }} >16:00</option>
                                    <option value="17" {{ $start=='17' ? 'selected' : '' }} >17:00</option>
                                    <option value="18" {{ $start=='18' ? 'selected' : '' }} >18:00</option>
                                    <option value="19" {{ $start=='19' ? 'selected' : '' }} >19:00</option>
                                    <option value="20" {{ $start=='20' ? 'selected' : '' }} >20:00</option>
                                    <option value="21" {{ $start=='21' ? 'selected' : '' }} >21:00</option>
                                    <option value="22" {{ $start=='22' ? 'selected' : '' }} >22:00</option>
                                    <option value="23" {{ $start=='23' ? 'selected' : '' }} >23:00</option>
                                    <option value="24" {{ $start=='24' ? 'selected' : '' }} >00:00</option>                                    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                            <div class="form-group">
                                    <label for="exampleFormControlSelect2">ถึง</label>
                                    <select name="reward_end" class="form-control" id="exampleFormControlSelect2">
                                    <option value="1" {{ $end=='1' ? 'selected' : '' }} >01:00</option>
                                    <option value="2" {{ $end=='2' ? 'selected' : '' }} >02:00</option>
                                    <option value="3" {{ $end=='3' ? 'selected' : '' }} >03:00</option>
                                    <option value="4" {{ $end=='4' ? 'selected' : '' }} >04:00</option>
                                    <option value="5" {{ $end=='5' ? 'selected' : '' }} >05:00</option>
                                    <option value="6" {{ $end=='6' ? 'selected' : '' }} >06:00</option>
                                    <option value="7" {{ $end=='7' ? 'selected' : '' }} >07:00</option>
                                    <option value="8" {{ $end=='8' ? 'selected' : '' }} >08:00</option>
                                    <option value="9" {{ $end=='9' ? 'selected' : '' }} >09:00</option>
                                    <option value="10" {{ $end=='10' ? 'selected' : '' }} >10:00</option>
                                    <option value="11" {{ $end=='11' ? 'selected' : '' }} >11:00</option>
                                    <option value="12" {{ $end=='12' ? 'selected' : '' }} >12:00</option>
                                    <option value="13" {{ $end=='13' ? 'selected' : '' }} >13:00</option>
                                    <option value="14" {{ $end=='14' ? 'selected' : '' }} >14:00</option>
                                    <option value="15" {{ $end=='15' ? 'selected' : '' }} >15:00</option>
                                    <option value="16" {{ $end=='16' ? 'selected' : '' }} >16:00</option>
                                    <option value="17" {{ $end=='17' ? 'selected' : '' }} >17:00</option>
                                    <option value="18" {{ $end=='18' ? 'selected' : '' }} >18:00</option>
                                    <option value="19" {{ $end=='19' ? 'selected' : '' }} >19:00</option>
                                    <option value="20" {{ $end=='20' ? 'selected' : '' }} >20:00</option>
                                    <option value="21" {{ $end=='21' ? 'selected' : '' }} >21:00</option>
                                    <option value="22" {{ $end=='22' ? 'selected' : '' }} >22:00</option>
                                    <option value="23" {{ $end=='23' ? 'selected' : '' }} >23:00</option>
                                    <option value="24" {{ $end=='24' ? 'selected' : '' }} >00:00</option>                                      
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h5 class="ml-5">ทุกๆ</h5>
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
</div>
@endsection