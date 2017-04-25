<!DOCTYPE html>

<html lang="en">

    <?php

    echo $head;

    ?>

    <body>

        <section id="container" >

            <!--header-->

            <?php echo $header; ?>

            <!--sidebar menu-->

            <?php echo $leftbar; ?>

            <!--main content start-->

            <section id="main-content">

                <section class="wrapper">

                     <!--breadcumb -->

                  <ol class="breadcrumb">

                <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i></a></li>

                <li class="active">job management</li>

                 </ol>

                    <!-- end breadcumb -->

                    <h3><i class="fa fa-angle-right"></i> <?php echo $module_name; ?> <span class="add_button"><a href="<?php echo site_url('job/add') ?>" title="Add user">
                        <button name="Add" class="btn btn-theme"><i class="fa fa-plus" aria-hidden="true"></i> Add </button></a></span> </h3>

                    <div class="row mt">

                        <div class="col-md-12">

                            <div class="content-panel">

                                <div class="search_box">

                                    <div class="col-md-9">

                                        <?php echo form_open('job/search', array('method' => 'post', 'id' => 'search_frm', 'class' => 'form-inline')); ?>

                                        <input type="text" class="form-control input-sm" value="<?php echo $search_keyword; ?>" placeholder="Search" name="search_keyword" id="search_keyword" required>

                                        <input type="submit" name="submit" value="Submit" class="btn btn-theme" />

                                        <?php echo form_close(); ?>

                                    </div>

                                    <?php if ($this->session->userdata('user_search_keyword')) { ?>

                                        <a href="<?php echo site_url('job/clear_search') ?>">Clear Search</a>

                                    <?php } ?>

                                </div>



                                <table class="table table-striped table-advance table-hover comon" id="user_data">

                                    <h4><i class="fa fa-angle-right"></i> <?php echo $section_title; ?> </h4>

                                    <hr>

                                    

                                    <?php

                                    if ($this->session->flashdata('error')) {

                                        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';

                                    }

                                    ?>

                                    <thead>

                                        <tr>

                                            <?php

                                            if ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') {

                                                $segment2 = 'index';

                                            } else {

                                                $segment2 = 'search';

                                            }

                                            ?>

                                         <th><i class="fa fa-bullhorn"></i>  #  </th>

                                            <?php echo ( $this->uri->segment(3) == 'job_id' && $this->uri->segment(4) == 'ASC' ) ? '<i class="glyphicon glyphicon-arrow-up">' : (( $this->uri->segment(3) == 'job_id' && $this->uri->segment(4) == 'DESC' ) ? '<i class="glyphicon glyphicon-arrow-down">' : '' ); ?> 

                                            </th>

                                          

                                            <th><i class="fa fa-user"></i> <a href="<?php echo ( $this->uri->segment(3) == 'fname' && $this->uri->segment(4) == 'ASC') ? site_url($this->uri->segment(1) . '/' . $segment2 . '/fname/DESC/' . $offset) : site_url($this->uri->segment(1) . '/' . $segment2 . '/fname/ASC/' . $offset); ?>"> Name </a>

                                                <?php echo ( $this->uri->segment(3) == 'fname' && $this->uri->segment(4) == 'ASC' ) ? '<i class="glyphicon glyphicon-arrow-up">' : (( $this->uri->segment(3) == 'fname' && $this->uri->segment(4) == 'DESC' ) ? '<i class="glyphicon glyphicon-arrow-down">' : '' ); ?> 

                                            </th>

                                        

                                            <th class="hidden-phone"><i class="fa fa-envelope"></i> <a href="<?php echo ( $this->uri->segment(3) == 'email' && $this->uri->segment(4) == 'ASC') ? site_url($this->uri->segment(1) . '/' . $segment2 . '/email/DESC/' . $offset) : site_url($this->uri->segment(1) . '/' . $segment2 . '/email/ASC/' . $offset); ?>">  Email </a>

                                                <?php echo ( $this->uri->segment(3) == 'email' && $this->uri->segment(4) == 'ASC' ) ? '<i class="glyphicon glyphicon-arrow-up">' : (( $this->uri->segment(3) == 'email' && $this->uri->segment(4) == 'DESC' ) ? '<i class="glyphicon glyphicon-arrow-down">' : '' ); ?> 

                                            </th>



                                            <th><i class=" fa fa-edit"></i> <a href="javascript:void(0);"> Status </a></th>
                                            

                                            <th><i class=" fa fa-edit"></i> <a href="javascript:void(0);"> Action </a></th>
                                             <th><i class=" fa fa-view"></i> <a href="javascript:void(0);"> View</a></th>

                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php

                                        if ($total_rows != 0) {

                                            $i = $offset + 1; 

                                            foreach ($job_list as $job) {

                                                $job_encode_id = base64_encode($job['job_id']);

                                                ?>

                                                <tr>

                                                    <td data-title="#"><?php echo $i++; ?></td> 

                                                   

                                                    <td data-title="Name"><?php echo $job['fname']; ?></td>

                                                

                                                    <td data-title="Email" class="mail_id"> &nbsp;&nbsp;<?php echo $job['email']; ?></td>

                                                    <td data-title="Status">

                                                        <?php

                                                        if ($job['status'] == 1) {

                                                            ?>

                                                            <button class="btn btn-primary btn-xs"><a href="<?php echo site_url('job/change_status/' . $job['job_id'] . '/0'); ?>" style='color:#fff;'>Active</a></button>

                                                            <?php

                                                        } else {

                                                            ?>

                                                            <button class="btn btn-primary btn-xs"><a href="<?php echo site_url('job/change_status/' . $job['job_id'] . '/1'); ?>" style='color:#fff;'>Not Active</a></button>

                                                            <?php

                                                        }

                                                        ?>

                                                    </td>

                                                    <td data-title="Edit">

                                                        <a href="<?php echo site_url('job/edit/' . $job_encode_id); ?>">
                                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>
                                                            </button></a>

                                                        <a onClick="if (!confirm('Do you really want to delete admin?')) {

                                                                            return false;

                                                                        }" href="<?php echo site_url('job/delete/' . $job_encode_id); ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>

                                                    </td>

                                                     <td data-title="View">


                                                         <button class="btn btn-primary btn-xs"><a href="<?php echo site_url('job/view/'. $job_encode_id); ?>" style='color:#fff;'>view</a></button>


                                                    </td>


                                                </tr>

                                                <?php

                                            }

                                        } else {

                                            ?>

                                            <tr>

                                                <td align="center" colspan="6"> Oops! No Data Found</td>

                                            </tr>  

                                            <?php

                                        }

                                        ?>

                                    </tbody>

                                </table>







                            </div><!-- /content-panel -->



                        </div><!-- /col-md-12 -->

<div class="dta_left">

                        <?php

                                    if ($total_rows > 0) {

                                        if ($this->pagination->create_links()) {



                                            $rec1 = $offset + 1;

                                            $rec2 = $offset + $limit;

                                            if ($rec2 > $total_rows) {

                                                $rec2 = $total_rows;

                                            }

                                            ?>

                                            <div style="margin-left: 20px;">

                                                <?php echo "Records $rec1 - $rec2 of $total_rows"; ?>

                                            </div><?php } else {

                                                ?>

                                            <div style="margin-left: 20px;">

                                                <?php echo "Records 1 - $total_rows of $total_rows"; ?>

                                            </div>



                                            <?php

                                        }

                                    }

                                    ?>

                        </div>

                        <!-- /pagination -->

                        <?php

                        if ($this->pagination->create_links()) {



                            $tot_client = ceil($total_rows / $limit);





                            $cur_client = ceil($offset / $limit) + 1;

                            ?>



                           



                            <div class="text-right data_right">

                                <div id="example2_paginate" class="dataTables_paginate paging_simple_numbers">

                                    <?php echo $this->pagination->create_links(); ?> 

                                </div>

                            </div>



                        <?php } ?>



                    </div><!-- /row -->



                </section><! --/wrapper -->

            </section><!-- /MAIN CONTENT -->



            <!--main content end-->

            <?php echo $footer; ?>

        </section>



        <!-- js placed at the end of the document so the pages load faster -->

        <script src="<?php echo base_url('admin/assets/js/jquery.js') ?>"></script>

        <script src="<?php echo base_url('admin/assets/js/bootstrap.min.js') ?>"></script>

        <script class="include" type="text/javascript" src="<?php echo base_url('admin/assets/js/jquery.dcjqaccordion.2.7.js') ?>"></script>

        <script src="<?php echo base_url('admin/assets/js/jquery.scrollTo.min.js') ?>"></script>

        <script src="<?php echo base_url('admin/assets/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>

        <!--common script for all pages-->

        <script src="<?php echo base_url('admin/assets/js/common-scripts.js') ?>"></script>

        <!--script for this page-->

        <script type="text/javascript">

                                                            $(document).ready(function () {

                                                                $('.alert-success').fadeOut(3000).hide('700');

                                                                $('.alert-danger').fadeOut(3000).hide('700');



                                                            });

        </script>



    </body>

</html>

