@extends('templates.admin')
@section('title', 'ผลการออกรางวัล')
@section('keywords', 'Settings')
@section('description', 'ผลการออกรางวัล')

@section('content')
<div class="row">
  <div class="col-lg-10">
      <div class="card card-chart">
          <div class="card-header">
              <h4 class="card-title">ผลการออกรางวัล</h4>
          </div>
          <hr>
          <div class="card-body">
          <form action="{{ url('setting/rewards/get') }}" method="get">
            <div class="row">
                        <p class="col-md-1 col-form-label">เลือกวันที่</p>

                        <div class="col-md-4">
                            <div class="form-group">
                            <input id="datepicker" name="datepicked" >
                            </div>
                        </div>
                        <div class="col-md-3 text-left pl-5">
                            <input type="submit" name="submit" class="btn btn-info m-0 px-5" value="ตกลง" />
                        </div>
                    </div>
                    <hr>
          </form>
          </div>
      </div>
  </div>
</div>
@if(!empty($rewards))

<div class="row">
  <div class="col-lg-10">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">ผลรางวัลประจำวันที่ {{ $date }}</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table id="rewardTable" class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            เวลา
                        </th>
                        <th>
                            ประเภท
                        </th>
                        <th>
                            เลข
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($rewards as $reward)
                    <tr>
                        <td>
                        {{ dateFormat($reward->created_at) }}
                        </td>
                        <td>
                        {{ $reward->type.' ตัว' }}
                        </td>
                        <td>
                        {{ $reward->number }}
                        <a class="float-right" href="{{ url('setting/rewards/winner/'.$reward->id) }}">ตรวจสอบ</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
      <div class="card-footer text-center">
      </div>
    </div>
  </div>
</div>
@endif

@endsection
