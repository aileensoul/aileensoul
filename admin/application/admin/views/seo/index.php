<!DOCTYPE html><html lang="en">   
 <?php    echo $head;    ?>   
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
         <li class="active">seo</li> </ol>                    
         <!-- end breadcumb -->               
          <h3> <i class="fa fa-angle-right"></i> 
          <?php echo $module_name; ?></h3>                                   
           <div class="row mt">                       
            <div class="col-md-12">                           
             <div class="content-panel">                                
             <table class="table table-striped table-advance table-hover comon" id="seo">                                    
             <h4><i class="fa fa-angle-right"></i> <?php echo $section_title; ?> </h4>                                    <hr>                                  <?php  if ($this->session->flashdata('error')) {echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>'; }   
             if ($this->session->flashdata('success')) {echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';}  ?>                                                                        
             <thead>                                        
             <tr>                                            
             <th><i class="fa fa-bullhorn"></i>  #  </th>                              
             <th><i class="fa fa-facebook"></i> <a href="javascript:void(0);"> Seo Field Name </a> </th>                                            
             <th><i class="fa fa-bars"></i> <a href="javascript:void(0);"> Seo Field Value </a></th>                                            
             <th><a href="javascript:void(0);">  </a></th>                            
             </tr>                                    
             </thead>                                    
             <tbody>                                        
             <?php                                        
             if ($total_rows != 0) {                                           
              foreach ($seo_list as $seo) { ?>                                               
               <tr>                                                    
               <td data-title="#"><?php echo $seo['seoid']; ?></td>                                                    
               <td data-title="Seo Field Name "><?php echo $seo['seofieldname']; ?></td>                                                    
               <td data-title="Seo Field Value" ><?php echo $seo['seofieldvalue']; ?></td>                                                    
               <td data-title=""> <a data-toggle="modal" href="#myModal-<?php echo $seo['seoid']; ?>"> <button class="btn btn-primary btn-xs"><i class="fa fa fa-check"></i></button></a>                                
                </td>                                               
                 </tr>                                               
                  <!-- Modal -->                                           
                   <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-<?php echo $seo['seoid']; ?>" class="modal fade">
            <div class="modal-dialog">
            <div class="modal-content" style="min-height:165px;">      
             <div class="modal-header">                            
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"><?php echo $seo['seofieldname']; ?></h4>       
               </div>                                                      
                <div class="modal-body" style="margin-bottom:10px;">
                  <div class="col-sm-3">                                                               
                    <p>SEM Field Value</p>                                                           
                        </div>                                                            
                    <?php                                                            
                    $form_attr = array('name' => 'seo_form', 'id' => 'seo_form');                                                            
                    echo form_open('seo/edit', $form_attr); ?>                                                           
                    <div class="col-sm-9">                                                                
                    <input type="hidden" value="<?php echo $seo['seoid']; ?>" name="seoid"  autocomplete="off" class="form-control placeholder-no-fix">                                                                
                    <input type="text" value="<?php echo $seo['seofieldvalue']; ?>" name="seofieldvalue"  autocomplete="off" class="form-control placeholder-no-fix">                              
                    </div>                                                           
                     <div class="col-sm-3">                                                                
                     <input type="submit" class="btn btn-theme" name="submit" value="Submit" />                                      
                     </div>                                                            </form>                                                        
                     </div>                                                    
                     </div>                                                
                     </div>                                            
                     </div>                                            
                     <!-- modal -->                                            
                     <?php      }  } 
                     else { ?>                                        
                      <tr><td align="center" colspan="6">Oops! No Data Found.</td></tr> <?php } ?>                                    
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
                       		   <div  style="margin-left: 20px;">                                                
                       		   <?php echo "Records $rec1 - $rec2 of $total_rows"; ?>                                            
                       		   </div><?php } else { ?>                                            
                       		   <div style="margin-left: 20px;">                                               
                       		    <?php echo "Records 1 - $total_rows of $total_rows"; ?> 
                       		    </div>                                            
                       		    <?php  }        }    ?>                        
                       		    </div>                        
                       		    <!-- /pagination -->                        
                       		    <?php    if ($this->pagination->create_links()) {    
                       		     $tot_page = ceil($total_rows / $limit);              
                       		      $cur_page = ceil($offset / $limit) + 1;  ?>                            
                       		      <div class="text-right data_right">                 
                       		       <div id="example2_paginate" class="dataTables_paginate paging_simple_numbers">

                       		         <?php echo $this->pagination->create_links(); ?>   </div>                           
                       		          </div>                        
                       		          <?php } ?>                   
                       		           </div>
                       		           <!-- /row -->                
                       		           </section><! --/wrapper -->            
                       		           </section> 
                       		           <!-- /MAIN CONTENT -->            
                       		           <!--main content end-->            
                       		           <?php echo $footer; ?>        
                       		           </section>        
                       		           <!-- js placed at the end of the document so the pages load faster -->        
    <script src="<?php echo base_url('admin/assets/js/jquery.js') ?>"></script>        
    <script src="<?php echo base_url('admin/assets/js/bootstrap.min.js') ?>"></script> <script class="include" type="text/javascript" src="<?php echo base_url('assets/js/jquery.dcjqaccordion.2.7.js') ?>"></script>        
    <script src="<?php echo base_url('admin/assets/js/jquery.scrollTo.min.js') ?>"></script> <script src="<?php echo base_url('admin/assets/js/jquery.nicescroll.js') ?>" type="text/javascript"></script>        
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