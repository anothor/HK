@extends('templates.lotto')
@section('title', 'หวยออนไลน์ 2 ตัว 3 ตัว')
@section('keywords', 'หวยออนไลน์')
@section('description', 'หวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col-lg-8">
      <div class="card card-chart">
          <div class="card-header">
              <h4 class="card-title">รายการเลขที่คุณซื้อ</h4>
          </div>
          <hr>
          <div class="card-body">
          <form action="{{ url('lotto-check-number') }}" method="get">
            <div class="row">
                        <p class="col-md-2 col-form-label">เลือกวันที่</p>

                        <div class="col-md-5">
                            <div class="form-group">
                            <input id="datepicker" name="datepicked" required>
                            </div>
                        </div>
                        <div class="col-md-3 text-left pl-5">
                            <input type="submit" name="submit" class="btn btn-info m-0 px-5" value="ตกลง">
                        </div>
                    </div>
                    <hr>
          </form>
          </div>
      </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body px-5 text-center">
        <h4 class="card-title">เงินรางวัล</h4>
        <h5>2 ตัว บาทละ {{ getPriceNumber(2) }}</h5>
        <h5>3 ตัว บาทละ {{ getPriceNumber(3) }}</h5>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
@if(!empty($obj))
    <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <tr>
                                                <th>
                                                    วันที่/เวลา
                                                </th>
                                                <th>
                                                    เลข
                                                </th>
                                                <th class="text-right">
                                                    จำนวน
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($obj as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->created_at->format('Y-m-d H:i') }}
                                                </td>
                                                <td>
                                                    {{ $item->number }}
                                                </td>
                                                <!-- <td>
                                                    {{ $item->created_at->format('H:i') }}
                                                </td> -->
                                                <td class="text-right">
                                                    ฿{{ $item->price }}
                                                </td>
                                                <td class="text-right">
                                                <a href="{{ url('lotto-check-reward/'.$item->id) }}" class="btn btn-info btn-sm">ตรวจหวย</a>
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
@endif
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header text-center">
          <h4 class="card-title">เลขที่ออกล่าสุด</h4>
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
    </div>
  </div>
</div>

@endsection
