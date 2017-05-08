<!-- HEAD Start -->

<?php echo $head; ?>
<!-- END HEAD -->
<!-- start header -->



<?php echo $header; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/timeline.css'); ?>">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

<!-- pallavi code start 15-4 -->

<?php if ($freehiredata[0]['user_id'] && $freehiredata[0]['free_hire_step'] == '3'){ 
     echo $freelancer_hire_header2; } ?>
<!-- pallavi code end 15-4 -->
<body>
    <header>

    </header>
    <section>

        <div class="user-midd-section" id="paddingtop_fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div class="left-side-bar">
                            <ul>
                                <li <?php if ($this->uri->segment(1) == 'freelancer_hire') { ?> class="active" <?php } ?>><a href="#">Basic Information</a></li>

                                <li class="<?php if ($freehiredata[0]['free_hire_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer_hire/freelancer_hire_address_info'); ?>">Address Information</a></li>

                                <li class="<?php if ($freehiredata[0]['free_hire_step'] < '1') {
    echo "khyati";
} ?>"><a href="<?php echo base_url('freelancer_hire/freelancer_hire_professional_info'); ?>">Professional Information</a></li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">

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

                        <div class="common-form">
                            <h3>Basic Information</h3>

                            <?php echo form_open_multipart(base_url('freelancer_hire/freelancer_hire_basic_info_insert'), array('id' => 'basic_info', 'name' => 'basic_info', 'class' => 'clearfix')); ?>

                           <div>
                                   <span style="color:#7f7f7e;padding-left: 8px;">( </span><span style="color:red">*</span><span style="color:#7f7f7e"> )</span> <span style="color:#7f7f7e">Indicates required field</span>
                                </div>


                            <?php
                            $fname = form_error('fname');
                            $lname = form_error('lname');
                            $email = form_error('email');

                            $phone = form_error('phone');
                            ?>

                            <fieldset <?php if ($fname) { ?> class="error-msg" <?php } ?>>
                                <label>First Name:<span style="color:red">*</span></label>
                                <input type="text" name="fname" id="fname" placeholder="Enter First Name" value="<?php if ($firstname1) {
                                    echo $firstname1;
                                } else {
                                    echo $userdata[0]['first_name'];
                                } ?>">
<?php echo form_error('fname'); ?>
                            </fieldset>


                            <fieldset <?php if ($lname) { ?> class="error-msg" <?php } ?>>
                                <label>Last Name:<span style="color:red">*</span></label>
                                <input type="text" name="lname" id="lname" placeholder="Enter Last Name" value="<?php if ($lastname1) {
    echo $lastname1;
} else {
    echo $userdata[0]['last_name'];
} ?>">
<?php echo form_error('lname'); ?>
                            </fieldset>


                            <fieldset <?php if ($email) { ?> class="error-msg" <?php } ?>>
                                <label>Email:<span style="color:red">*</span></label>
                                <input type="text" name="email" id="email" placeholder="Enter Email" value="<?php if ($email1) {
    echo $email1;
} else {
    echo $userdata[0]['user_email'];
} ?>">
<?php echo form_error('email'); ?>
                            </fieldset>


                            <fieldset>
                                <label>Skype Id:</label>
                                <input type="text" name="skyupid" id="skyupid" placeholder="Enter SkypeId" value="<?php if ($skypeid1) {
    echo $skypeid1;
} ?>">

                            </fieldset>


                            <fieldset <?php if ($phone) { ?> class="error-msg" <?php } ?> class="full-width">
                                <label>Phone Number:<span style="color:red">*</span></label>
                                <input type="text" name="phone" id="phone" placeholder="Enter Phone Number" value="<?php if ($phoneno1) {
    echo $phoneno1;
} ?>">
        <?php echo form_error('phone'); ?>
                            </fieldset>


                            <fieldset class="hs-submit full-width">

                              
                                <input type="submit"  id="next" name="next" value="Next">


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
</html>



    <script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
   
<script type="text/javascript" src="<?php echo site_url('js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



<!-- pallavi changes 15-4 -->
 <script type="text/javascript">
                        function checkvalue() {
                            //alert("hi");
                            var searchkeyword = document.getElementById('tags').value;
                            var searchplace = document.getElementById('searchplace').value;
                            // alert(searchkeyword);
                            // alert(searchplace);
                            if (searchkeyword == "" && searchplace == "") {
                                //alert('Please enter Keyword');
                                return false;
                            }
                        }
                    </script>



 <script>

var data= <?php echo json_encode($demo); ?>;
// alert(data);

        
$(function() {
    // alert('hi');
$( "#tags" ).autocomplete({
     source: function( request, response ) {
         var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( request.term ), "i" );
         response( $.grep( data, function( item ){
             return matcher.test( item.label );
         }) );
   },
    minLength: 1,
    select: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
        $("#selected-tag").val(ui.item.label);
        // window.location.href = ui.item.value;
    }
    ,
    focus: function(event, ui) {
        event.preventDefault();
        $("#tags").val(ui.item.label);
    }
});
});
  
</script>

<script> 

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

                    </script>


<!-- pallavi end 15-4 -->
<script type="text/javascript">

    //validation for edit email formate form

    $(document).ready(function () {

        $("#basic_info").validate({

            rules: {

                fname: {

                    required: true,

                },

                lname: {

                    required: true,

                },

                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "<?php echo site_url() . 'freelancer_hire/check_email' ?>",
                        type: "post",
                        data: {
                            email: function () {
                                return $("#email").val();
                            },
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                        },
                    },
                },
            },

            messages: {

                fname: {

                    required: "First name Is Required.",

                },

                lname: {

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
