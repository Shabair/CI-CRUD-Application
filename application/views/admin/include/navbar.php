  <header class="header white-bg">
            <!--logo start-->
            <a href="<?php echo base_url(); ?>" class="logo"> CRUD<span></span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <!-- <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li> -->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!--<img alt="" src="img/avatar1_small.jpg">-->

                            <span class="username"> <i class="fa fa-user"></i>
								<?php
								    echo $CI->get_user_name();
								?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="<?php echo base_url('auth/edit_user/'.$CI->get_user_id()); ?>"><i class=" fa fa-gears"></i>Edit Profile</a></li>
                            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>

	       </header>
