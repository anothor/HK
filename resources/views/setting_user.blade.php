@extends('templates.admin')
@section('title', 'ระบบจัดการสมาชิก')
@section('keywords', 'Settings')
@section('description', 'ระบบจัดการสมาชิก')

@section('content')
<div class="row">
  <div class="col">
      <div class="card card-chart">
          <div class="card-header text-center">
          <div class="row">
                <div class="col-md-10">
                <h4 class="card-title">ระบบจัดการสมาชิก</h4>
                </div>
                <div class="col-md-2">
                    <a href="{{ url('setting/users/create') }}" class="btn btn-primary btn-sm">+ เพิ่มสมาชิกใหม่</a>
                </div>
            </div>
          </div>
          <div class="card-body">
          <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th class="text-left">
                                                #
                                            </th>
                                            <th>
                                                Username
                                            </th>
                                            <th>
                                                ชื่อ
                                            </th>
                                            <th>
                                                เบอร์โทรศัพท์
                                            </th>
                                            <th>
                                                ธนาคาร
                                            </th>
                                            <th>
                                                หมายเลขบัญชี
                                            </th>
                                            <th class="text-right">
                                                ยอดเงิน
                                            </th>
                                            <th class="text-right">
                                                
                                            </th>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="text-left">
                                                    {{ $no+=1 }}
                                                </td>
                                                <td>
                                                    {{ $user->username }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $user->phone }}
                                                </td>
                                                <td>
                                                    {{ $user->bank }}
                                                </td>
                                                <td>
                                                    {{ $user->bank_acc }}
                                                </td>
                                                <td class="text-right">
                                                    ฿{{ $user->money }}
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{ url('setting/users/'.$user->id) }}" method="post" onsubmit="return(confirm('ยืนยันคำสั่ง คุณต้องการลบข้อมูลรายการนี้ใช่หรือไม่'))">
                                                    <a href="{{ url('setting/users/resetpassword/'.$user->id.'/'.$user->username) }}" class="btn btn-info btn-sm"><i class="now-ui-icons objects_key-25"></i> เปลี่ยนรหัสผ่าน</a>
                                                    <a href="{{ url('setting/users/'.$user->id.'/edit') }}" class="btn btn-success btn-sm"><i class="now-ui-icons ui-1_settings-gear-63"></i> แก้ไข</a>
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="now-ui-icons ui-1_simple-remove"></i> ลบ</button>                                                        
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
