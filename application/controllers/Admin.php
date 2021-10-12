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
            "member" =>  $this->UserModel->getAll()
        ];

        $this->load->view('admin', $data);
    }

    public function delete_user($id)
    {
        if ($this->UserModel->deleteUser($id) != 1) {
            // echo "
            // <script>
            //     alert('Post gagal dihapus');
            //     document.location.href = \"$this->admin\";
            // </script>";
            redirect(base_url("admin"));
        } else {
            // echo "
            // <script>
            //     alert('Post berhasil dihapus');
            //     document.location.href = \"$this->admin\";
            // </script>";
            redirect(base_url("admin"));
        }
    }

    public function editUser()
    {
        // Buat kerangka sesuai field di table database
        $id = $this->input->post("id");
        $username = $this->input->post("username");
        $email = $this->input->post("email");

        // tentukan data mana saja yang ingin atau bisa di ubah (Susai Form di HTML)
        $data = [
            "username" => $username,
            "email" => $email,
        ];
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
