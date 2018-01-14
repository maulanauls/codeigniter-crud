<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	  <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Administrator | <?=$title_head;?></title>

        <!-- ========== COMMON STYLES ========== -->
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/bootstrap.min.css" media="screen">
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/font-awesome.min.css" media="screen">
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/animate-css/animate.min.css" media="screen">
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/lobipanel/lobipanel.min.css" media="screen">

        <!-- ========== PAGE STYLES ========== -->
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/line/red.css">
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/line/green.css">
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/square/blue.css" >
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/square/green.css" >
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/square/red.css" >
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/flat/flat.css" >
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/summernote/summernote.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url('assets/back/');?>js/DataTables/datatables.min.css">
        <link rel="stylesheet" href="<?=base_url();?>assets/back/js/dropify/dist/css/dropify.min.css">

        <!-- ========== THEME CSS ========== -->
        <link rel="stylesheet" href="<?=base_url('assets/back/');?>css/main.css" media="screen">

        <!-- ========== MODERNIZR ========== -->
        <script src="<?=base_url('assets/back/');?>js/modernizr/modernizr.min.js"></script>

        <!-- ========== COMMON JS FILES ========== -->
        <script src="<?=base_url('assets/back/');?>js/jquery/jquery-2.2.4.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="<?=base_url('assets/back/');?>js/jquery/jquery.form.js"></script>
        <script src="<?=base_url('assets/back/');?>js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/bootstrap/bootstrap.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/pace/pace.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/lobipanel/lobipanel.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/iscroll/iscroll.js"></script>
        <script type="text/javascript" src="<?=base_url("assets/back/");?>js/jquery.maskedinput/jquery.maskedinput.min.js"></script>
        <!-- ========== PAGE JS FILES ========== -->
        <script src="<?=base_url('assets/back/');?>js/prism/prism.js"></script>
        <script src="<?=base_url('assets/back/');?>js/waypoint/waypoints.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/counterUp/jquery.counterup.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/icheck/icheck.min.js"></script>
        <script src="<?=base_url('assets/back/');?>js/summernote/summernote.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script>
          var controller = "<?=$this->uri->segment(3);?>"; // get controller
          var base_url = "<?=base_url('back/auth/');?>"; // get base url
          var guest_url = "<?=base_url('back/guestbook/');?>"; // get guest book url
          var logout ="<?=base_url('back/login');?>"; // get logout url
        </script>

        <script src="<?=base_url('assets/back/');?>js/main.js"></script> <!-- script global js in here -->
        <!-- end script -->
        <script src="<?=base_url('assets/back/');?>js/content.js"></script> <!-- script for crud function in here -->
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <nav class="navbar top-navbar bg-white box-shadow">
              <?php $this->load->view('back/layout/v_header');?>
            </nav>

            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                    <div class="left-sidebar bg-black-300 box-shadow">
                        <?php $this->load->view('back/layout/v_menu');?>
                    </div>
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h4 class="title"><?=$header;?> <small class="ml-10"><?=$page;?></small></h4>
                                    <p class="sub-title">administrator admin panel</p>
                                </div>
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="index.html"><i class="fa fa-home"></i> <?=$header;?></a></li>
            							<li class="active"><?=$subheader;?></li>
            						</ul>
                                </div>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <section class="section">
                            <div class="container-fluid">
                                <?=$content;?>
                            </div>
                        </section>
                    </div>
                    <!-- /.main-page -->
                    <!-- modal -->
                    <div class="modal fade" id="modalform" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <form method="post" id="guest-bookForm" class="p-20">
                            <input type="hidden" name="id">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </h4>
                              </div>
                              <div class="modal-body">
                                   <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="name">name</label>
                                              <input value="" class="form-control" id="name" placeholder="enter your name" type="text" name="name">
                                              <span class="help-block name"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="email">email</label>
                                              <input value="" class="form-control" id="email" placeholder="enter your valid email" type="text" name="email">
                                              <span class="help-block email"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="telp">telp</label>
                                              <input value="" class="form-control" id="telp" placeholder="enter your valid phone number" type="text" name="telp">
                                              <span class="help-block telp"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="prov">prov</label>
                                              <select name="prov" class="form-control" id="prov">
                                                  <option value=''>select province</option>
                                                  <option value='jawa barat'>jawa barat</option>
                                                  <option value='jawa tengah'>jawa tengah</option>
                                                  <option value='jawa timur'>jawa timur</option>
                                                  <option value='Kalimantan'>Kalimantan</option>
                                              </select>
                                              <span class="help-block prov"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="kota">kota</label>
                                              <select name="kota" class="form-control" id="prov">
                                                  <option value=''>select city</option>
                                                <?php foreach ($data_kota as $list){ ?>
                                                  <option value='<?=$list->id;?>'><?=$list->name;?></option>
                                                <?php } ?>
                                              </select>
                                              <span class="help-block kota"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label for="kecamatan">kecamatan</label>
                                          
                                              <select name="kecamatan" class="form-control" id="kecamatan">
                                                  <option value=''>select kecamatan</option>

                                              </select>
                                              <span class="help-block kecamatan"></span>
                                            </div>
                                        </div>
                                    </div>
                              </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> close</button>
                                    <button type="submit" onclick="bttn_save_guestbook()" id="btnSave" class="btn btn-primary"><i class="fa fa-arrow-right"></i> submit</button>
                                  </div>
                              </form>
                            </div>
                        </div>
                    </div>
                    <!-- end modals -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
