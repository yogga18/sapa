<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->model("PostModel");

        if ($this->session->userdata("login") == null && $this->session->userdata("admin") != true) {
            redirect(base_url('login'));
        }

        $this->user = $this->UserModel->getOne("id", $this->session->userdata("login"));
    }
    public function index()
    {
        $data = [
            "user" => $this->user,
            "posts" =>  $this->UserModel->getAll()
        ];

        $this->load->view('admin', $data);
    }

    public function suratMasuk()
    {
        $data = [
            "user" => $this->user,
            "posts" => $this->PostModel->getAll()

        ];
        $this->load->view('suratMasuk', $data);
    }
}
