

<!-- start head -->
<?php echo $head; ?>
<!-- END HEAD -->

<!-- start header -->
<?php echo $header; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css') ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/test.css'); ?>">


<?php if ($freepostdata[0]['user_id'] && $freepostdata[0]['free_post_step'] == '7'){ 
     echo $freelancer_post_header2_border; } ?>

<!-- END HEADER -->
<div class="js">
<body>
<div id="preloader"></div>
    <section>
        <div class="user-midd-section" id="paddingtop_fixed">
          <div class="common-form1">
             <div class="col-md-3 col-sm-4"></div>
                      

<?php 

             $userid = $this->session->userdata('aileenuser');

             $contition_array = array('user_id' => $userid, 'status' => '1');
             $freepostdata = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
             
             if($freepostdata[0]['free_post_step'] == 7){  ?>

 <div class="col-md-6 col-sm-8"><h3>You are updating your Freelancer Profile.</h3></div>
                <?php }else{

             ?>
                      <div class="col-md-6 col-sm-8"><h3>You are making your Freelancer Profile.</h3></div>
         <?php }?>

            </div>
            <br>
            <br>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">

                            <ul  class="left-form-each">
                                <li <?php if ($this->uri->segment(1) == 'freelancer') { ?> class="active init" <?php } ?>><a href="#">Basic Information</a></li>

                                <li class="custom-none  <?php if ($freepostdata[0]['free_post_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_address_information'); ?>">Address Information</a></li>

                                <li class="custom-none  <?php if ($freepostdata[0]['free_post_step'] < '2') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_professional_information'); ?>">Professional Information</a></li>

                                <li class="custom-none  <?php if ($freepostdata[0]['free_post_step'] < '3') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_rate'); ?>">Rate</a></li>

                                <li class="custom-none  <?php if ($freepostdata[0]['free_post_step'] < '4') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_avability'); ?>">Add Your Avability</a></li>

                                <li class="custom-none  <?php if ($freepostdata[0]['free_post_step'] < '5') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer/freelancer_post_education'); ?>"> Education</a></li>		    
                                <li class="custom-none  <?php if ($freepostdata[0]['free_post_step'] < '6') {
                                echo "khyati";
                            } ?>"><a href="<?php echo base_url('freelancer/freelancer_post_portfolio'); ?>">Portfolio</a></li>
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
}
?>
                        </div>
                        <div class="common-form common-form_border">
                            <h3>Basic Information</h3>

<?php echo form_open(base_url('freelancer/freelancer_post_basic_information_insert'), array('id' => 'freelancer_post_basicinfo', 'name' => 'freelancer_post_basicinfo', 'class' => 'clearfix')); ?>
                           <!--  <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span class="red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div> -->

<?php
$fullname = form_error('fullname');
$lastname = form_error('lastname');
//$skypeid =  form_error('skypeid');
$email = form_error('email');
$phoneno = form_error('phoneno');
?>

                            <fieldset <?php if ($firstname) { ?> class="error-msg" <?php } ?>>
                                <label>Full name:<span class="red">*</span></label>
                                <input tabindex="1" autofocus type="text" name="firstname" placeholder="Enter full name" value="<?php if ($firstname1) {
    echo $firstname1;
} else {
    echo $userdata[0]['first_name'];
} ?>" onfocus="var temp_value=this.value; this.value=''; this.value=temp_value">
<?php echo form_error('firstname'); ?>
                            </fieldset>

                            <fieldset <?php if ($lastname) { ?> class="error-msg" <?php } ?>>
                                <label>Last name:<span class="red">*</span></label>
                                <input type="text" name="lastname" tabindex="2" id="lastname" placeholder="Enter last name" value="<?php if ($lastname1) {
    echo $lastname1;
} else {
    echo $userdata[0]['last_name'];
} ?>">
<?php echo form_error('lastname'); ?>
                            </fieldset>

                            <fieldset <?php if ($email) { ?> class="error-msg" <?php } ?>>
                                <label>Email:<span class="red">*</span></label>
                                <input type="text" name="email" id="email" tabindex="3" placeholder="Enter email address" value="<?php if ($email1) {
    echo $email1;
} else {
    echo $userdata[0]['user_email'];
} ?>">
<?php echo form_error('email'); ?>
                            </fieldset>

                            <fieldset>
                                <label>Skype id:</label>
                                <input type="text" name="skypeid" placeholder="Enter skype id" tabindex="4" value="<?php if ($skypeid1) {
    echo $skypeid1;
} ?>">
        <?php ?>
                            </fieldset>

                            <fieldset <?php if ($phoneno) { ?> class="error-msg " <?php } ?> class="full-width">
                                <label>Phone number:</label>
                                <input type="text" name="phoneno" id="phoneno" tabindex="5" placeholder="Enter phone number" value="<?php if ($phoneno1) {
            echo $phoneno1;
        } ?>">
<?php echo form_error('phoneno'); ?>
                            </fieldset>

                            <fieldset class="hs-submit full-width">

                                <!--<input type="reset">-->
                                <input type="submit"  id="next" name="next" value="Next" tabindex="6">



                            </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>

<?php echo $footer; ?>
    </footer>
</body>
</div>
</html>
 <script src="<?php echo base_url('js/jquery.wallform.js'); ?>"></script>
   <script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
   
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<script>
    //SCRIPT FOR AUTOFILL OF SEARCH KEYWORD START
 var base_url = '<?php echo base_url(); ?>';
    $(function() {
        function split( val ) {
            return val.split( /,\s*/ );
        }
        function extractLast( term ) { 
            return split( term ).pop();
        }
        $( ".skill_keyword" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
           
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON(base_url + "freelancer/freelancer_hire_search_keyword", { term : extractLast( request.term )},response);
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
        $( ".skill_place" ).bind( "keydown", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).autocomplete( "instance" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 2,
            source: function( request, response ) { 
                // delegate back to autocomplete, but extract the last term
                $.getJSON(base_url + "freelancer/freelancer_search_city", { term : extractLast( request.term )},response);
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

//SCRIPT FOR CITY AUTOFILL OF SEARCH END




    </script>
 
<!-- <script>
                    
                    //select2 autocomplete start for Location
                    $('#searchplace').select2({
                        placeholder: 'Find Your Location',
                        maximumSelectionLength: 1,
                        ajax: {
                            url: "<?php echo base_url(); ?>freelancer/location",
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                    //alert(data);
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });
                    //select2 autocomplete End for Location
                </script> -->

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
$.validator.addMethod("regx1", function(value, element, regexpr) {          
    if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }  
}, "Enter a number between 8 to 15 digit");


    $(document).ready(function () {

        $("#freelancer_post_basicinfo").validate({

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
                        url: "<?php echo site_url() . 'freelancer/check_email' ?>",
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

                            
                           regx1:/^[0-9\-\+]{9,15}$/,
                            
                        },
               

            },
            
            messages: {

                firstname: {

                    required: "First name is required.",

                },

                lastname: {

                    required: "Last name is required.",

                },

                email: {
                    required: "Email id is required.",
                    email: "Please enter valid email id.",
                    remote: "Email already exists."
                },

                phoneno:{
                    minlength:"Minimum length 8 digit",
                    maxlength:"Maximum length 15 digit"

                }

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
  <script type="text/javascript">
            function checkvalue() {
            
            var searchkeyword = $.trim(document.getElementById('tags').value);
            var searchplace = $.trim(document.getElementById('searchplace').value);
            // alert(searchke                                    yword);
            // alert(search                                    place);
            if (searchkeyword == "" && searchplace == "") {
            //alert('Please enter Key                                        word');
            return  false;
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
                    