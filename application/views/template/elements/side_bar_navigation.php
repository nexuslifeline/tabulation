<style type="text/css">
    .static-sidebar-wrapper {
        transition: .2s;
    }
</style>

<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">

        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="<?php echo $this->session->user_photo; ?>" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username"><?php echo $this->session->user_fullname; ?></span>
                            <span class="useremail"><?php echo $this->session->user_email; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                       <br />
                        <li class="<?php echo (in_array('1',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-wallet"></i><span>Main</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('1-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="#">Tabulation</a></li>
                                <li class="<?php echo (in_array('1-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="#">Register Candidate</a></li>
                            </ul>
                        </li>
                        <li class="<?php echo (in_array('2',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-settings"></i><span>Settings</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('2-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Users">Register Member Account</a></li>
                                <li class="<?php echo (in_array('2-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="User_groups">Create user Group</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>


        </div>
    </div>
</div>