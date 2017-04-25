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

                <li class="active">contac us</li>

                 </ol>

                    <!-- end breadcumb -->

                    <h3><i class="fa fa-angle-right"></i> <?php echo $module_name; ?></h3>

                    <!--start action-->

                     <div class="action_buttons">

                        <div class="row">

                            <div class="col-sm-12">

                                <span class="add_button"><a  href=" <?php  echo site_url('feedback'); ?>" title="View Feedback">

									

                                        <button name="View Feedback" class="btn btn-theme"><i class="fa fa-eye"></i> View Feedback</button></a></span>

                                

                                        

                            </div>

                        </div>

                    </div>

                    <!--end action-->

                    <div class="row mt">

                        <div class="col-md-12">

                            <div class="content-panel">

                                <table class="table table-striped table-advance table-hover comon" id="contact_data">

                                    <h4><i class="fa fa-angle-right"></i> <?php echo $section_title; ?> </h4>

                                    <hr>

                                    <?php

                                    if ($this->session->flashdata('error')) {

                                        echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';

                                    }

                                    if ($this->session->flashdata('success')) {

                                        echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';

                                    }

                                    ?>

                                  



                                    <thead>

                                        <tr>

                                            <th><i class="fa fa-bullhorn"></i>  #  </th>

                                           

                                            <th><i class="fa fa-user"></i> <a href="javascript:void(0);">  Name </a> </th>

                                            <th><i class="fa fa-envelope"></i> <a href="javascript:void(0);"> Email </a></th>

                                            <th><i class="fa fa-file-image-o"></i> <a href="javascript:void(0);"> Subject </a></th>

                                            <th><i class="fa fa-keyboard-o"></i> <a href="javascript:void(0);"> Message </a></th>




                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        if ($total_rows != 0) {

$i = $offset + 1; 

                                            foreach ($contact_list as $contact) {?>

                                            <tr>

                                                    <td data-title="#"><?php echo $i++; ?></td>		

                                                    <td data-title="Name"><?php echo $contact['contact_name']; ?></td>

                                                    <td data-title="Email" class="mail_id"> &nbsp;&nbsp;<?php echo $contact['contact_email']; ?></td>

                                                    <td data-title="Subject"><?php echo $contact['contact_subject']; ?></td>

                                                    <td data-title="Message"><?php echo $contact['contact_message']; ?></td>

                                                   

                                                </tr>

                                                <?php

                                            }

                                        } else {

                                            ?>

                                            <tr><td align="center" colspan="6">Oops! No Data Found.</td></tr>

                                            <?php

                                        }

                                        ?>

                                    </tbody>

                                </table>







                            </div><!-- /content-panel -->



                        </div><!-- /col-md-12 -->



                        <!-- /pagination -->

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

        <script type="text/javascript">

            $(document).ready(function () {



                $(".alert-danger").fadeOut(3000).hide("1000");

                $(".alert-success").fadeOut(3000).hide("1000");

            });

        </script> 

        <script type="text/javascript" src="<?php echo base_url('admin/assets/js/jquery.validate.min.js') ?>"></script>

        <script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () {

                $("#seo_form").validate({

                    rules: {

                        semfieldvalue: {

                            required: true,

                        }

                    },

                    messages: {

                        semfieldvalue: {

                            required: "Field value is required.",

                        }

                    },

                });

            });

        </Script>



    </body>

</html>



