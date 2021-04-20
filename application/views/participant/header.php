<!DOCTYPE html>
<?php $loggedin = $_SESSION['ci_seesion_key']['user_id']; ?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <meta name="viewport" content="width=device-width">    
        <link rel="stylesheet" href="<?php echo HTTP_CSS_PATH; ?>bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>bootstrap/bootstrap-theme.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>style.css">
        <link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>jquery-ui.css">
        <link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>jquery-ui-timepicker-addon.css">
        <link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>jquery-ui.css">
        <script src="<?php print HTTP_JS_PATH; ?>jquery-1.12.4.js"></script>
        <script src="<?php print HTTP_JS_PATH; ?>jquery-ui.js"></script>
        <!-- Start -- Calender Control code   -->
<!--        <script>
            $(function () {
                $("#dob").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "1930:2021",
                    dateFormat: 'yy-mm-dd'
                });
            });
        </script>-->
        <style>
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }

            .topnav {
                overflow: hidden;
                background-color: #333;
            }

            .topnav a {
                float: left;
                color: #f2f2f2;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
            }

            .topnav a:hover {
                background-color: #ddd;
                color: black;
            }

            .topnav a.active {
                background-color: #4CAF50;
                color: white;
            }
        </style>
        <!-- End -- Calender Control code   -->
    </head>
    <body class="page-template-default page page-id-116 logged-in admin-bar  customize-support" cz-shortcut-listen="true">
        <header id="masthead" class="site-header" role="banner">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="logo">
                                <div class="site-header-inner col-sm-12">
                                    <div class="site-branding">
                                        <h1 class="site-title">
<!--                                            // Default Index page link-->
                                            <a href="<?php echo base_url(); ?>" title="Click here for Home page">Meetup</a>                     				                        				    </a>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div><!--.col-sm-3-->
                        <?php if($loggedin == '1') { ?>
                        <div class="col-sm-6">
                            <div id="logo">
                                <div class="site-header-inner col-sm-12">
                                    <div class="site-branding">
                                        <h3 class="site-title" style="float: right">
                                            <!--Logout Link-->
                                            <a title="Click Here to Logout" href="<?php print site_url(); ?>par/logout" class="button">Logout</a>                    				                        				    </a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div><!--.col-sm-3-->
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
            if($loggedin == '1')
            { ?>
            <div id="header-main" class="header-bottom">
                <div class="container">
                    <div class="row">                 
                        <div class="col-sm-12">  
                            <div class="topnav">
                                <a href="<?php echo site_url() ?>par/index">Participants List</a>
                                <a href="<?php echo site_url() ?>par/add">Participants Registration</a>

                            </div>
                            <!--<h1 align='center'>Task</h1>-->
                            <div id="responsive-menu-container"></div>
                        </div><!--.col-sm-12-->
                    </div><!--.row-->
                </div><!-- .container -->
            </div><!--.header-bottom-->
            <?php } ?>

        </header><!-- #masthead -->

        <div class="main-content">
            <div class="container">
                <div id="content" class="main-content-inner">

                    <!--<div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="row box">-->
