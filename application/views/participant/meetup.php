<!DOCTYPE html>
<?php
$this->load->view('participant/header');

?>
<html>
<head>
    <title>Upcoming Meetup</title>
<link rel="stylesheet" href="<?php print HTTP_CSS_PATH; ?>jquery.e-calendar.css">
<script src="<?php print HTTP_JS_PATH; ?>jquery.min.js"></script>
     <script src="<?php print HTTP_JS_PATH; ?>jquery.e-calendar.js"></script>
     <script src="<?php print HTTP_JS_PATH; ?>index.js"></script>
    <!--<script type="text/javascript" src="index.js"></script>-->
    
</head>
    <body>
        <br />
        <h2 align="center"><a href="#">Upcoming Meetup</a></h2>
        <br />
        <div class="row">
        <div class="col-sm-6">
                            <div id="logo">
                                <div class="site-header-inner col-sm-12">
                                    <div class="container">
            <div id="calendar"></div>
        </div>
                                </div>
                            </div>
                        </div>
        </div><!--.col-sm-3-->
        
    </body>
    <?php
    $this->load->view('participant/footer');
    ?>
</html>