@extends('templates.admin')
@section('title', 'ระบบจัดการสมาชิก')
@section('keywords', 'Settings')
@section('description', 'ระบบจัดการสมาชิก')

@section('content')
<div class="row">
  <div class="col-lg-6">
      <div class="card card-chart">
          <div class="card-header text-center">
              <h4 class="card-title">ระบบจัดการสมาชิก</h4>
          </div>
          <div class="card-body">
            <form action="{{ $url }}" method="post">
            {{ method_field($method) }}
            {{ csrf_field() }}
            
                <div class="form-group">
                    <label>Username <span class="text-danger ml-1">*</span></label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username or '' }}" {{ $method=='put' ? 'disabled' : '' }}>
                </div>
                @if($method=='post')
                <div class="form-group">
                    <label>Password <span class="text-danger ml-1">*</span></label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                @endif
                <hr>
                <div class="form-group">
                    <label>ชื่อ - นามสุก <span class="text-danger ml-1">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name or '' }}" required>
                </div>
                <div class="form-group">
                    <label>เบอร์โทรศัพท์ <span class="text-danger ml-1">*</span></label>
                    <input type="text" class="form-control" name="phone" value="{{ $user->phone or '' }}" required>
                </div>
                <div class="form-group">
                    <label>อีเมล</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email or '' }}">
                </div>
                @if($method=='post')
                <div class="form-group">
                    <label>ธนาคาร <span class="text-danger ml-1">*</span></label>
                    <select name="bank" class="form-control" required>
                                            <option disabled selected value="none"><i class="now-ui-icons text_bold"></i> กรุณาเลือกธนาคารของคุณ *</option>
                                            <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                                            <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                                            <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                                            <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
                                            <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                                            <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
                                            <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
                                            <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
                                            <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
                                            <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
                                            <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                    </select>
                </div>
                @else
                <div class="form-group">
                    <label>ธนาคาร <span class="text-danger ml-1">*</span></label>
                    <select name="bank" class="form-control" required>
                                            <option disabled selected value="none"><i class="now-ui-icons text_bold"></i> กรุณาเลือกธนาคารของคุณ *</option>
                                            <option value="ธนาคารกรุงเทพ" {{ $user->bank=='ธนาคารกรุงเทพ' ? 'selected' : '' }} >ธนาคารกรุงเทพ</option>
                                            <option value="ธนาคารกสิกรไทย" {{ $user->bank=='ธนาคารกสิกรไทย' ? 'selected' : '' }} >ธนาคารกสิกรไทย</option>
                                            <option value="ธนาคารไทยพาณิชย์" {{ $user->bank=='ธนาคารไทยพาณิชย์' ? 'selected' : '' }} >ธนาคารไทยพาณิชย์</option>
                                            <option value="ธนาคารกรุงศรีอยุธยา" {{ $user->bank=='ธนาคารกรุงศรีอยุธยา' ? 'selected' : '' }} >ธนาคารกรุงศรีอยุธยา</option>
                                            <option value="ธนาคารกรุงไทย" {{ $user->bank=='ธนาคารกรุงไทย' ? 'selected' : '' }} >ธนาคารกรุงไทย</option>
                                            <option value="ธนาคารทหารไทย" {{ $user->bank=='ธนาคารทหารไทย' ? 'selected' : '' }} >ธนาคารทหารไทย</option>
                                            <option value="ธนาคารเกียรตินาคิน" {{ $user->bank=='ธนาคารเกียรตินาคิน' ? 'selected' : '' }} >ธนาคารเกียรตินาคิน</option>
                                            <option value="ธนาคารทิสโก้" {{ $user->bank=='ธนาคารทิสโก้' ? 'selected' : '' }} >ธนาคารทิสโก้</option>
                                            <option value="ธนาคารธนชาต" {{ $user->bank=='ธนาคารธนชาต' ? 'selected' : '' }} >ธนาคารธนชาต</option>
                                            <option value="ธนาคารยูโอบี" {{ $user->bank=='ธนาคารยูโอบี' ? 'selected' : '' }} >ธนาคารยูโอบี</option>
                                            <option value="ธนาคารออมสิน" {{ $user->bank=='ธนาคารออมสิน' ? 'selected' : '' }} >ธนาคารออมสิน</option>
                    </select>
                </div>
                @endif
                <div class="form-group">
                    <label>เลขบัญชีธนาคาร <span class="text-danger ml-1">*</span></label>
                    <input type="text" class="form-control" name="bank_acc" value="{{ $user->bank_acc or '' }}" required>
                </div>
                <div class="form-group text-center">
                    <input type="submit" name="submit" class="btn btn-info btn-lg" value="ตกลง" />
                    <a class="btn btn-default btn-lg ml-3" href="{{ url('setting/users') }}">ยกเลิก</a>
                </div>
            </form>
          </div>
          <div class="card-footer mt-0 text-right">
              
            <div class="notify">
                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="now-ui-icons ui-1_simple-remove"></i>
                    </button>
                    <span class="h5 mb-0">{{ session('error') }}</span>
                </div>
                @endif @if (session('success'))
                <div class="alert alert-success" role="alert">
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
          </div>
      </div>
  </div>
</div>
@endsection
