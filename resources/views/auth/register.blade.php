@extends('layouts.app_register')

@section('content')
<div class="signup-page">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
          <div class="header header-primary text-center mb-4">
              <div class="logo-container">
                <a href="{{ url('/') }}">
                  <img src="{{ asset('img/herekai-v2.png') }}" alt="HereKai" class="img-rounded">
                </a>
              </div>
          </div>
          
          <div class="card card-signup">
              <div class="card-body">
                  <h4 class="card-title text-center">{{ __('สมัครสมาชิก') }}</h4>
                  <form method="POST" action="{{ route('register') }}">
                      {{ csrf_field() }}
                      <div class="row">
                        <div class="col-md-6">
                            <p class="text-black">ข้อมูลสมาชิก</p>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons users_circle-08"></i>
                              </span>
                              <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required><span class="text-danger ml-1">*</span>

                              @if ($errors->has('username'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('username') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons objects_key-25"></i>
                              </span>
                              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required><span class="text-danger ml-1">*</span>

                              @if ($errors->has('password'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons objects_key-25"></i>
                              </span>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required><span class="text-danger ml-1">*</span>
                          </div>
                          <div class="reg-info">
                            <p class="text-danger">เพื่อความปลอดภัยในการเงินของสมาชิก กรุณาใส่ข้อมูลจริง ชื่อ - นามสกุล ต้องตรงกับชื่อบัญชีธนาคารของคุณที่ใช้แจ้งถอนเงินเท่านั้น เบอร์โทรศัพท์ต้องเป็นเบอร์ที่ติดต่อได้จริง</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <p class="text-black">ข้อมูลส่วนตัว</p>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons users_single-02"></i>
                              </span>
                              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="ชื่อจริง -  นามสกุล" required><span class="text-danger ml-1">*</span>

                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons tech_mobile"></i>
                              </span>
                              <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="เบอร์โทรศัพท์" required><span class="text-danger ml-1">*</span>

                              @if ($errors->has('phone'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons ui-1_email-85"></i>
                              </span>
                              <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="อีเมล (ถ้ามี)"><span class="text-white ml-1">*</span>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                          <div class="input-group">
                                <select name="bank" class="selectpicker form-control px-0" data-size="7" data-style="btn btn-lg btn-primary" required>
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
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <i class="now-ui-icons education_agenda-bookmark"></i>
                              </span>
                              <input id="bank-acc" type="text" class="form-control{{ $errors->has('bank_acc') ? ' is-invalid' : '' }}" name="bank_acc" value="{{ old('bank_acc') }}" placeholder="หมายเลขบัญชีธนาคาร" required><span class="text-danger ml-1">*</span>

                              @if ($errors->has('bank_acc'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('bank_acc') }}</strong>
                                  </span>
                              @endif
                          </div>
                        </div>
                      </div>

                      <!-- If you want to add a checkbox to this form, uncomment this code -->
                      <div class="checkbox">
                          <input id="checkbox1" type="checkbox" required>
                          <label for="checkbox1">
                              ยอมรับเงื่อนไขและ
                              <a href="#something">ข้อตกลงในการใช้งานเว็บไซต์</a>.
                          </label>
                      </div>
                      <div class="card-footer text-center">
                          <button type="submit" class="btn btn-info btn-lg">
                              {{ __('สมัครสมาชิก') }}
                          </button>
                      </div>
                  </form>
              </div>
          </div>



        </div>
    </div>
  </div>
</div>
@endsection
