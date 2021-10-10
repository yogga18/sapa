<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->home = base_url();
        $this->profile = base_url("profile");
        $this->load->helper(array('form', 'url'));
        $this->load->model("UserModel");
        $this->load->model("PostModel");

        if ($this->session->userdata("login") == null) {
            redirect(base_url('login'));
        }
        $this->user = $this->UserModel->getOne("id", $this->session->userdata("login"));
    }

    // Page Home
    public function index()
    {
        $data = [
            "user" => $this->user,
            "posts" => $this->PostModel->getAll()

        ];
        $this->load->view('home', $data);
    }
}
