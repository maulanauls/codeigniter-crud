<div class="sidebar-content">
    <div class="user-info closed">
        <img src="http://placehold.it/90/c2c2c2?text=User" alt="<?=$this->session->userdata('name');?>" class="img-circle profile-img">
        <h6 class="title"><?=$this->session->userdata('username');?> <?=$this->session->userdata('name');?></h6>
        <small class="info">administrator</small>
    </div>
    <!-- /.user-info -->

    <div class="sidebar-nav">
        <ul class="side-nav color-gray">
            <li class="nav-header">
                <span class="">main</span>
            </li>
            <li class="has-children">
                <a href="#"><i class="fa fa-dashboard"></i> <span>dashboard</span> <i class="fa fa-angle-right arrow"></i></a>
                <ul class="child-nav">
                    <li><a href="<?=base_url('back/auth/index');?>"><i class="fa fa-bolt"></i> <span>index</span></a></li>
                </ul>
            </li>

            <li class="nav-header">
                <span class="">guest book</span>
            </li>
            <li class="has-children">
                <a href="#"><i class="fa fa-magic"></i> <span>guest-book</span> <i class="fa fa-angle-right arrow"></i></a>
                <ul class="child-nav">
                    <li><a href="<?=base_url('back/guestbook');?>"><i class="fa fa-book"></i> <span>guest book list</span></a></li>
                    <li><a onclick="bttn_add_guestbook()" href="javascript:void(0);"><i class="fa fa-plus-square"></i> <span>add guest book</span></a></li>
                </ul>
            </li>
        </ul>
        <!-- /.side-nav -->
    </div>
    <!-- /.sidebar-nav -->
</div>
<!-- /.sidebar-content -->
