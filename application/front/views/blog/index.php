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
                          <!--   <li><a class=" action-button shadow animate" href="<?php echo base_url('dashboard') ?>"><img class="h-img" src="img/header_icon_menu.png"></a></li>
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
                        <?php if($this->input->get('search_blog_post') || $this->uri->segment(3) == 'popular')
                        {
                        ?>
                           <a href="<?php echo base_url('blog/'); ?>"> <h3  style="color: #1b8ab9;">Blog</h3></a>
                        <?php
                        }
                        else
                        {
                        ?>
                            <a href="javascript:void(0)"> <h3  style="color: #1b8ab9;">Blog</h3></a>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                      <div class="col-md-8 col-sm-7 col-xs-7 header-left-menu">
                        <div class="main-menu-right">
                            <ul class="">
                            <li>
                                <?php if($this->input->get('search_blog_post') || $this->uri->segment(3) == 'popular')
                                {
                                ?>
                                    <a href="<?php echo base_url('blog/');?>">Recent Post </a>
                                 <?php
                                }
                                else
                                {
                                ?>
                                     <a href="javascript:void(0)">Recent Post </a>
                              <?php
                                }
                                ?>
                            </li>
                            <li>
                                <?php if($this->uri->segment(3) == 'popular')
                                {
                                ?>
                                    <a href="javascript:void(0)">Most Popular</a>
                                 <?php
                                }
                                else
                                {
                                ?>
                                     <a href="<?php echo base_url('blog/index/popular');?>">Most Popular</a>
                              <?php
                                }
                                ?>

                            </li>
                            </ul>
                         </div>
                     </div>
            </div>
            
          </div>
          
         </div>
  </header>
<section>
<div class="col-md-12 hidden-md hidden-lg pt20">
      <div class="blog_search">
      
        <div>
          <div class="searc_w"><input type="" name="" placeholder="Search Blog Post"></div>
          <div class="butn_w"><a href=""><i class="fa fa-search" aria-hidden="true"></i>
</a></div>
        </div>
      </div>
      </div>

<div class="blog-mid-section user-midd-section">
  <div class="container">
    <div class="row">


    
<div class="blog_post_outer col-md-9 col-sm-8 pr0">
<?php

if($this->input->get('search_blog_post'))
      {
          echo "Search results for '$search_keyword' ";
          
      }//if end  

if(count($blog_detail) == 0 )
{
  echo "<br>";
  if($this->input->get('search_blog_post'))
  {
      echo "Oops No Data Found !";
  }
  if($this->uri->segment(3) == 'popular')
  {
     echo "Not Any Popular Blog";
  }
}//if end
else
{
       
      foreach ($blog_detail as $blog) 
      {
?>
<div class="blog_main_o">
    <div class="date_blog_left">
      <div class="blog-date-change">
        <div class="blog-month blog-picker">
          <span class="blog_monthd">

            <?php 
                   $date_time = new DateTime($blog['created_date']);
                    $month= $date_time->format('M').PHP_EOL;
                    echo $month;
            ?>
          </span>
        </div class="blog-date blog-picker">
        <div>
          <span class="blog_mdate">
          <?php 
                   $date = new DateTime($blog['created_date']);
                    echo $date->format('d').PHP_EOL;
            ?>
          </span>
        </div>
        <div class="blog-year blog-picker">
          <span class="blog_moyear" >
            <?php 
                   $year = new DateTime($blog['created_date']);
                    echo $year->format('Y').PHP_EOL;
            ?>
          </span>
        </div>
      </div>
      <div class="blog-left-comment">
        <div class="blog-comment-count">
          <a>
          <?php 
                  $condition_array = array('status' => 'approve','blog_id'=>$blog['id']);
                  $blog_comment = $this->common->select_data_by_condition('blog_comment', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit=5, $offset, $join_str = array());
                  echo count($blog_comment);?>
          </a>
        </div>
        <div class="blog-comment">
          <a>Comments</a>
        </div>
        
      </div>
    </div>
    

    <div class="date_blog_right">
     <div class="blog_post_main">
      <div class="blog_inside_post_main">
        <div class="blog_main_post_first_part">
        <div class="blog_main_post_img">

         <a href="<?php echo base_url('blog/blogdetail/'.$blog['blog_slug'])?>"> <img src="<?php echo base_url($this->config->item('blog_main_upload_path')  . $blog['image']) ?>" ></a>

        </div>
        </div>
        <div class="blog_main_post_second_part">
        <div class="blog_class_main_name">
          <span>
             <a href="<?php echo base_url('blog/blogdetail/'.$blog['blog_slug'])?>"><?php echo $blog['title'];?></a>
          </span>
        </div>
        <div class="blog_class_main_by">
          <span>
          
          </span>
          
        </div>
        <div class="blog_class_main_desc">
          <span>
           <?php echo $blog['description'];?>
          </span>
        </div>
        <div class="blog_class_main_social">
          <div class="left_blog_icon fl">
          <ul class="social_icon_bloag fl">
            <li>
            
                <a href=""><span  class="social_fb"></span></a>
              
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


          </ul>
            
          </div>

          <div class="fr blog_view_link">

            <a onclick="read_more('<?php echo $blog['id']; ?>','<?php echo $blog['blog_slug']; ?>')"> Read more <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
</a>
          </div>
        </div>
        </div>
      </div>


     </div>
     </div>
     </div>
  
<?php
      }//for loop end
}//else end
?>
</div>

     <div class="col-md-3 col-sm-4 hidden-xs">
      <div class="blog_search">
        <h6> Blog Search </h6>
        <div>

 <!-- <?php //echo form_open(base_url('blog/index/search'), array('id' => 'blog_search', 'name' => 'blog_search', 'class' => 'clearfix')); ?>  -->
  <form action=<?php echo base_url('blog/')?> method="get" autocomplete="off"> 
          <div class="searc_w"><input type="text" name="search_blog_post" id="search_blog_post" placeholder="Search Blog Post"></div>
         <button type="submit" class="butn_w" onclick="return checkvalue();"><i class="fa fa-search"></i></button> 
        <!-- <div class="butn_w"><a href=""><i class="fa fa-search" aria-hidden="true"></i>
</a></div> -->
<?php echo form_close(); ?>
        </div>
      </div>
      <div class="blog_latest_post">
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
              <a href="<?php echo base_url('blog/blogdetail/'.$blog['blog_slug'])?>"> <span class="rifght_fname"> <?php echo $blog['title'];?> </span></a>
            </div>
          
            <div class="desc_post">
              <span class="rifght_desc"> <?php echo $blog['description'];?> </span>
            </div>  
            </div>

          </div>

          </li>
        
        </ul>
      </div><!--latest_post_posts end -->
    <?php
          }//for loop end
    ?>
     
      </div><!--blog_latest_post end -->
     </div>

     </div>
  </div>
</div>  
</section>


</body>
</html>

<script type="text/javascript">
     
function read_more(blog_id,slug) {
       $.ajax({
           type: 'POST',
           url: '<?php echo base_url()."blog/read_more" ?>',
           data: 'blog_id=' + blog_id,         
           // dataType: "html",
           success: function (data) {
               if (data == 1) 
               {
                  window.location= "<?php echo base_url() ?>blog/blogdetail/" + slug;
                   //redirect('blog/blogdetail');
               }
             
           }
       });
   }
</script>

<!-- FOR SEARCH VALIDATION FOR EMAPTY SEARCH START -->
<script type="text/javascript">
   function checkvalue() 
   {
     
       var searchkeyword = $.trim(document.getElementById('search_blog_post').value);
     
       if (searchkeyword == "") 
       {
           return false;
       }
   }
   
</script>
<!-- FOR SEARCH VALIDATION FOR EMAPTY SEARCH END -->

<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
