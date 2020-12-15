@extends('ui.layouts.ep')

@section('title')
Disable 2-Step Authentication
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
            <h2>Disable 2-Step Authentication for <span class="text-purple"> {{ Auth::user()->username }} </span></h2>
            <h3>{ This will unlock your account and <a href="#" class="text-danger">disable 2-Step </a>}</h3>
          </div>
          <form role="form" method="POST" action="{{ route('disable2FA') }}">
          	@csrf
            @include('ui.partials.alerts')
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" placeholder="Enter Your 4-digit Support PIN" value="{{ old('support_pin') }}"  name="support_pin" id="support_pin" type="text" required="">
              </div>
            </div>
            <div class="form-group">
              	<label>Question 1 - {{ $questions->question1 }}</label>
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                </div>
                <input class="form-control" placeholder="Type your answer for question #1 (case-sensitive)" value="{{ old('answer1') }}"  name="answer1" id="answer1" type="text" required="">
              </div>
            </div>
            <div class="form-group">
              	<label>Question 2 - {{ $questions->question2 }}</label>
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-ruler-pencil"></i></span>
                </div>
                <input class="form-control" placeholder="Type your answer for question #2 (case-sensitive)" value="{{ old('answer2') }}"  name="answer2" id="answer2" type="text" required="">
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-danger my-4">Disable 2-Step</button>
            </div>
          </form>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12 text-center">
          <a href="{{ route('logout') }}" class="text-light"><small>Not <b>{{ Auth::user()->username }}</b> ? Logout</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection