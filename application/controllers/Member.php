<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->home = base_url();
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
        $image = $this->upload_foto();
        $created_at = date("Y-m-d H:i:s");

        $data = [
            "user_id" => $this->user->id,
            "tgl_surat" => $tgl_surat,
            "no_surat" => $no_surat,
            "alamat" => $alamat,
            "kelurahan" => $kelurahan,
            "image" => $image,
            "created_at" => $created_at
        ];

        // LOGIC INSERT DATA
        if ($this->PostModel->create($data) != 1) {
            redirect(base_url("massage"));
        }
        redirect(base_url("massage"));
    }

    //upload image postingan
    public function upload_foto()
    {
        $config['upload_path']          = './image/';
        $config['allowed_types']        = 'png|jpg|jpeg';
        $config['overwrite']            = true;
        $config['max_size']             = 102400;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            redirect(base_url("massage"));
        } else {
            return $this->upload->data("file_name");
        }
    }
    // INSERT END

    public function editSurat()
    {
    }























    // DELETE
    public function delete_surat($id)
    {
        if ($this->PostModel->deleteSurat($id) != 1) {
            // echo "
            // <script>
            //     alert('Post gagal dihapus');
            //     document.location.href = \"$this->lihatSurat\";
            // </script>";
            redirect(base_url("lihatSurat"));
        } else {
            // echo "
            // <script>
            //     alert('Post berhasil dihapus');
            //     document.location.href = \"$this->lihatSurat\";
            // </script>";
            redirect(base_url("lihatSurat"));
        }
    }
    // DELETE END

    // public function editSurat()
    // {
    //     $id = $this->input->post('id');
    //     $user_id = $this->input->post('user_id');
    //     $tgl_surat = $this->input->post('tgl_surat');
    //     $no_surat = $this->input->post('no_surat');
    //     $alamat = $this->input->post('alamat');
    //     $kelurahan = $this->input->post('kelurahan');
    //     $keterangan = $this->input->post('keterangan');
    //     $foto = $this->input->post('foto');
    //     $status = $this->input->post('status');
    //     $created_at = $this->input->post('created_at');

    //     $data = array(
    //         'tgl_surat' => $tgl_surat,
    //         'no_surat' => $no_surat,
    //         'alamat' => $alamat,
    //         'kelurahan' => $kelurahan,
    //         'status' => $status,
    //     );

    //     if ($this->PostModel->update($data, $id) == 1) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
    //         redirect(base_url("lihatSurat"));
    //     } else {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
    //         redirect(base_url("lihatSurat"));
    //     }
    // }
}
