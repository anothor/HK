@extends('templates.lotto')
@section('title', 'หวยออนไลน์ 2 ตัว 3 ตัว')
@section('keywords', 'หวยออนไลน์')
@section('description', 'หวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col-md-5">
    <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div><h4 class="card-title">รายการซื้อหวย</h4></div>
                                    <div class="ml-auto">
                                        <!-- <div class="dropdown">
                                            <button class="btn btn-info btn-round dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ซื้อหวย
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(1px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ url('/lottoBuy/2') }}">2 ตัว</a>
                                                <a class="dropdown-item" href="{{ url('/lottoBuy/3') }}">3 ตัว</a>
                                            </div>
                                        </div> -->
                                        <a href="{{ url('lotto/create') }}" class="btn btn-info h6 m-0">ซื้อหวย</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr><th>
                                                เลข
                                            </th>
                                            <th>
                                                วันที่/เวลา
                                            </th>
                                            <!-- <th>
                                                รอบ
                                            </th> -->
                                            <th class="text-right">
                                                จำนวน
                                            </th>
                                        </tr></thead>
                                        <tbody>
                                            @foreach($obj as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->number }}
                                                </td>
                                                <td>
                                                    {{ $item->created_at->format('Y-m-d H:i') }}
                                                </td>
                                                <!-- <td>
                                                    {{ $item->created_at->format('H:i') }}
                                                </td> -->
                                                <td class="text-right">
                                                    ฿{{ $item->price }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div class="stats">
                                {{ $obj->links() }}
                                </div>
                            </div>
                        </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">ผลรางวัลประจำวัน</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr><th>
                        เวลา
                    </th>
                    <th>
                        ประเภท
                    </th>
                    <th>
                        เลข
                    </th>
                </tr></thead>
                <tbody>
                    
                    @foreach(getRecentReward(10) as $number)
                    <tr>
                        <td>
                        {{ date('Y-m-d H:i',strtotime($number->created_at)) }}
                        </td>
                        <td>
                            {{ $number->type }}
                        </td>
                        <td>
                            {{ $number->number }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
      <div class="card-footer text-right">
          <div class="stats">
              รายการอื่นๆ <i class="now-ui-icons arrows-1_minimal-right"></i>
          </div>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card text-center">
    <div class="card-header">
          <h4 class="card-title">เงินรางวัล</h4>
      </div>
      <div class="card-body">
        <h5>2 ตัว บาทละ {{ getPriceNumber(2) }}</h5>
        <h5>3 ตัว บาทละ {{ getPriceNumber(3) }}</h5>
      </div>
    </div>
  </div>
</div>
@endsection
