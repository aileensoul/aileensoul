<!--start head -->
<?php  echo $head; ?>
    <!-- END HEAD -->
    <!-- start header -->
<?php echo $header; ?>
    <script src="<?php echo base_url('js/fb_login.js'); ?>"></script>

<?php if($artdata[0]['art_step'] == 4){?>
    <?php echo $art_header2_border; }?>
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">
    <!-- END HEADER -->
    <div class="js">
    <body class="page-container-bg-solid page-boxed">
    <div id="preloader"></div>


      <section>
        
        <div class="user-midd-section" id="paddingtop_fixed">
           <div class="common-form1">
           <div class="row">
             <div class="col-md-3 col-sm-4"></div>


             <?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $artdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($artdata[0]['art_step'] == 4){ ?>

 <div class="col-md-6 col-sm-8"><h3>You are updating your Artistic Profile.</h3></div>
                <?php }else{

             ?>

                      <div class="col-md-6 col-sm-8"><h3>You are making your Artistic Profile.</h3></div>

                       <?php }?>
            </div>
            </div>
         
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <div class="left-side-bar">
                            <ul class="left-form-each">
                                <li <?php if($this->uri->segment(1) == 'artistic'){?> class="active init" <?php } ?>><a href="#">Basic Information</a></li>

                                <li class="custom-none <?php if($artdata[0]['art_step'] < '1'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_address'); ?>">Address</a></li>

                                <li class="custom-none <?php if($artdata[0]['art_step'] < '2'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_information'); ?>">Art Information</a></li>

                                <li class="custom-none <?php if($artdata[0]['art_step'] < '3'){echo "khyati";}?>"><a href="<?php echo base_url('artistic/art_portfolio'); ?>">Portfolio</a></li>

                            </ul>
                        </div>
                    </div>

                    <!-- middle section start -->
 
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

                        <div class="common-form common-form common-form_border clearfix">
                         <h3>
                            Basic Information
                        </h3>
                        
                            <?php echo form_open(base_url('artistic/art_basic_information_insert'), array('id' => 'artbasicinfo','name' => 'artbasicinfo', 'class' => 'clearfix')); ?>
                             <!--  <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>
 -->

                                <?php
                                 $firstname =  form_error('firstname');
                                 $lastname = form_error('lastname');
                                 $email =  form_error('email');
                                 $phoneno =  form_error('phoneno');
                                 
                         		?>

                                <fieldset <?php if($firstname) {  ?> class="error-msg" <?php } ?>>
                                    <label>First Name:<span style="color:red">*</span></label>
                                    <input name="firstname" tabindex="1" autofocus type="text" id="firstname" placeholder="Enter First Name" value="<?php if($firstname1){ echo $firstname1; } else { echo $art[0]['first_name']; }?>"/>
                                    <?php echo form_error('firstname'); ?>
                                </fieldset>
                                

                                <fieldset <?php if($lastname) {  ?> class="error-msg" <?php } ?>>
                                    <label>Last Name:<span style="color:red">*</span></label>
                                    <input name="lastname" type="text" id="lastname" tabindex="2" placeholder="Enter Last Name" value="<?php if($lastname1){ echo $lastname1; } else { echo $art[0]['last_name']; } ?>"/>
                                    <?php echo form_error('lastname'); ?>
                                </fieldset>

                                <fieldset <?php if($email) {  ?> class="error-msg" <?php } ?>>

                                <?php $user_email = strtolower($art[0]['user_email']); ?>
                                    <label>E-mail address:<span style="color:red">*</span></label>
                                    <input name="email"  type="text" id="email" tabindex="3" placeholder="Enter E-mail address" value="<?php if($email1){ echo $email1; } else { echo $user_email; } ?>">
                                     <?php echo form_error('email'); ?>
                                </fieldset>
                               

                                <fieldset <?php if($phoneno) {  ?> class="error-msg" <?php } ?>>
                                    <label>Phone number:</label>
                                    <input name="phoneno"  type="text" id="phoneno" tabindex="4" placeholder="Enter Phone number" value="<?php if($phoneno1){ echo $phoneno1; } ?>">
                                    <?php echo form_error('phoneno'); ?><br/>
                                </fieldset>
                                

                                <fieldset class="hs-submit full-width">
                                 
                                    <input type="submit"  id="next" name="next" value="Next" tabindex="5">
                                    
                                </fieldset>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
   <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <!-- footer start -->
   

</div>
 <footer>
        
        <?php echo $footer;  ?>
    </footer>
    

  <script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
  
  <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
  <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
  <!-- SCRIPT FOR AUTOFILL OF SEARCH KEYWORD START -->

                    <script type="text/javascript">
                      var base_url = '<?php echo base_url(); ?>';
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        $( "#tags" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
           
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON(base_url + "artistic/artistic_search_keyword", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 1) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( "" );
                    return false;
                }else{
                   
                    var last = terms.pop();
                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                    $(this).effect("highlight", {}, 1000);
                    $(this).attr("style","border: solid 1px red;");
                    return false;
                }
            }
        });
    });

//SCRIPT FOR AUTOFILL OF SEARCH KEYWORD END


//SCRIPT FOR CITY AUTOFILL OF SEARCH START

    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        $( "#searchplace" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON(base_url + "artistic/artistic_search_city", { term : extractLast( request.term )},response);
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event, ui ) {
               
                var terms = split( this.value );
                if(terms.length <= 1) {
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( "" );
                    return false;
                }else{
                    var last = terms.pop();
                    $(this).val(this.value.substr(0, this.value.length - last.length - 2)); // removes text from input
                    $(this).effect("highlight", {}, 1000);
                    $(this).attr("style","border: solid 1px red;");
                    return false;
                }
            }
        });
    });
</script>
<!-- SCRIPT FOR CITY AUTOFILL OF SEARCH END -->

<script type="text/javascript">
                        function checkvalue() {
                            //alert("hi");
                            var searchkeyword =$.trim(document.getElementById('tags').value;
                            var searchplace = $.trim(document.getElementById('searchplace').value);
                            // alert(searchkeyword);
                            // alert(searchplace);
                            if (searchkeyword == "" && searchplace == "") {
                                //alert('Please enter Keyword');
                                return false;
                            }
                        }
                    </script>
<script type="text/javascript">
                        function check() {
                            var keyword = $.trim(document.getElementById('tags1').value);
                            var place = $.trim(document.getElementById('searchplace1').value);
                            if (keyword == "" && place == "") {
                                return false;
                            }
                        }
                    </script>

<!-- <script>
//select2 autocomplete start for skill
                                                $('#searchskills').select2({

                                                    placeholder: 'Find Your Skills',

                                                    ajax: {

                                                        url: "<?php echo base_url(); ?>artistic/keyskill",
                                                        dataType: 'json',
                                                        delay: 250,

                                                        processResults: function (data) {

                                                            return {

                                                                results: data


                                                            };

                                                        },
                                                        cache: true
                                                    }
                                                });
//select2 autocomplete End for skill

//select2 autocomplete start for Location
                                                $('#searchplace').select2({

                                                    placeholder: 'Find Your Location',
                                                    maximumSelectionLength: 1,
                                                    ajax: {

                                                        url: "<?php echo base_url(); ?>artistic/location",
                                                        dataType: 'json',
                                                        delay: 250,

                                                        processResults: function (data) {

                                                            return {

                                                                results: data


                                                            };

                                                        },
                                                        cache: true
                                                    }
                                                });
//select2 autocomplete End for Location


</script> -->

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>




<script type="text/javascript">

            //validation for edit email formate form


 jQuery.validator.addMethod("noSpace", function(value, element) { 
      return value == '' || value.trim().length != 0;  
    }, "No space please and don't leave it empty");


 $.validator.addMethod("regx", function(value, element, regexpr) {          
    if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }
}, "Number, space and special character are not allowed");


            $(document).ready(function () { 

                $("#artbasicinfo").validate({

                    rules: {

                        firstname: {

                            required: true,
                            regx:/^[^-\s][a-zA-Z_\s-]+$/,
                            //noSpace: true
                        },


                        lastname: {

                            required: true,
                            regx:/^[^-\s][a-zA-Z_\s-]+$/,
                            //noSpace: true
                        },


                        email: {
                            required: true,
                            email: true,
                            remote: {
                                url: "<?php echo site_url() . 'artistic/check_email' ?>",
                                type: "post",
                                data: {
                                    email: function () {
                                        return $("#email").val();
                                    },
                                    '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                },
                            },
                        },

                        phoneno: {

                            number: true,
                             minlength: 8,
                           maxlength:15
                           
                            
                        },

                    },

                    messages: {

                        firstname: {

                            required: "First name Is Required.",
                            
                        },

                        lastname: {

                            required: "Last name Is Required.",
                            
                        },

                        email: {
                            required: "Email id is required",
                            email: "Please enter valid email id",
                            remote: "Email already exists"
                        },
                        
                    },

                });
                   });
  </script>

 <script type="text/javascript"> 
 $(".alert").delay(3200).fadeOut(300);
</script>
<script type="text/javascript">
  jQuery(document).ready(function($) {  

// site preloader -- also uncomment the div in the header and the css style for #preloader
$(window).load(function(){
  $('#preloader').fadeOut('slow',function(){$(this).remove();});
});
});
</script>


<!-- script for cursor pointer -->

<script>
$(document).ready(function () {
var input = $("#firstname");
var len = input.val().length;
input[0].focus();
input[0].setSelectionRange(len, len);
 });
 </script>

</body>
</html>