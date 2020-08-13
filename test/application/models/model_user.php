<?php

class model_user extends CI_Model{

    function insert_data(){
        $data = array(

            'fname' => $this->input->post('fname', TRUE),
            'lname' => $this->input->post('lname', TRUE),
            'gender' => $this->input->post('gender', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'email' => $this->input->post('email', TRUE),
            'package' => $this->input->post('package', TRUE),
            'company' => $this->input->post('company', TRUE),
            'customer' => $this->input->post('customer', TRUE),
            'branch' => $this->input->post('branch', TRUE),
            'username' => $this->input->post('username', TRUE),
            'password' => password_hash($this->input->post('password', TRUE),PASSWORD_DEFAULT),
            'status' => $this->input->post('status', TRUE),
            'user_group' => $this->input->post('user_group', TRUE),

        );

        return $this->db->insert('tms_user_master',$data);
    }

    function userLogin(){
        $username = $this->input->post('username');
        $password = password_verify($this->input->post('password'),PASSWORD_DEFAULT);

        $this->db->where('username',$username);
        $this->db->where('password',$password);

        $respond = $this->db->get('tms_user_master');

        if($respond->num_rows()==1){
           return $respond->row(0);
        }
        else{
            return false;
        }
    }

    var $table = "tms_user_master";  
    var $select_column = array("user_id", "fname", "lname", "email","user_group","status");  
    var $order_column = array("user_id", "fname", "lname", "lname", "email","user_group","status");
    function make_query()  
    {  
         $this->db->select($this->select_column);  
         $this->db->from($this->table);  
         if(isset($_POST["search"]["value"]))  
         {  
              $this->db->like("fname", $_POST["search"]["value"]);  
              $this->db->or_like("lname", $_POST["search"]["value"]);  
         }  
         if(isset($_POST["order"]))  
         {  
              $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
         }  
         else  
         {  
              $this->db->order_by('user_id', 'DESC');  
         }  
    }
    function make_datatables(){  
        $this->make_query();  
        if($_POST["length"] != -1)  
        {  
             $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        return $query->result();  
   }  
   function get_filtered_data(){  
        $this->make_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
   }       
   function get_all_data()  
   {  
        $this->db->select("*");  
        $this->db->from($this->table);  
        return $this->db->count_all_results();  
   }   
   function fetch_single_user($user_id)  
   {  
        $this->db->where("user_id", $user_id);  
        $query=$this->db->get('tms_user_master');  
        return $query->result();  
   }  
   function update_user($user_id, $data)  
   {  
        echo $user_id;
        $this->db->where("user_id", $user_id);  
        $this->db->update("tms_user_master", $data);  
   }   

}