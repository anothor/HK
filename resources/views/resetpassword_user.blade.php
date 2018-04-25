@extends('templates.admin')
@section('title', 'ระบบจัดการสมาชิก')
@section('keywords', 'Settings')
@section('description', 'ระบบจัดการสมาชิก')

@section('content')
<div class="row">
  <div class="col-lg-6">
      <div class="card card-chart">
          <div class="card-header text-center">
              <h4 class="card-title">รีเซตรหัสผ่าน</h4>
          </div>
          <div class="card-body">
                <h4>Username : {{ $username }}</h4>
            <form action="{{ url('setting/users/resetpassword') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $id }}">  
                <div class="form-group">
                    <label>New Password <span class="text-danger ml-1">*</span></label>
                    <input type="password" class="form-control" name="password" required>
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
