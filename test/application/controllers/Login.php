<?php

defined('BASEPATH') OR exit ('No direct script access allowd');

class Login extends CI_Controller {

        public function index()
        {
                $this->load->view('login');
        }
        public function user_login()
        {
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Login');
                }
                else
                {
                        $this->load->model('model_user');
                        $result = $this->model_user->userLogin();

                        if ($result != false){
                                $user_data = array(
                                        'user_id' => $result->user_id,
                                        'fname' => $result->fname,
                                        'lname' => $result->lname,
                                        'gender' => $result->gender,
                                        'phone' => $result->phone,
                                        'email' => $result->email,
                                        'package' => $result->package,
                                        'company' => $result->company,
                                        'customer' => $result->customer,
                                        'branch' => $result->branch,
                                        'username' => $result->username,
                                        'status' => $result->status,
                                        'user_group' => $result->user_group,
                                        'logged_in' => TRUE
                                );
                                
                                $this->session->set_userdata($user_data);
                                $this->session->set_flashdata('Welcome', 'Main admin dashboard');
                                redirect('Dashboard/dashboard_controller');
                        }
                        else{
                                $this->session->set_flashdata('errmsg', 'Wrong credentials');
                                redirect ('Login');
                        }
                }
        }
        public function Logout(){
                $this->session->unset_userdata('user_id');
                $this->session->unset_userdata('fname');
                $this->session->unset_userdata('lname');
                $this->session->unset_userdata('gender');
                $this->session->unset_userdata('phone');
                $this->session->unset_userdata('email');
                $this->session->unset_userdata('company');
                $this->session->unset_userdata('package');
                $this->session->unset_userdata('customer');
                $this->session->unset_userdata('branch');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('status');
                $this->session->unset_userdata('user_group');
                redirect('Login');

        }
}