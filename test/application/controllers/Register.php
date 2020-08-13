<?php

defined('BASEPATH') OR exit ('No direct script access allowd');

class Register extends CI_Controller {

        public function register_controller()
        {
                $this->load->view('register');
        }
        public function user_register()
        {
                $this->form_validation->set_rules('fname', 'First name', 'required');
                $this->form_validation->set_rules('lname', 'Last name', 'required');
                $this->form_validation->set_rules('gender', 'gender', 'required');
                $this->form_validation->set_rules('phone', 'Password', 'required');
                $this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique[tms_user_master.email]');
                $this->form_validation->set_rules('package', 'Package', 'required');
                $this->form_validation->set_rules('company', 'Company', 'required');
                $this->form_validation->set_rules('customer', 'Customer', 'required');
                $this->form_validation->set_rules('branch', 'Branch', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|matches[password]');
                $this->form_validation->set_rules('status', 'Status', 'required');
                $this->form_validation->set_rules('user_group', 'User Group', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('Register');
                }
                else
                {
                        $this->load->model('model_user');
                        $response = $this->model_user->insert_data();
                        if ($response)
                        {
                                $this->session->set_flashdata('msg', 'Registered successfully..please Login');
                                redirect ('Login');
                        }
                        else
                        {
                                $this->session->set_flashdata('msg', 'Registered failed');
                                redirect ('Register/user_register');
                        }

                }

        }
}