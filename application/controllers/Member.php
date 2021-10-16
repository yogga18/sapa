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
            "letter" => $this->PostModel->getAll()
        ];
        $this->load->view('home', $data);
    }

    // Page Massage
    public function massage()
    {
        $data = [
            "user" => $this->user,
            "letter" => $this->PostModel->getAll()
        ];
        $this->load->view('massage', $data);
    }

    public function lihatSurat()
    {
        $data = [
            "user" => $this->user,
            "letter" => $this->PostModel->getAllByUser($this->user->id)
        ];

        $this->load->view('lihatSurat', $data);
    }




    // INSERT
    public function create_letter()
    {
        $tgl_surat = $this->input->post("tgl_surat");
        $no_surat = $this->input->post("no_surat");
        $alamat = $this->input->post("alamat");
        $kelurahan = $this->input->post("kelurahan");
        $created_at = date("Y-m-d H:i:s");

        $data = [
            "user_id" => $this->user->id,
            "tgl_surat" => $tgl_surat,
            "no_surat" => $no_surat,
            "alamat" => $alamat,
            "kelurahan" => $kelurahan,
            "created_at" => $created_at
        ];

        // LOGIC INSERT DATA
        if ($this->PostModel->create($data) != 1) {
            // echo "
            // <script>
            //     alert('Post gagal dikirim');
            //     document.location.href = \"$this->massage\";
            // </script>";
            redirect(base_url("massage"));
        }
        // echo "
        // <script>
        // 	alert('Data berhasil di simpan');
        //     document.location.href = \"$this->massage\";
        // </script>";
        redirect(base_url("massage"));
    }
    // INSERT END

    // DELETE
    public function delete_surat($id)
    {
        if ($this->PostModel->delete($id) != 1) {
            // echo "
            // <script>
            //     alert('Post gagal dihapus');
            //     document.location.href = \"$this->admin\";
            // </script>";
            redirect(base_url("lihatSurat"));
        } else {
            // echo "
            // <script>
            //     alert('Post berhasil dihapus');
            //     document.location.href = \"$this->admin\";
            // </script>";
            redirect(base_url("lihatSurat"));
        }
    }
    // DELETE

    //upload image postingan
    private function _upload_foto()
    {
        $config['upload_path']          = './image/';
        $config['allowed_types']        = 'png|jpg|jpeg|docx|pdf|xlsx';
        $config['overwrite']            = true;
        $config['max_size']             = 102400;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            echo "
            <script>
			alert('Terjadi kesalahan upload');
			document.location.href = \"$this->profile\";
            </script>";
            die();
        } else {
            return $this->upload->data("file_name");
        }
    }
}
