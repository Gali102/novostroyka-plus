<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vnk</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="/css/admin.css">

  <style>
      table.table form
      {
        display: inline-block;
      }
      button.delete
      {
        background: transparent;
        border: none;
        color: #337ab7;
        padding: 0px;
      }
    </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>nk</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Vnk</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a>Привет, {{Auth::user()->name}}</a>
          </li>
          <li>
            <a href="/logout">Выход из системы</a>
          </li>
          <li>
            <a href="/"><i class="fa fa-sign-out" style="margin-right: 3px;"></i>Выход на сайт</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      
      @include('admin._sidebar')

    </section>
    <!-- /.sidebar -->
  </aside>

  
  @yield('content')

 

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version 1.1.0 </b> от 24.07.2020
    </div>
    <strong>Copyright &copy; 2020
  </footer>
  
</div>
<!-- ./wrapper -->

<script src="/js/admin.js"></script>
@stack('script')
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckfinder/ckfinder.js"></script>
<script>
  $(document).ready(function(){
    var editor = CKEDITOR.replaceAll();
    CKfinder.setupCKeditor( editor );
  })
</script>
    
</html>
