@extends('ui.layouts.master')

@section('title')
Contact Support
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ route('contact') }}">CONTACT SUPPORT</a></li>
  </ol>
</nav>
@endsection

@section('nav_contact')
active
@endsection

@section('content')
  <!-- Header container -->
  <div class="container-fluid d-flex align-items-center">
    <div class="row">
      <div class="col-lg-12 col-md-10">
        <h1 class="display-2 text-white">Contact {{ Setting::get('app_name') }} Support</h1>
        <p class="text-white mt-0 mb-5">You can reach out to us and forward your concerns (if any) using the contact form below</p>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-12">
      @include('ui.partials.alerts')
      @include('ui.partials.errors')
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card bg-secondary shadow pull-up">
        <div class="card-header bg-white border-0">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Send Us an Email</h3>
            </div>
            <div class="col-4 text-right">
              <button class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Support Channel is Available">Available</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form role="form" method="POST" action="{{ route('sendEmail') }}" enctype="multipart/form-data">
          	@csrf
            <div class="pl-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="support_type">Support Type</label>
                    <select name="support_type" id="support_type" class="form-control form-control-alternative" required="">
                      <option disabled="" selected="" value="">Please select a type</option>
                      <option value="support">Support</option>
                      <option value="report">Report Bugs or Errors</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="support_subject">Subject</label>
                    <input type="text" id="support_subject" name="support_subject" placeholder="Support Ticket Subject" class="form-control form-control-alternative" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="form-control-label" for="support_message">Message</label>
                    <textarea type="text" id="support_message" name="support_message" placeholder="Your Message" class="form-control form-control-alternative" required=""></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="text-center">
                    <button type="submit" class="btn btn-success my-4">Send Email</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  @include('ui.layouts.partials.footer')
@endsection