@extends('ui.layouts.ep')

@section('title')
Privacy Policy of {{ Setting::get('app_name') }}
@endsection

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-header bg-secondary">
          <div class="text-center text-muted">
            <h1><u>Privacy Policy</u> of <span class="text-purple">{{ Setting::get('app_name') }}</span> </h1>
            <small>Last Updated : 
              <!-- Privacy Policy Last Updated Date -->
              <span class="text-purple">26-Jan-2019</span>
              <!-- Last Updated Date Ends -->
            </small>
          </div>
        </div>
        <div class="card-body px-lg-5 py-lg-5">
          <!-- Insert your Privacy Policy HTML markup or Plain text here -->
          
          <p><strong>Your privacy is important to us. It is LaraPass' policy to respect your privacy regarding any information we may collect from you across our website, <a href="{{ Setting::get('app_url') }}">{{ Setting::get('app_url') }}</a>, and other sites we own and operate.</strong></p>
          <p><strong>We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.</strong></p>
          <p><strong>We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorised access, disclosure, copying, use or modification.</strong></p>
          <p><strong>We don’t share any personally identifying information publicly or with third-parties, except when required to by law.</strong></p>
          <p><strong>Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</strong></p>
          <p><strong>You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.</strong></p>
          <p><strong>Your continued use of our website will be regarded as acceptance of our practices around privacy and personal information. If you have any questions about how we handle user data and personal information, feel free to contact us.</strong></p>
          <p><strong>This policy is effective as of 26 January 2019.</strong></p>

          <!-- Privacy Policy Content Ends -->
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
          <a href="{{ url()->previous() }}" class="text-light"><small><i class="fa fa-arrow-circle-o-left"></i> Go Back</small></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection