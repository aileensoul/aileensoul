<!DOCTYPE html>

<html class="blog_cl">
 <head>
  <title>Official Aileensoul Blog</title>
   <link rel="icon" href="<?php echo base_url('images/favicon.png'); ?>">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<style type="text/css">
  footer > .container{border:1px solid transparent!important;}
  .footer{border:1px solid #d9d9d9;}
</style>

<?php
  foreach ($blog_detail as $blog) 
      {
?>
 <!-- Open Graph data -->
<meta property="og:title" content="<?php echo $blog['title']; ?>" />
<meta  property="og:type" content="Blog" />
<meta  property="og:image" content="<?php base_url($this->config->item('blog_main_upload_path')  . $blog['image'])?>" />
<meta  property="og:description" content="<?php echo $blog['meta_description']; ?>" /> 
<meta  property="og:url" content="<?php base_url('blog/'.$blog['blog_slug']) ?>" />
<meta property="og:image:width" content="620" />
<meta property="og:image:height" content="541" />
<meta property="fb:app_id" content="825714887566997" />

<!-- <meta property="og:site_name" content="Site Name, i.e. Moz" />
<meta property="fb:admins" content="Facebook numeric ID" /> -->
 
  <!-- for twitter -->
 <meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php base_url('blog/'.$blog['blog_slug']) ?>">
<meta name="twitter:title" content="<?php $blog['title']; ?>">
<meta name="twitter:description" content="<?php $blog['meta_description']; ?>">
<meta name="twitter:creator" content="By Aileensoul">
<meta name="twitter:image" content="http://placekitten.com/250/250">
<meta name="twitter:domain" content="<?php base_url('blog/'.$blog['blog_slug']) ?>">
<?php
}
?>
 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/blog.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style-main.css'); ?>">

 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/common-style.css'); ?>">
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">

</head>
<body class="blog">
<div class="main-inner">
   <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-3">
          <h2 class="logo"><a href="<?php echo base_url(); ?>">Aileensoul</a></h2>
        </div>
        <div class="col-md-8 col-sm-9">
            <div class="btn-right pull-right">
              <a href="<?php echo base_url('login'); ?>" class="btn2">Login</a>
              <a href="<?php echo base_url('registration'); ?>" class="btn3">Create an account</a>
            </div>
        </div>
      </div>
    </div>
  </header>
</div>
         <div class="blog_header">
          <div class="container">
            <div class="row"> 
            <div class="col-md-4 col-sm-5 col-xs-3 mob-zindex">
                        <!-- <div class="logo"><a href="<?php echo base_url('dashboard') ?>"><img src="<?php echo base_url('images/logo-white.png'); ?>"></a></div> -->
                        <div class="logo pl20">
                        <?php if($this->input->get('q') || $this->uri->segment(2) == 'popular' || $this->uri->segment(2) == 'tag')
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
                                <?php if($this->input->get('q') || $this->uri->segment(2) == 'popular' || $this->uri->segment(2) == 'tag')
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
                                     <a href="<?php echo base_url('blog/popular');?>">Most Popular</a>
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

if($this->input->get('q'))
      {
  ?>
        <div class="blog-tag">
        <div class="tag-line"><span>Search results for</span> <?php echo $search_keyword; ?></div>
        </div>
 
 <?php      
          
      }//if end  
if($this->uri->segment(2) == 'tag')
      {
    ?>
        <div class="blog-tag">
        <div class="tag-line"><span>Tag:</span> <?php echo $search_keyword; ?></div>
        </div>
    <?php      
      }//if end  

if(count($blog_detail) == 0 )
{
 
  if($this->input->get('q') || $this->uri->segment(2) == 'tag')
  {?>
<div class="job-saved-box">
                            <h3>

                            <div class="blog-tag">
                            <div class="tag-line"><span>Search result of </span> <?php echo $search_keyword; ?></div>
                            </div>
                           </h3>
                            <div class="contact-frnd-post">
                                

                                
                                         <div class="text-center rio">
                                                <h1 class="page-heading  product-listing" style="border:0px;margin-bottom: 11px;">Oops No Data Found.</h1>
                                                <p style="margin-left:4%;text-transform:none !important;border:0px;">We couldn't find what you were looking for.</p>
                                                <ul>
                                                    <li style="text-transform:none !important; list-style: none;">Make sure you used the right keywords.</li>
                                                </ul>
                                            </div>
                                   
                            </div>


                        </div>
<?php
     
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

         <a href="<?php echo base_url('blog/'.$blog['blog_slug'])?>"> <img src="<?php echo base_url($this->config->item('blog_main_upload_path')  . $blog['image']) ?>" ></a>

        </div>
        </div>
        <div class="blog_main_post_second_part">
        <div class="blog_class_main_name">
          <span>
             <a href="<?php echo base_url('blog/'.$blog['blog_slug'])?>"><?php echo $blog['title'];?></a>
          </span>
        </div>
        <div class="blog_class_main_by">
          <span>
          
          </span>
          
        </div>
        <div class="blog_class_main_desc">
          <span>
           <?php
                     $small = substr($blog['description'], 0, 560);
                     echo $small;

                     if (strlen($blog['description']) > 560) {
                          echo '....';
                        }
                        ?>
           <?php //echo $blog['description'];?> 
          </span>
        </div>
        <div class="blog_class_main_social">
          <div class="left_blog_icon fl">
          <ul class="social_icon_bloag fl">
            <li>
            
<?php

$title=urlencode('"'.$blog['title'].'"');
$url=urlencode(base_url('blog/'.$blog['blog_slug']));
$summary=urlencode('"'.$blog['description'].'"');
$image=urlencode(base_url($this->config->item('blog_main_upload_path')  . $blog['image']));
?>
               <!-- <a class="fbk" url_encode="<?php //echo $url; ?>" url="<?php //echo base_url('blog/'.$blog['blog_slug']); ?>" title="<?php //echo $title; ?>" summary="<?php //echo $summary; ?>" image="<?php //echo $image; ?>"> 
                <span  class="social_fb"></span>
                </a> -->

               <a class="fbk" url_encode="<?php echo $url; ?>" url="<?php echo base_url('blog/'.$blog['blog_slug']); ?>" title="Facebook" summary="<?php echo $summary; ?>" image="<?php echo $image; ?>"> 
                <span  class="social_fb"></span>
                </a>
              
            </li>
            <li>
              
                <!--  <a href="https://plus.google.com/share?url=<?php //echo $url; ?>&prefilltext=<?php //echo  $blog['description'];?>" onclick="javascript:window.open('https://plus.google.com/share?url=<?php //echo $url; ?>&prefilltext=<?php //echo  $blog['description'];?>','','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <span  class="social_gp"></span>
                </a> -->
                <a href="https://plus.google.com/share?url=<?php echo $url; ?>" title="Google +" onclick="javascript:window.open('https://plus.google.com/share?url=<?php echo $url; ?>','','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <span  class="social_gp"></span>
                </a>
              
            </li>
            <li>
                
                <!-- <a href="https://www.linkedin.com/cws/share?url=<?php //echo $url; ?>&amp;title=<?php// echo $blog['title'];?>&summary=<?php //echo $blog['description']; ?>&image=<?php //echo $image; ?>"  onclick="javascript:window.open('https://www.linkedin.com/cws/share?url=<?php //echo $url; ?>&amp;title=<?php //echo $blog['title'];?>&summary=<?php //echo $blog['description']; ?>&image=<?php //echo $image; ?>','','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span  class="social_lk"></span></a> -->

                 <a href="https://www.linkedin.com/cws/share?url=<?php echo $url; ?>" title="linkedin"  onclick="javascript:window.open('https://www.linkedin.com/cws/share?url=<?php echo $url; ?>','','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span  class="social_lk"></span></a>
              
            </li>
            <li>
            
               <!--  <a href="https://twitter.com/intent/tweet?text="<?php //echo  $blog['description'];?>" &url=<?php //echo $url; ?>"  onclick="javascript:window.open('https://twitter.com/intent/tweet?text=<?php //echo  $blog['description'];?> &url=<?php //echo $url; ?>','','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span  class="social_tw"></span></a> -->

                 <a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>"  title="twitter" onclick="javascript:window.open('https://twitter.com/intent/tweet?url=<?php echo $url; ?>','','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><span  class="social_tw"></span></a>
            
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
          <div class="searc_w"><input type="text" name="q" id="q" placeholder="Search Blog Post"></div>
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
              <a href="<?php echo base_url('blog/'.$blog['blog_slug'])?>"> <img src="<?php echo base_url($this->config->item('blog_main_upload_path')  . $blog['image']) ?>" alt=""></a>

            </div>
          </div>  
            <div class="post_latest_right">
            <div class="desc_post">
              <a href="<?php echo base_url('blog/'.$blog['blog_slug'])?>"> <span class="rifght_fname"> <?php echo $blog['title'];?> </span></a>
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

<!-- THIS DIV SHOWS ONLY WHEN TAG SEARCH START-->
<!-- <?php //if($this->uri->segment(2) == 'tag')
      {
?>
      <div class="popular_tag">
      <h4>Popular Tag</h4>

       <?php 
            
          //foreach($blog_all as $blog)
          {

                // $tag_all=explode(',', $blog['tag']);
                  //foreach($tag_all as $tag )
                  {
               
        ?>
      <div class="tag_name">
      <span class="span_tag">
      <a href="<?php// echo base_url('blog/tag/'.$tag)?>">
      <?php  
               // echo $tag;

        ?>
        </a>
        </span>
      </div>

      <?php
                  }//foreach($tag_all as $tag) loop end

          }//foreach($blog_all as $blog) loop end

      ?>

       </div>
 <?php
        }//If loop end

  ?> -->
<!-- THIS DIV SHOWS ONLY WHEN TAG SEARCH END-->

     </div>

     </div>
  </div>
</div>  
</section>

<footer class="footer">
                <div class="container pt20">
                    <div class="row">

                        <div class="col-md-6 col-sm-8 pull-right col-xs-12">
                            <ul>
                                <li><a href="<?php echo base_url('about_us'); ?>">About Us</a>|</li>
                                <li><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a>|</li>
                <li><a href="<?php echo base_url('blog');      ?>">Blog</a>|</li>
                                <li><a href="<?php echo base_url('feedback'); ?>">Send Us Feedback</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-4 col-xs-12">
                              <span style="font-weight: normal;">  © 2017 | by Aileensoul</span>
                        </div>
                    </div>
                </div>
            </footer>
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
                  window.location= "<?php echo base_url() ?>blog/" + slug;
                   //redirect('blog');
               }
             
           }
       });
   }
</script>

<!-- FOR SEARCH VALIDATION FOR EMAPTY SEARCH START -->
<script type="text/javascript">
   function checkvalue() 
   {
     
       var searchkeyword = $.trim(document.getElementById('q').value);
     
       if (searchkeyword == "") 
       {
           return false;
       }
   }
   
</script>
<!-- FOR SEARCH VALIDATION FOR EMAPTY SEARCH END -->


<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>
<!-- THIS SCRIPT IS USED FOR SCRAP IMAGE FOR FACEBOOK POST TO GET REAL IMAGE START-->
<script type="text/javascript">
 $(document).ready(function() {
$(".fbk").on('click', function() {

//alert($(this).attr('title'));
      //  var url=$(this).attr('data');
     

       var url= $(this).attr('url');
        var  url_encode= $(this).attr('url_encode');
       var title=$(this).attr('title');
       var summary= $(this).attr('summary');
       var image=$(this).attr('image');

        $.ajax({
        type: 'POST',
        url: 'https://graph.facebook.com?id='+url+'&scrape=true',
            success: function(data){
               console.log(data);
           }

    });
         window.open('http://www.facebook.com/sharer.php?s=100&p[title]='+title+'&p[summary]='+summary+'&p[url]='+ url_encode+'&p[images][0]='+image+'', 'sharer', 'toolbar=0,status=0,width=620,height=280');
});
});

</script>
<!-- THIS SCRIPT IS USED FOR SCRAP IMAGE FOR FACEBOOK POST TO GET REAL IMAGE END-->

<script type="text/javascript" src="<?php echo base_url('js/jquery-1.11.1.min.js'); ?>"></script>

<style type="text/css">
  #name-error{margin-top: 36px;margin-right: 12px;}
  #email-error{margin-top: 36px;margin-right: 12px;}
  #message-error{margin-top: 73px;margin-right: 12px;
}
</style>