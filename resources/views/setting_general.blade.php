@extends('templates.admin')
@section('title', 'ตั้งค่าทั่วไป')
@section('keywords', 'Settings')
@section('description', 'ตั้งค่าทั่วไป')

@section('content')
<div class="row">
  <div class="col-lg-10">
      <div class="card card-chart">
          <div class="card-header">
              <h4 class="card-title">ตั้งค่าทั่วไป</h4>
          </div>
          <hr>
          <div class="card-body">
          
          <form action="/generalUpdate" method="post">
              {{ csrf_field() }}
              <!-- {{ method_field("put") }} -->
              <input type="hidden" name="app_key" value="1">
              <input type="hidden" name="line_id" value="{{ $line_id }}">
              <input type="hidden" name="phone_1_id" value="{{ $phone_1_id }}">
              <input type="hidden" name="phone_2_id" value="{{ $phone_2_id }}">
              <input type="hidden" name="phone_3_id" value="{{ $phone_3_id }}">
              <input type="hidden" name="bank_1_id" value="{{ $bank_1_id or '' }}">
              <input type="hidden" name="bank_acc_1_id" value="{{ $bank_acc_1_id or '' }}">
              <input type="hidden" name="bank_2_id" value="{{ $bank_2_id or '' }}">
              <input type="hidden" name="bank_acc_2_id" value="{{ $bank_acc_2_id or '' }}">
              <input type="hidden" name="bank_3_id" value="{{ $bank_3_id or '' }}">
              <input type="hidden" name="bank_acc_3_id" value="{{ $bank_acc_3_id or '' }}">
              <input type="hidden" name="bank_4_id" value="{{ $bank_4_id or '' }}">
              <input type="hidden" name="bank_acc_4_id" value="{{ $bank_acc_4_id or '' }}">
              <input type="hidden" name="bank_5_id" value="{{ $bank_5_id or '' }}">
              <input type="hidden" name="bank_acc_5_id" value="{{ $bank_acc_5_id or '' }}">
              <h5>การติดต่อสื่อสาร</h5>
                    <div class="row">
                        <p class="col-md-2 col-form-label">LINE ID</p>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="line" class="form-control" value="{{ $line }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-2 col-form-label">เบอร์โทรศัพท์ 1</p>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="phone_1" class="form-control" placeholder="0XXXXXXXXX" value="{{ $phone_1 or ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-2 col-form-label">เบอร์โทรศัพท์ 2</p>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="phone_2" class="form-control" placeholder="0XXXXXXXXX" value="{{ $phone_2 or ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <p class="col-md-2 col-form-label">เบอร์โทรศัพท์ 3</p>

                        <div class="col-md-5">
                            <div class="form-group">
                                <input type="text" name="phone_3" class="form-control" placeholder="0XXXXXXXXX" value="{{ $phone_3 or ''}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>ข้อมูลธนาคารสำหรับการโอนเงิน</h5>
                    <div class="row">
                        <p class="col-md-2 col-form-label">ธนาคาร 1</p>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_1" class="form-control" placeholder="ชื่อธนาคาร" value="{{ $bank_1 }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_acc_1" class="form-control" placeholder="หมายเลขบัญชี" value="{{ $bank_acc_1 }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-md-2 col-form-label">ธนาคาร 2</p>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_2" class="form-control" placeholder="ชื่อธนาคาร" value="{{ $bank_2 or '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_acc_2" class="form-control" placeholder="หมายเลขบัญชี" value="{{ $bank_acc_2 or '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-md-2 col-form-label">ธนาคาร 3</p>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_3" class="form-control" placeholder="ชื่อธนาคาร" value="{{ $bank_3 or '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_acc_3" class="form-control" placeholder="หมายเลขบัญชี" value="{{ $bank_acc_3 or '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-md-2 col-form-label">ธนาคาร 4</p>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_4" class="form-control" placeholder="ชื่อธนาคาร" value="{{ $bank_4 or '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_acc_4" class="form-control" placeholder="หมายเลขบัญชี" value="{{ $bank_acc_4 or '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="col-md-2 col-form-label">ธนาคาร 5</p>

                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_5" class="form-control" placeholder="ชื่อธนาคาร" value="{{ $bank_5 or '' }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="bank_acc_5" class="form-control" placeholder="หมายเลขบัญชี" value="{{ $bank_acc_5 or '' }}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-left pl-5">
                        <input type="submit" name="submit" class="btn btn-info btn-lg" value="บันทึก" />
                    </div>
              </form>
          </div>
          <div class="card-footer mt-0 text-right">
              
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
