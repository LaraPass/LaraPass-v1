@extends('ui.layouts.ep')

@section('title')
{{ Lang::get(Config::get('maintenancemode.language-path', 'maintenancemode::defaults.') . '.title') }}
@endsection

@section('content')
<!-- Page content -->
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-body px-lg-5 py-lg-5">
            <blockquote class="blockquote text-center">
                <h1>{{ ${Config::get('maintenancemode.inject.prefix').'Message'} }}</h1>
                <footer class="blockquote-footer">{{ Lang::get(Config::get('maintenancemode.language-path', 'maintenancemode::defaults.') . '.last-updated', ['timestamp' => ${Config::get('maintenancemode.inject.prefix').'Timestamp'}->diffForHumans()]) }} </footer>
            </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection