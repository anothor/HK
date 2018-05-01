@extends('templates.admin')
@section('title', 'ผลการออกรางวัล')
@section('keywords', 'Settings')
@section('description', 'ผลการออกรางวัล')

@section('content')
<div class="row">
  <div class="col-lg-10">
  <div class="card">
      <div class="card-header">
          <h4 class="card-title">รายการผู้ถูกรางวัลเลข {{ $number }} รอบเวลา {{ dateFormat($round) }} </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <tr>
                        <th>
                            เวลา
                        </th>
                        <th>
                            Username
                        </th>
                        <th>
                            ราคาซื้อ
                        </th>
                        <th>
                            รางวัล
                        </th>
                        <th>
                            สถานะ
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($winners as $winner)
                    <tr>
                        <td>
                            {{ dateFormat($winner->created_at) }}
                        </td>
                        <td>
                            {{ getUserById($winner->user_id) }}
                        </td>
                        <td>
                            {{ $winner->price }}
                        </td>
                        <td>
                            {{ $winner->type == "2" ? $winner->price*getPriceNumber(2) : $winner->price*getPriceNumber(3) }}
                        </td>
                        <td>
                            @if($winner->get_reward == 0)
                                <span class="badge badge-default">unpaid</span>
                            @else
                                <span class="badge badge-success">paid</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
      </div>
      <div class="card-footer text-right">
      </div>
    </div>
  </div>
</div>

@endsection
