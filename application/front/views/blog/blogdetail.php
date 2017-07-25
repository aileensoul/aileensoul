<!DOCTYPE html>
<html>
<head>
    <title></title>
     <link rel="icon" href="<?php echo base_url('images/favicon.png'); ?>">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/blog.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/common-style.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">

<!-- This Css is used for call popup -->
<link rel="stylesheet" href="<?php echo base_url() ?>css/jquery.fancybox.css" />

</head>
<body class="blog">
 <header class="">
        <div class="header animated fadeInDownBig">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5 col-xs-5 mob-zindex">
                        <!-- <div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('images/logo-white.png'); ?>"></a></div> -->
                        <div class="logo">
                            <a tabindex="-200" href="<?php echo base_url(); ?>"> <h2  style="color: white;">Aileensoul</h2></a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-xs-7 header-left-menu">
                        <div class="main-menu-right">
                            <ul class="">
                            <!-- <li><a class=" action-button shadow animate" href="<?php echo base_url('dashboard') ?>"><img class="h-img" src="img/header_icon_menu.png"></a></li>
                            <li> <a class="action-button shadow animate" href="#" id="InboxLink" onclick = "return getmsgNotification()"><em class="hidden-xs"> </em><img class="h-img" src="img/header_icon_notification.png">
                                        <span id="message_count"></span>
                                    </a></li>
                            <li> </li> -->
                            </ul>
                         </div>
                     </div>
               </div>
           </div>
       </div>
  </header>


  <header >
         <div class="blog_header">
          <div class="container">
            <div class="row"> 
            <div class="col-md-4 col-sm-5 col-xs-3 mob-zindex">
                        <!-- <div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('images/logo-white.png'); ?>"></a></div> -->
                        <div class="logo pl20">
                           <a href="<?php echo base_url('blog/'); ?>"><h3  style="color: #1b8ab9;">Blog</h3></a>
                        </div>
                    </div>
                      <div class="col-md-8 col-sm-7 col-xs-7 header-left-menu">
                        <div class="main-menu-right">
                            <ul class="">
                            <li><a href="<?php echo base_url('blog/');?>">Recent Post </a></li>
                            <li> <a href="<?php echo base_url('blog/index/popular');?>">Most Popular</a></li>
                            </ul>
                         </div>
                     </div>
            </div>
            
          </div>
          
         </div>
  </header>
<section>

<section>
<div class="blog-mid-section user-midd-section">
  <div class="container">
    <div class="row">
    
<div class="blog_post_outer col-md-9 col-sm-8 pr0">
    <div class="date_blog_right2">
     <div class="blog_post_main">
      <div class="blog_inside_post_main">
        <div class="blog_main_post_first_part">
        <div class="blog_main_post_img">

          <img src="<?php echo base_url($this->config->item('blog_main_upload_path')  . $blog_detail[0]['image']) ?>" >

        </div>
        </div>
        <div class="blog_main_post_second_part">
        <div class="blog_class_main_name">
          <span>
              <?php echo $blog_detail[0]['title'];?>
          </span>
        </div>
        <div class="blog_class_main_by">

        </div>
        <div class="blog_class_main_desc">
          <span>
             <?php echo $blog_detail[0]['description'];?>
          </span>
        </div>
        <div class="blog_class_main_social">
          <div class="left_blog_icon fl">
          <ul class="social_icon_bloag fl">
         <li>
            
          <!--  <a href="" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $blog_detail[0]['title'];?>&amp;p[url]=<?php echo base_url(); ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"></a> -->
             <!--  <a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $blog_detail[0]['title'];?>&amp;p[url]=<?php echo base_url(); ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_blank"><span  class="social_fb"></span></a> -->
              <!--  <a href="" onClick="window.open('http://www.facebook.com/sharer.php?u=http://localhost/aileensoul/blog/blogdetail/8');" target="_parent" href="javascript: void(0)"><span  class="social_fb"></span></a> -->

               <?php

//$title=urlencode("My Name Is Ankit");
               //echo $blog_detail[0]['title'];
$title=urlencode('"'.$blog_detail[0]['title'].'"');
//$url=urlencode("https://www.aileensoul.com/blog/blogdetail/8");
$url=urlencode(base_url('blog/blogdetail/'.$blog_detail[0]['blog_slug']));
//echo $url;
$summary=urlencode('"'.$blog_detail[0]['description'].'"');
$image=urlencode(base_url($this->config->item('blog_main_upload_path')  . $blog_detail[0]['image']));
//echo $image;
?>
<a onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=620,height=280');" href="javascript: void(0)"> 

<span  class="social_fb"></span>
</a>


            </li>
            <li>
              
                  <a href=""><span  class="social_gp"></span></a>
              
            </li>
            <li>
                
                <a href=""><span  class="social_lk"></span></a>
              
            </li>
            <li>
            
                <a href=""><span class="social_tw"></span></a>
            
            </li>

 <!--   <li>
            
                <a href=""><i class="fa fa-share-alt" aria-hidden="true"></i>Share
</a>
              
            </li>
            -->

          </ul>
            
          </div>
          <div class="fr blog_view_link2">

           <?php 
                if(count($blog_all) != 0)
                {                
                    
                    foreach ($blog_all as $key => $blog) 
                    {
                      
                      if($blog['id'] == $blog_detail[0]['id'] && ($key+1) != 1)
                      {
                         
                     
                  ?>
                         <a href="<?php echo base_url('blog/blogdetail/'.$blog_all[$key-1]['blog_slug']);?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>

                      
                  <?php
                      }
                }
                    
              }

                ?>
           
            <span>

            <?php 
                if(count($blog_all) != 0)
                {                
                    
                    foreach ($blog_all as $key => $blog) 
                    {
        
                      if($blog['id'] == $blog_detail[0]['id'])
                      {
                         echo $key+1; echo '/'; echo count($blog_all);
                      }
                }
                    
              }
                ?>
                      

            </span>
             <?php 
                if(count($blog_all) != 0)
                {                
                    
                    foreach ($blog_all as $key => $blog) 
                    {

                      if($blog['id'] == $blog_detail[0]['id'] && ($key+1) != count($blog_all))
                      {
                         
                     
                  ?>
                         <a href="<?php echo base_url('blog/blogdetail/'.$blog_all[$key+1]['blog_slug']);?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                  <?php
                      }
                }
                    
              }

                ?>
           
          </div>
        </div>

<?php

 //FOR GETTING USER COMMENT
  $condition_array = array('status' => 'approve','blog_id' => $blog_detail[0]['id']);
  $blog_comment  = $this->common->select_data_by_condition('blog_comment', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());

  
    foreach ($blog_comment as $comment) 
    {
  ?>  
    <div class="all-comments">
      <ul>
        <li class="comment-list">

 
          <div class="c-user-img">
             <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
          </div>
          <div class="c-user-comments"> 
            <h5><?php echo $comment['name']; ?></h5>
            <p><?php echo $comment['message']; ?></p>
            <p class="pt5"><span class="comment-time">
             <?php 
                   $date = new DateTime($comment['comment_date']);
                    echo $date->format('d').PHP_EOL;
                    echo "-";

                    $date = new DateTime($comment['comment_date']);
                    echo $date->format('M').PHP_EOL;
                    echo "-";

                    $date = new DateTime($comment['comment_date']);
                    echo $date->format('Y').PHP_EOL;
            ?>
              
            </span></p>
  
          </div>
          </li>
      </ul>
    </div>
<?php
        }//for loop end
?>
        </div>
    
      </div>


     </div>
     </div>
     <div class="comment_box">
     <h3>Give Comment</h3>


  <form role="form" name="comment" id="comment" method="post" action="" autocomplete="off">
       <fieldset class="full-width comment_foem">
         <label>Name </label>
       <input type="text" name="name" id="name" placeholder="Enter your name">
       </fieldset>
         <fieldset class="full-width comment_foem">
         <label>Email Address </label>
       <input type="text" name="email" id="email" placeholder="Enter your email address">
       </fieldset>
         
         <fieldset class="full-width comment_foem">
         <label>Message </label>
      <textarea name="message" id="message" placeholder="Enter Your message"></textarea>
       </fieldset>
       <input type="hidden" value="<?php echo $blog_detail[0]['id']; ?>" name="blog_id" id="blog_id">
       <fieldset class="comment_foem">
       <!-- onclick="comment_insert('<?php //echo $blog_detail[0]['id']; ?>')"-->
       <!-- <input type="button" value="Send a Comment"> -->
       <button>Send a Comment</button>
       </fieldset>
   </form>
      </div>
    

</div>
     <div class="col-md-3 col-sm-4 hidden-xs">
      <div class="blog_latest_post " >
        <h3>Latest Post</h3>

    <?php
          foreach($blog_last as $blog)
          {
      ?>

      <div class="latest_post_posts">
        <ul>
          <li> 
          <div class="post_inside_data">
          <div class="post_latest_left">
            <div class="lateaqt_post_img">

             <a href="<?php echo base_url('blog/blogdetail/'.$blog['blog_slug'])?>"> <img src="<?php echo base_url($this->config->item('blog_main_upload_path')  . $blog['image']) ?>" ></a>

            </div>
          </div>  
            <div class="post_latest_right">
            <div class="desc_post">
               <a href="<?php echo base_url('blog/blogdetail/'.$blog['blog_slug'])?>"><span class="rifght_fname"> <?php echo $blog['title'];?> </span></a>
            </div>
          
            <div class="desc_post">
              <span class="rifght_desc"> <?php echo $blog['description'];?>  </span>
            </div>  
            </div>

          </div>

          </li>
          <li></li>
        </ul>
      </div>  <!--latest_post_posts end -->
      <?php
          }//for loop end
      ?>
      </div><!--blog_latest_post end -->

      <div class="popular_tag">
      <h4>Popular Tag</h4>
      <div class="tag_name">
        <span><?php echo $this->db->get_where('blog_tag', array('id' => $blog_detail[0]['tag_id']))->row()->name; ?></span>
      </div>


       </div>

     </div>

     </div>
  </div>
</div>  
</section>

  </section>


</body>
</html>

<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<script type="text/javascript">
   $(document).ready(function () {



    $("#comment").validate({
        rules: {
            name: {
                required: true,
              
            },
            email: {
                required: true,
                email:true,
              
            },
            message: {
                required: true,
              
            },
          
        },
        messages: {
            name: {
                required: "Please enter a name",
               
            },
             email: {
                required: "Please enter a email",
               
            },
             message: {
                required: "Please enter a message",
               
            },
            
        },


      });

    //It prevent page automatically refresh
    $("#comment").submit(function(e) {
        e.preventDefault();
        if( $(this).valid() ) 
        {
          var blog_id=document.getElementById("blog_id").value;
          var name=document.getElementById("name").value;
          var email=document.getElementById("email").value;
          var message=document.getElementById("message").value;

          $.ajax({
           type: 'POST',
           url: '<?php echo base_url()."blog/comment_insert" ?>',
           data: 'blog_id=' +blog_id+ '&name=' +name+ '&email=' + email+ '&message=' + message,         

           success: function (data) {
               if (data == 1) 
               {
                  $.fancybox.open('<div class="message"><h2>Thank you for your valuable feedback</h2></div>');
                  $('#name').val(''); 
                  $('#email').val(''); 
                  $('#message').val(''); 
               }
             
           }
          });
        }
                
});

  });
  </script>
<script type="text/javascript">
     

</script>

<!-- This Js is used for call popup -->
<script src="<?php echo base_url('js/jquery.fancybox.js'); ?>"></script>