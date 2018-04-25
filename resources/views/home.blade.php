@extends('templates.home')
@section('title', 'Dashboard')
@section('keywords', 'keyword')
@section('description', 'Description')
@section('robots', 'noindex')

@section('content')
<div class="row">
  <div class="col-md-3">
      <div class="card">
        <a href="{{ url('/lotto') }}">
            <img class="card-img-top" src="{{ asset('img/23.png') }}" alt="หวยออนไลน์">
        </a>
          <div class="card-body text-center">
            <a href="{{ url('/lotto') }}">
                <h5 class="title">หวยออนไลน์</h5>
            </a>
              <p class="description">
                  หวยออนไลน์ 2 ตัว, 3 ตัว
              </p>
          </div>
      </div>
      <!-- <div class="card">
          <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
          </div>
      </div> -->
  </div>
</div>
@endsection

