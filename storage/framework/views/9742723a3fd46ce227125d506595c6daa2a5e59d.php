<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <!-- Theme head starts -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eBook | Admin</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('/public/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('/public/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('/public/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo e(asset('/public/vendors/google-code-prettify/bin/prettify.min.css')); ?>" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo e(asset('/public/css/custom.min.css')); ?>" rel="stylesheet">
  <!-- Theme head ends  -->

  <!-- Styles -->
  <link href="<?php echo e(asset('/public/css/app.css')); ?>" rel="stylesheet">

  <!-- jQuery -->
  <script type="text/javascript" src="<?php echo e(asset('/public/vendors/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'eBook')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('/publicjs/app.js')); ?>" defer></script>

    <!-- JS Validator -->
    <!-- <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    
    <!--  pNotify  -->
    <!--<script src="<?php echo e(asset('/public/vendors/pnotify/dist/pnotify.js')); ?>"></script>-->
    <!--<script src="<?php echo e(asset('/public/vendors/pnotify/dist/pnotify.buttons.js')); ?>"></script>-->
    <!--<script src="<?php echo e(asset('/public/vendors/pnotify/dist/pnotify.nonblock.js')); ?>"></script>-->
    <!--<script src="<?php echo e(asset('/public/vendors/pnotify/dist/pnotify.css')); ?>"></script>-->
    <!--<script src="<?php echo e(asset('/public/vendors/pnotify/dist/pnotify.buttons.css')); ?>"></script>-->
    <!--<script src="<?php echo e(asset('/public/vendors/pnotify/dist/pnotify.nonblock.css')); ?>"></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>
<?php $site_url=URL::to('/');?>
<body class="nav-md">
    <!-- <div id="app"> -->
      <div class="container body">
    <?php if(auth()->guard()->check()): ?>
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $site_url;?>/home" class="site_title"><i class="fa fa-book"></i> <span> eBook</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php if(Auth::user()->image): ?>
                    <img src="<?php echo e(asset('/public/images/user_images/'. Auth::user()->image)); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="img-circle profile_img">
                <?php else: ?>
                    <img src="<?php echo e(asset('/public/images/user_images/default.jpg')); ?>" alt="<?php echo e(Auth::user()->name); ?>" class="img-circle profile_img">
                <?php endif; ?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo e(Auth::user()->name); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!--<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>-->
                  <!--  <ul class="nav child_menu">-->
                      <li><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i> Dashboard</a></li>
                  <!--    <li><a href="index2.html">Dashboard2</a></li>-->
                  <!--    <li><a href="index3.html">Dashboard3</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <li><a href="<?php echo e(route('users')); ?>"><i class="fa fa-user"></i> Users List</a></li>
                  <li><a href="<?php echo e(route('professions')); ?>"><i class="fa fa-bars"></i> Professions</a></li>
                  <li><a href="<?php echo e(route('questionnaires')); ?>"><i class="fa fa-edit"></i>Quesionnaires</a></li>
                  <li><a href="<?php echo e(route('ebooks')); ?>"><i class="fa fa-book"></i> Ebooks</a></li>
                  <!--<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>-->
                  <!--  <ul class="nav child_menu">-->
                  <!--    <li><a href="form.html">General Form</a></li>-->
                  <!--    <li><a href="form_advanced.html">Advanced Components</a></li>-->
                  <!--    <li><a href="form_validation.html">Form Validation</a></li>-->
                  <!--    <li><a href="form_wizards.html">Form Wizard</a></li>-->
                  <!--    <li><a href="form_upload.html">Form Upload</a></li>-->
                  <!--    <li><a href="form_buttons.html">Form Buttons</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--<li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>-->
                  <!--  <ul class="nav child_menu">-->
                  <!--    <li><a href="general_elements.html">General Elements</a></li>-->
                  <!--    <li><a href="media_gallery.html">Media Gallery</a></li>-->
                  <!--    <li><a href="typography.html">Typography</a></li>-->
                  <!--    <li><a href="icons.html">Icons</a></li>-->
                  <!--    <li><a href="glyphicons.html">Glyphicons</a></li>-->
                  <!--    <li><a href="widgets.html">Widgets</a></li>-->
                  <!--    <li><a href="invoice.html">Invoice</a></li>-->
                  <!--    <li><a href="inbox.html">Inbox</a></li>-->
                  <!--    <li><a href="calendar.html">Calendar</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--<li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>-->
                  <!--  <ul class="nav child_menu">-->
                  <!--    <li><a href="tables.html">Tables</a></li>-->
                  <!--    <li><a href="tables_dynamic.html">Table Dynamic</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--<li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>-->
                  <!--  <ul class="nav child_menu">-->
                  <!--    <li><a href="chartjs.html">Chart JS</a></li>-->
                  <!--    <li><a href="chartjs2.html">Chart JS2</a></li>-->
                  <!--    <li><a href="morisjs.html">Moris JS</a></li>-->
                  <!--    <li><a href="echarts.html">ECharts</a></li>-->
                  <!--    <li><a href="other_charts.html">Other Charts</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                  <!--<li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>-->
                  <!--  <ul class="nav child_menu">-->
                  <!--    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>-->
                  <!--    <li><a href="fixed_footer.html">Fixed Footer</a></li>-->
                  <!--  </ul>-->
                  <!--</li>-->
                </ul>
              </div>
              <!--<div class="menu_section">-->
              <!--  <h3>Live On</h3>-->
              <!--  <ul class="nav side-menu">-->
              <!--    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>-->
              <!--      <ul class="nav child_menu">-->
              <!--        <li><a href="e_commerce.html">E-commerce</a></li>-->
              <!--        <li><a href="projects.html">Projects</a></li>-->
              <!--        <li><a href="project_detail.html">Project Detail</a></li>-->
              <!--        <li><a href="contacts.html">Contacts</a></li>-->
              <!--        <li><a href="profile.html">Profile</a></li>-->
              <!--      </ul>-->
              <!--    </li>-->
              <!--    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>-->
              <!--      <ul class="nav child_menu">-->
              <!--        <li><a href="page_403.html">403 Error</a></li>-->
              <!--        <li><a href="page_404.html">404 Error</a></li>-->
              <!--        <li><a href="page_500.html">500 Error</a></li>-->
              <!--        <li><a href="plain_page.html">Plain Page</a></li>-->
              <!--        <li><a href="login.html">Login Page</a></li>-->
              <!--        <li><a href="pricing_tables.html">Pricing Tables</a></li>-->
              <!--      </ul>-->
              <!--    </li>-->
              <!--    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>-->
              <!--      <ul class="nav child_menu">-->
              <!--          <li><a href="#level1_1">Level One</a>-->
              <!--          <li><a>Level One<span class="fa fa-chevron-down"></span></a>-->
              <!--            <ul class="nav child_menu">-->
              <!--              <li class="sub_menu"><a href="level2.html">Level Two</a>-->
              <!--              </li>-->
              <!--              <li><a href="#level2_1">Level Two</a>-->
              <!--              </li>-->
              <!--              <li><a href="#level2_2">Level Two</a>-->
              <!--              </li>-->
              <!--            </ul>-->
              <!--          </li>-->
              <!--          <li><a href="#level1_2">Level One</a>-->
              <!--          </li>-->
              <!--      </ul>-->
              <!--    </li>-->
              <!--    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>-->
              <!--  </ul>-->
              <!--</div>-->

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo e(route('logout')); ?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php if(Auth::user()->image): ?>
                        <img src="<?php echo e(asset('/public/images/user_images/'. Auth::user()->image)); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('/public/images/user_images/default.jpg')); ?>" alt="<?php echo e(Auth::user()->name); ?>">
                    <?php endif; ?>
                    <?php echo e(Auth::user()->name); ?>

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li>
                      <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Log Out
                      </a>
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                          <?php echo csrf_field(); ?>
                      </form>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
        <!-- /top navigation -->
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    eBook
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    <?php endif; ?>
    <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    <!-- </div> -->

    <!-- Bootstrap -->
    <script src="<?php echo e(asset('/public/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('/public/vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo e(asset('/public/vendors/nprogress/nprogress.js')); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo e(asset('/public/vendors/Chart.js/dist/Chart.min.js')); ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo e(asset('/public/vendors/gauge.js/dist/gauge.min.js')); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo e(asset('/public/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('/public/vendors/iCheck/icheck.min.js')); ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo e(asset('/public/vendors/skycons/skycons.js')); ?>"></script>
    <!-- Switchery -->
    <script src="<?php echo e(asset('/public/vendors/switchery/dist/switchery.min.js')); ?>"></script>
    <!-- Flot -->
    <script src="<?php echo e(asset('/public/vendors/Flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/Flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/Flot/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/Flot/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/Flot/jquery.flot.resize.js')); ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo e(asset('/public/vendors/flot.orderbars/js/jquery.flot.orderBars.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/flot-spline/js/jquery.flot.spline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/flot.curvedlines/curvedLines.js')); ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo e(asset('/public/vendors/DateJS/build/date.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('/public/vendors/jqvmap/dist/jquery.vmap.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('/public/vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/public/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('/public/js/custom.min.js')); ?>"></script>

</body>
</html>
