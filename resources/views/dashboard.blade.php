@extends('templates.player')
@section('title', 'Dashboard')
@section('keywords', 'keyword')
@section('description', 'Description')
@section('robots', 'index,follow') <!-- noindex -->

@section('content')
<div class="row">
  <div class="col-md-3">
      <div class="card">
          <img class="card-img-top" src="{{ asset('img/23.png') }}" alt="หวยออนไลน์">
          <div class="card-body text-center">
            <a href="#">
                <h5 class="title">หวยออนไลน์</h5>
            </a>
              <p class="description">
                  หวยออนไลน์ 2 ตัว, 3 ตัว
              </p>
          </div>
      </div>
  </div>
</div>
@endsection
