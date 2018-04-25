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
                                                    {{ $item->created_at->format('d/m/Y H:i') }}
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
        <strong class="mb-0">รอบเวลา 10:30 น.</strong>
        <div class="row text-center">
          <div class="col-6">
            <button class="btn btn-primary btn-block"><h2 class="mb-0">22</h2></button>
            <p class="mb-0">เลข 2 ตัว</p>
          </div>
          <div class="col-6">
            <button class="btn btn-primary btn-block"><h2 class="mb-0">333</h2></button>
            <p class="mb-0">เลข 3 ตัว</p>
          </div>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr><th>
                        เวลา
                    </th>
                    <th>
                        2 ตัว
                    </th>
                    <th>
                        3 ตัว
                    </th>
                </tr></thead>
                <tbody>
                    <tr>
                        <td>
                            10:15
                        </td>
                        <td>
                            12
                        </td>
                        <td>
                            876
                        </td>
                    </tr>
                    <tr>
                        <td>
                            10:00
                        </td>
                        <td>
                            12
                        </td>
                        <td>
                            876
                        </td>
                    </tr>
                    <tr>
                        <td>
                            09:45
                        </td>
                        <td>
                            12
                        </td>
                        <td>
                            876
                        </td>
                    </tr>
                    <tr>
                        <td>
                            09:30
                        </td>
                        <td>
                            12
                        </td>
                        <td>
                            876
                        </td>
                    </tr>
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
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">เงินรางวัล</h4>
      </div>
      <div class="card-body">
        <h5>2 ตัว บาทละ 90</h5>
        <h5>3 ตัว บาทละ 800</h5>
      </div>
    </div>
  </div>
</div>
@endsection
