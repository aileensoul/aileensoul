<!-- start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
    
<?php echo $header; ?>
    <?php echo $recruiter_header2; ?>
    <!-- END HEADER -->
    <body class="page-container-bg-solid page-boxed">

      <section>
        
        <div class="user-midd-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul>
                                
                                <li><a href="<?php echo base_url('recruiter/rec_basic_information'); ?>">Basic information</a></li>
                             <li><a href="<?php echo base_url('recruiter/company_info_form'); ?>">Company information</a></li>
                             <li <?php if($this->uri->segment(1) == 'recruiter'){?> class="active" <?php } ?>><a href="#">Company address</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-8">

                     <div>
                        <?php
                                        if ($this->session->flashdata('error')) {
                                            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                        }
                                        if ($this->session->flashdata('success')) {
                                            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                                        }?>
                    </div>

                    <!--- middle section start -->
                      <div class="common-form">
                      <h3>Company address</h3>
                 <?php echo form_open(base_url('recruiter/comp_address_store'), array('id' => 'basicinfo','name' => 'basicinfo','class' => 'clearfix')); ?>

                   <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>


                    <?php
                         $country =  form_error('country');
                         $state =  form_error('state');
                         $city =  form_error('city');
                         $postal_address =  form_error('postal_address');
                         

                         ?>
                                
                    <fieldset <?php if($country) {  ?> class="error-msg" <?php } ?>>
                        <label>Country:<span style="color:red">*</span></label>
                                
                                        <select name="country" id="country">
                                        <option value="">Select Country</option>
                                         <?php
                                            if(count($countries) > 0){
                                                foreach($countries as $cnt){
                                          
                                            if($country1)
                                            {
                                              ?>
                                                 <option value="<?php echo $cnt['country_id']; ?>" <?php if($cnt['country_id']==$country1) echo 'selected';?>><?php echo $cnt['country_name'];?></option>
                                             
                                                <?php
                                                }
                                                else
                                                {
                                            ?>
                                                 <option value="<?php echo $cnt['country_id']; ?>"><?php echo $cnt['country_name'];?></option>
                                                  <?php
                                            
                                            }
       
                                            }}
                                            ?>
                                    </select><span id="country-error"></span>
                                 <?php echo form_error('country'); ?>
                    </fieldset>

                   <fieldset <?php if($state) {  ?> class="error-msg" <?php } ?>>
                        <label>state:<span style="color:red">*</span></label>
                        <select name="state" id="state">
                         <?php
                                          
                                            foreach($states as $cnt){
                                                if($state1)

                                            {
                                               
                                              ?>

                                                 <option value="<?php echo $cnt['state_id']; ?>" <?php if($cnt['state_id']==$state1) echo 'selected';?>><?php echo $cnt['state_name'];?></option>
                                              
                                                <?php
                                                }
                                              
                                                else
                                                {
                                            ?>
                                                 <option value="">Select country first</option>
                                                  <?php
                                            
                                            }}
                                            ?>
                                        
                        </select><span id="state-error"></span>
                        <?php echo form_error('state'); ?>
                 </fieldset>
                     

                      <fieldset <?php if($city) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label> City:</label>
                                    <select name="city" id="city">
                                     <?php
                                          foreach($cities as $cnt){
                                                if($city1)

                                            {
                                                 
                                              ?>

                                               <option value="<?php echo $cnt['city_id']; ?>" <?php if($cnt['city_id']==$city1) echo 'selected';?>><?php echo $cnt['city_name'];?></option>

                                                <?php
                                                }
                                              
                                                else
                                                {
                                            ?>
                                        <option value="">Select state first</option>

                                         <?php
                                            
                                            }}
                                            ?>
                                    </select><span id="city-error"></span>
                                    <?php echo form_error('city'); ?> 
                    </fieldset>
                    
                    <fieldset <?php if($postal_address) {  ?> class="error-msg" <?php } ?> class="full-width">
                        <label> Postal address:<span style="color:red">*</span></label>
                        <textarea name="postal_address" id="postal_address" rows="4" cols="50"  placeholder="Enter Address" style="resize: none;"><?php if($postal_address1){ echo $postal_address1; } ?></textarea>                        
                        <?php echo form_error('postal_address'); ?> 
                    </fieldset>

                    
                     <fieldset class="hs-submit full-width">
                                   

                                
                                   
                                    <input type="submit"  id="submit" name="submit" value="Submit">
                                    
                    </fieldset>

                  
            </div>
             </form>
                   
                    <!--- middle section end -->
                       
                       
                        
                       
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- BEGIN INNER FOOTER -->
    <?php echo $footer; ?>
    <!-- end footer -->
    <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>"></script>


     <!-- Field Validation Js start -->
<script src="<?php echo base_url('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<!-- Field Validation Js End -->


<!-- script for country,state,city start -->

<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){ 
        var countryID = $(this).val();
        //alert(countryID);
        if(countryID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "job_profile/ajax_data"; ?>',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url() . "job_profile/ajax_data"; ?>',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
<!-- script for country,state,city end -->


 <script type="text/javascript">

            //validation for edit email formate form

            $(document).ready(function () { 

                $("#basicinfo").validate({

                    rules: {

                        country: {

                            required: true,
                           
                        },

                        state: {

                            required: true,
                           
                        },
                       
                        
                       
                        postal_address:{
                            required:true,
                           
                       },

                        
                            
                    },

                    messages: {

                        country: {

                            required: "First name Is Required.",
                            
                        },

                        state: {

                            required: "Last name Is Required.",
                            
                        },

                       

                        postal_address: {

                            required: "Postal Address Is Required.",
                            
                        },

                        
                    },

                });
                   });


  </script>