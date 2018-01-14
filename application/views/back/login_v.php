<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator | login</title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="<?=base_url("assets/back/");?>css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="<?=base_url("assets/back/");?>css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="<?=base_url("assets/back/");?>css/animate-css/animate.min.css" media="screen" >

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="<?=base_url("assets/back/");?>css/icheck/skins/flat/blue.css" >

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="<?=base_url("assets/back/");?>css/main.css" media="screen" >

        <!-- ========== MODERNIZR ========== -->
        <script src="<?=base_url("assets/back/");?>js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="">
        <div class="main-wrapper">

            <div class="login-bg-color bg-gray">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box">
                            <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <!-- <h4>options - admin login</h4> -->
                                </div>
                            </div>
                            <div class="panel-body p-20">
                                <div class="section-title">
                                    <p class="sub-title text-muted">login</p>
                                </div>
                                <?php echo form_open("back/login", array("class" => "form-horizontal"));?>
                                    <div class="form-group left-icon">
                                		<label for="identity" class="col-sm-3 control-label">ID</label>
                                		<div class="col-sm-9">
                                            <span class="glyphicon glyphicon-envelope form-left-icon"></span>
                                            <input type="text" name="email" class="form-control" placeholder="email"> <!-- email -->
                                		</div>
                                	</div>
                                    <div class="form-group left-icon">
                                		<label for="password" class="col-sm-3 control-label">password</label>
                                		<div class="col-sm-9">
                                            <span class="glyphicon glyphicon-tags form-left-icon"></span>
                                			      <input type="password" name="password" class="form-control" placeholder="password"> <!-- email -->
                                		</div>
                                	</div>
                                  <div class="form-group mt-20">
                                        <div class="">
                                            <button type="submit" name="submit" class="btn btn-success btn-labeled pull-right">submit<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                            <div class="clearfix"></div>
                                        </div>
                                  </div>
                                <?php echo form_close();?>
                                <hr>
                                <div class="clearfix">
                                  <?php if (isset($error_message)){ ?>
                                    <div style="font-size:10px color:#454545; text-align:center; margin-bottom:10px;"><?php echo $error_message; ?></div>
                                  <?php } ?>
                                </div>
                                <!-- /.text-center -->
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->
        </div>
        <!-- /.main-wrapper -->
        <!-- ========== COMMON JS FILES ========== -->
        <script src="<?=base_url("assets/back/");?>js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url("assets/back/");?>js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?=base_url("assets/back/");?>js/bootstrap/bootstrap.min.js"></script>
        <script src="<?=base_url("assets/back/");?>js/pace/pace.min.js"></script>
        <script src="<?=base_url("assets/back/");?>js/lobipanel/lobipanel.min.js"></script>
        <script src="<?=base_url("assets/back/");?>js/iscroll/iscroll.js"></script>
        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?=base_url("assets/back/");?>js/icheck/icheck.min.js"></script>
        <!-- ========== THEME JS ========== -->
        <script src="<?=base_url("assets/back/");?>js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>
        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
