<?php
ini_set('display_errors', 0);
if (version_compare(PHP_VERSION, '5.3', '>='))
  {
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
  }
  else {
    error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>@yield('title') | LaraPass Installer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
    body, html {
    background: #F7F7F7;
    }
    </style>
  </head>
  <body>
    <div class="container main_body"> <div class="section" >
      <div class="column is-8 is-offset-2">
        <center><h1 class="title" style="padding-top: 20px">
        LaraPass Installer
        </h1><br></center>
        <div class="box">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  <div class="content has-text-centered">
    <p>
      2018-20 &copy; <a href="https://larapass.net" target="_blank">LaraPass</a> - All rights reserved | Check out LaraPass <a href="https://docs.larapass.net" target="_blank"> Documentation </a> for any guidance.
    </p>
    <br>
  </div>
</body>
</html>