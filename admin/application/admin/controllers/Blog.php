<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Blog extends MY_Controller {

    public $data;

    public function __construct() {

      parent::__construct();

        if (!$this->session->userdata('aileen_admin')) 
        {
            redirect('login', 'refresh');
        }
   
        
        // Get Site Information
        $this->data['title'] = 'Blog | Aileensoul';
        $this->data['module_name'] = 'Blog';
        $this->data['section_title'] = 'Blog';

         //Loadin Pagination Custome Config File
         $this->config->load('paging', TRUE);
         $this->paging = $this->config->item('paging');

        include('include.php');
        $adminid =  $this->session->userdata('aileen_admin');


    }

//LIST OF BLOG ADD BY ADMIN START
 public function blog_list() 
 {
         //FOR GETTING ALL DATA STARt
            $condition_array = array('status !=' => 'delete');
            $this->data['blog_detail']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());
        //FOR GETTING ALL DATA END 

        $this->load->view('blog/list', $this->data);
}
//LIST OF BLOG ADD BY ADMIN END

//BLOG ADD BY ADMIN START
 public function add()
     {
     
        //FOR GET TAG NAME START
        $condition_array = array('status !=' => 'delete');
        $data="id,name";
        $this->data['blog_tag']  = $this->common->select_data_by_condition('blog_tag', $condition_array, $data, $short_by, $order_by, $limit, $offset, $join_str = array());
        //FOR GET TAG NAME END

        $this->load->view('blog/add',$this->data);


        // print_r($this->data['art_list']);die();
    }
 //BLOG ADD BY ADMIN END

//BLOG ADD INSERT START
 public function blog_insert()
     {

        //IMAGE UPLOAD IN FOLDER START
        if($_FILES['image']['name'] != '' )
        {
            $blog['upload_path'] = $this->config->item('blog_main_upload_path');
            $blog['allowed_types'] = $this->config->item('blog_main_allowed_types');
            $blog['max_size'] = $this->config->item('blog_main_max_size');
            $blog['max_width'] = $this->config->item('blog_main_max_width');
            $blog['max_height'] = $this->config->item('blog_main_max_height');

            $this->load->library('upload');
            $this->upload->initialize($blog);
            //Uploading Image
            $this->upload->do_upload('image');
           
            //Getting Uploaded Image File Data
            $imgdata = $this->upload->data();
            $imgerror = $this->upload->display_errors();
            //print_r($imgerror);die();

                //Configuring Thumbnail 
                $blog_thumb['image_library'] = 'gd2';
                $blog_thumb['source_image'] = $blog['upload_path'] . $imgdata['file_name'];
                $blog_thumb['new_image'] = $this->config->item('blog_thumb_upload_path') . $imgdata['file_name'];
                $blog_thumb['create_thumb'] = TRUE;
                $blog_thumb['maintain_ratio'] = TRUE;
                $blog_thumb['thumb_marker'] = '';
                $blog_thumb['width'] = $this->config->item('blog_thumb_width');
                //$user_thumb['height'] = $this->config->item('user_thumb_height');
                $blog_thumb['height'] = 2;
                $blog_thumb['master_dim'] = 'width';
                $blog_thumb['quality'] = "100%";
                $blog_thumb['x_axis'] = '0';
                $blog_thumb['y_axis'] = '0';
                //Loading Image Library
                $this->load->library('image_lib', $blog_thumb);
                $dataimage = $imgdata['file_name'];
                //Creating Thumbnail
                $this->image_lib->resize();
                $thumberror = $this->image_lib->display_errors();
           
            
        }
                
        $blog_image = $imgdata['file_name'];
        //IMAGE UPLOAD IN FOLDER START

        //FOR INSERT BLOG DATA START
        $data = array(
                    'title' => $this->input->post('blog_title'),
                    'tag_id' => $this->input->post('tag'),
                    'description' => $this->input->post('description'),
                    'image' => $blog_image,
                    'blog_slug' => $this->setcategory_slug($this->input->post('blog_title'), 'blog_slug', 'blog'),
                    'created_date' => date('Y-m-d H:i:s'),
                    'status' => 'publish'
                ); 
             // echo "<pre>";print_r($data);die();
         $insert_id = $this->common->insert_data_getid($data, 'blog');

               
         //FOR INSERT BLOG DATA END

        if ($insert_id) 
        {

            $this->session->set_flashdata('success', 'Blog inserted successfully');
            redirect('blog/blog_list', refresh);
        } 
        else 
        {
            $this->session->flashdata('error', 'Sorry!! Your data not inserted');
            redirect('blog/add', refresh);
        }

    }
 //BLOG ADD INSERT END

// BLOG SLUG START

public function setcategory_slug($slugname, $filedname, $tablename, $notin_id = array())
{
        $slugname = $oldslugname = $this->create_slug($slugname);
        $i = 1;
        while ($this->comparecategory_slug($slugname, $filedname, $tablename, $notin_id) > 0) {
            $slugname = $oldslugname . '-' . $i;
            $i++;
        }return $slugname;
}

public function comparecategory_slug($slugname, $filedname, $tablename, $notin_id = array())
{
        $this->db->where($filedname, $slugname);
        if (isset($notin_id) && $notin_id != "" && count($notin_id) > 0 && !empty($notin_id)) {
            $this->db->where($notin_id);
        }
        $num_rows = $this->db->count_all_results($tablename);
        return $num_rows;
}

public function create_slug($string) 
{
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', strtolower(stripslashes($string)));
        $slug = preg_replace('/[-]+/', '-', $slug);
        $slug = trim($slug, '-');
        return $slug;
    }

// BLOG SLUG END

//CHANGE STATUS PUBLISH TO DRAFT WITH AJAX START
public function publish() 
{
     $id = $_POST['id'];
      $data = array(
            'status' => 'draft'
        );

        $update = $this->common->update_data($data, 'blog', 'id', $id);

         $select .= '<button class="btn btn-block btn-success btn-sm"    onClick="draft(' .  $id . ')">
                              Draft
                      </button>';

        echo $select;
         die();

}
//CHANGE STATUS PUBLISH TO DRAFT WITH AJAX END

//CHANGE STATUS DRAFT TO PUBLISH WITH AJAX START
public function draft() 
{
     $id = $_POST['id'];
      $data = array(
            'status' => 'publish'
        );

        $update = $this->common->update_data($data, 'blog', 'id', $id);

        $select = '<button class="btn btn-block btn-primary btn-sm"   onClick="publish(' .  $id . ')">
                              Publish
                      </button>';

        echo $select;

        die();
}
//CHANGE STATUS DRAFT TO PUBLISH WITH AJAX END

//DELETE BLOG WITH AJAX START
public function delete_blog() 
{
     $id = $_POST['id'];
      $data = array(
            'status' => 'delete'
        );

        $update = $this->common->update_data($data, 'blog', 'id', $id);
               
        die();
}
//DELETE USER WITH AJAX END

//VIEW BLOG DETAIL START
public function blogdetail($id) 
{
    //FOR GETTING ALL DATA STARt
    $condition_array = array('status !=' => 'delete','id'=> $id);
    $this->data['blog_detail']  = $this->common->select_data_by_condition('blog', $condition_array, $data='*', $short_by='id', $order_by='desc', $limit, $offset, $join_str = array());
    //FOR GETTING ALL DATA END 

    //echo "<pre>";print_r($this->data['blog_detail']);die();

     $this->load->view('blog/blogdetail',$this->data);

}
//VIEW BLOG DETAIL END

}

?>