@extends('templates.lotto')
@section('title', 'ซื้อหวยออนไลน์ 2 ตัว 3 ตัว')
@section('keywords', 'ซื้อหวยออนไลน์')
@section('description', 'ซื้อหวยออนไลน์ 2 ตัว 3 ตัว')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <div> <h3 class="card-title">ซื้อหวย</h3></div>
                                    <div class="ml-auto"><p class="mt-4">{{ now()->format('d/m/Y H:i') }}</p></div>
                                </div>
                                <!-- <div class="text-right">
                                    <button type="button" name="add" id="add" class="btn btn-success h6 m-0"><i class="now-ui-icons ui-1_simple-add"></i> เพิ่ม</button>
                                </div> -->
                            </div>
                            <div class="card-body">
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
                                <div class="form-group">
                                <form class="form-horizontal" action="{{ $url }}" method="POST"> 
                                    {{ csrf_field() }}
                                    {{ method_field($method) }}
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class=" text-primary">
                                                    <tr>
                                                        <th>เลข</th>
                                                        <th>ราคา(฿)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><input type="text" name="number" placeholder="XX, XXX" class="form-control" maxlength="3" required></td>
                                                        <td><input type="number" name="price" placeholder="0" class="form-control" required></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" name="submit" class="btn btn-info btn-lg" value="ซื้อหวย" /> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                
                            </div>
                        </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-header text-center">
          <h4 class="card-title">เงินรางวัล</h4>
      </div>
      <div class="card-body">
        <h5>2 ตัว บาทละ 90</h5>
        <h5>3 ตัว บาทละ 800</h5>
      </div>
        <hr>
      <div class="card-header text-center">
          <h4 class="card-title">เลขที่ออกล่าสุด</h4>
      </div>
      <div class="card-body">
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
      </div>
    </div>
  </div>
</div>
@endsection
