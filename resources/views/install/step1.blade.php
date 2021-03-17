@extends('install.layouts.master')

@section('title')
Setup Environment
@endsection

@section('content')
<div class="tabs is-fullwidth">
  <ul>
    <li>
      <a href="{{ url('/admin/install') }}">
        <span><i class="fa fa-check-circle"></i><b> Requirements</b></span>
      </a>
    </li>
    <li class="is-active">
      <a>
          <span><b> Environment</b></span>
      </a>
    </li>
    <li>
      <a>
        <span>Database</span>
      </a>
    </li>
    <li>
      <a>
        <span>Finish</span>
      </a>
    </li>
  </ul>
</div>
<form action="{{ url('/admin/install/step1confirm') }}" method="POST">
  @csrf
  @include('install.partials.alerts')
  <div class="field">
    <label class="label">App Name</label>
    <div class="control">
      <input class="input" type="text" id="app_name" value="{{ Setting::get('app_name') }}" placeholder="Your App Name" name="app_name" required>
    </div>
  </div>
  <div class="field">
    <label class="label">App Email</label>
    <div class="control">
      <input class="input" type="text" id="app_email" value="{{ Setting::get('app_email') }}" placeholder="Your App Email" name="app_email" required>
    </div>
  </div>
  <div class="field">
    <label class="label">App Environment</label>
    <div class="control">
      <select class="input" id="environment" name="environment" required="">
        <option value="" disabled="" selected="">Select your app environment</option>
        <option selected value="production">Production</option>
        <option value="local">Local</option>
      </select>
    </div>
  </div>
  <div class="field">
    <label class="label">App Key <small class="pull-right">(Copy & Save this Key)</small></label>
    <div class="control">
      <input class="input" type="text" id="key" value="{{ $key }}" placeholder="Your Application Key" name="key" readonly="">
    </div>
  </div>
  <div class="field">
    <label class="label">App Debug</label>
    <div class="control">
      <select class="input" id="app_debug" name="app_debug" required="">
        <option value="" disabled="" selected="">Select an option</option>
        <option selected="" value="false">False</option>
        <option value="true">True</option>
      </select>
    </div>
  </div>
  <div class="field">
    <label class="label">App URL</label>
    <div class="control">
      <input class="input" type="text" id="app_url" value="{{ Setting::get('app_url') }}" placeholder="Your App URL" name="app_url" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Database Connection</label>
    <div class="control">
      <input class="input" type="text" id="database_connection" value="{{ Setting::get('db_default_type') }}" placeholder="Your DB Connected Type" name="database_connection" readonly>
    </div>
  </div>
  <div class="field">
    <label class="label">Database Hostname</label>
    <div class="control">
      <input class="input" type="text" id="database_hostname" value="{{ Setting::get('db_mysql_host') }}" placeholder="Your Database Hostname" name="database_hostname" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Database Port</label>
    <div class="control">
      <input class="input" type="text" id="database_port" value="{{ Setting::get('db_mysql_port') }}" placeholder="Your Database Connection Port" name="database_port" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Database Name</label>
    <div class="control">
      <input class="input" type="text" id="database_name" value="{{ config('database.mysql.database') }}"  placeholder="Your Database Name" name="database_name" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Database Username</label>
    <div class="control">
      <input class="input" type="text" id="database_username" value="{{ Setting::get('db_mysql_username') }}"  placeholder="Your Database Username" name="database_username" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Database Password</label>
    <div class="control">
      <input class="input" type="text" id="database_password" value="{{ Setting::get('db_mysql_password') }}"  placeholder="Your Database Password" name="database_password" >
    </div>
  </div>
  <div class="field">
    <label class="label">Broadcast Driver</label>
    <div class="control">
      <input class="input" type="text" id="broadcast_driver" value="log" placeholder="Your Broadcast Driver" name="broadcast_driver" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Cache Driver</label>
    <div class="control">
      <input class="input" type="text" id="cache_driver" value="array" placeholder="Your Cache Driver" name="cache_driver" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Session Driver</label>
    <div class="control">
      <input class="input" type="text" id="session_driver" value="file" placeholder="Your Session Driver" name="session_driver" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Session Lifetime</label>
    <div class="control">
      <input class="input" type="text" id="session_lifetime" value="120" placeholder="Your Session Lifetime" name="session_lifetime" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Queue Driver</label>
    <div class="control">
      <input class="input" type="text" id="queue_driver" value="sync" placeholder="Your Queue Driver" name="queue_driver" required="">
    </div>
  </div>
  <div class="field">
    <label class="label">Mail Driver</label>
    <div class="control">
      <input class="input" type="text" id="mail_driver" value="{{ Setting::get('app_mail_driver') }}" placeholder="Your Mail Driver" name="mail_driver" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail Host</label>
    <div class="control">
      <input class="input" type="text" id="mail_host" value="{{ Setting::get('app_mail_host') }}" placeholder="Your Mail Host" name="mail_host" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail Port</label>
    <div class="control">
      <input class="input" type="text" id="mail_port" value="{{ Setting::get('app_mail_port') }}" placeholder="Your Mail Port" name="mail_port" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail Username</label>
    <div class="control">
      <input class="input" type="text" id="mail_username" placeholder="Your Mail Provider Username" name="mail_username" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail Password</label>
    <div class="control">
      <input class="input" type="text" id="mail_password" placeholder="Your Mail Provider Password" name="mail_password" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail Encryption</label>
    <div class="control">
      <input class="input" type="text" id="mail_encryption" value="{{ Setting::get('app_mail_encryption') }}" placeholder="Your Mail Encryption Type" name="mail_encryption" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail From Address</label>
    <div class="control">
      <input class="input" type="text" id="mail_sender" placeholder="no-reply@larapass.net" name="mail_from_address" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mail From Name</label>
    <div class="control">
      <input class="input" type="text" id="mail_sender_name" placeholder="Enter Email Senders Name" name="mail_from_name" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mailgun Domain</label>
    <div class="control">
      <input class="input" type="text" id="mailgun_domain" value="{{ Setting::get('mailgun_domain') }}" placeholder="Domain Used on Mailgun" name="mailgun_domain" >
    </div>
  </div>
  <div class="field">
    <label class="label">Mailgun Secret</label>
    <div class="control">
      <input class="input" type="text" id="mailgun_secret" placeholder="Your Mailgun Secret Key" name="mailgun_secret" >
    </div>
  </div>
  <div style='text-align: right;'>
    <button type="submit" class="button is-link">Save Env File</button>
  </div>
</form>
@endsection