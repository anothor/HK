@extends('templates.admin') 
@section('title', 'ระบบเติมเงิน ถอนเงิน') 
@section('keywords', 'Settings') 
@section('description','ตั้งค่าระบบหวยออนไลน์') 
@section('content')

@section('content')
<div class="row">
  <div class="col">
      <div class="card card-chart">
          <div class="card-header">
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
                            <div class="row">
                                    <h4 class="col-md-6 m-0">ระบบเติมเงิน-ถอนเงิน</h4>
                        <!-- <form action="" method="get">
                                    <strong class="col-md-1 col-form-label text-center">รหัสยืนยัน</strong>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <input type="text" name="code" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="submit" name="submit" class="btn btn-info m-0 px-5" value="ค้นหา" />
                                    </div>

                    </form> -->
                                </div>
          </div>
          <hr>
          <div class="card-body">
            <div class="table-responsive">
                <table id="transferTable" class="display table">
                    <thead class=" text-primary">
                        <tr><th>
                            วันที่
                        </th>
                        <th>
                            รหัสยืนยัน
                        </th>
                        <th>
                            ผู้เล่น
                        </th>
                        <th>
                            จำนวนเงิน
                        </th>
                        <th>
                            ประเภท
                        </th>
                        <th>
                            สถานะ
                        </th>
                    </tr></thead>
                    <tbody>
                        
                        @foreach($transfers as $transfer)
                        <tr>
                            <td>
                            {{ date('Y-m-d H:i',strtotime($transfer->created_at)) }}
                            </td>
                            <td>
                                <a href="{{ url('setting/transfer/'.$transfer->id) }}" class="text-info "><strong>{{ $transfer->code }}</strong></a>
                            </td>
                            <td>
                                {{ getUserById($transfer->user_id) }}
                            </td>
                            <td>
                                {{ number_format($transfer->money) }}
                            </td>
                            <td>
                                @if($transfer->type == "topup")
                                <a href="{{ url('setting/transfer/'.$transfer->id) }}" class="btn btn-info btn-sm">เติมเงิน</a>
                                @else
                                <a href="{{ url('setting/transfer/'.$transfer->id) }}" class="btn btn-warning btn-sm">ถอนเงิน</a>
                                @endif
                            </td>
                            <td>
                               {!! getTransferStatus($transfer->status) !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
      </div>
  </div>
</div>


@endsection
