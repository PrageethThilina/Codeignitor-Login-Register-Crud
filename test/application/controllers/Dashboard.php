<?php

defined('BASEPATH') OR exit ('No direct script access allowd');

class Dashboard extends CI_Controller {

        public function dashboard_controller()
        {
                $this->load->view('dashboard');
        }
        public function get_all_users()  
        {  
           $this->load->model("model_user");  
           $fetch_data = $this->model_user->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = $row->fname;  
                $sub_array[] = $row->lname; 
                $sub_array[] = $row->email;  
                $sub_array[] = $row->user_group;   
                $sub_array[] = $row->status;   
                $sub_array[] = '<button type="button" name="update" user_id="'.$row->user_id.'" class="btn btn-warning btn-xs update">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" user_id="'.$row->user_id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"          => intval($_POST["draw"]),  
                "recordsTotal"  =>  $this->model_user->get_all_data(),  
                "recordsFiltered" => $this->model_user->get_filtered_data(),  
                "data"  =>     $data  
           );  
           echo json_encode($output);  

        }
        function user_action(){ 
             
               $updated_data = array(  
                          'fname'          =>     $this->input->post('fname'),  
                          'lname'               =>     $this->input->post('lname'),  
                          'email'          =>     $this->input->post('email'),  
                          'user_group'               =>     $this->input->post('user_group'),  
                          'status'               =>     $this->input->post('status'),  

                     );  
                     $this->load->model('model_user');  
                     $this->model_user->update_user($this->input->post("user_id"), $updated_data); 
                     echo 'Data Updated successfully';  
          }  
 
           function fetch_single_user()  
           {  
                $output = array();  
                $this->load->model("model_user");  
                $data = $this->model_user->fetch_single_user($_POST["user_id"]);  
                foreach($data as $row)  
                { 
                     $output['user_id'] = $row->user_id;  
                     $output['fname'] = $row->fname;  
                     $output['lname'] = $row->lname;  
                     $output['email'] = $row->email;  
                     $output['user_group'] = $row->user_group;  
                     $output['status'] = $row->status;  
                }  
                echo json_encode($output);  
           }  
	
}
