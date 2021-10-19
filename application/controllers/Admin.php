<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->model("PostModel");
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->session->userdata("login") == null && $this->session->userdata("admin") != true) {
            redirect(base_url('login'));
        }
        $this->user = $this->UserModel->getOne("id", $this->session->userdata("login"));
    }


    // PAGES
    public function index()
    {
        $data = [
            "user" => $this->user,
            "member" =>  $this->UserModel->getAll()
        ];

        $this->load->view('admin', $data);
    }

    public function suratMasuk()
    {
        $data = [
            "user" => $this->user,
            "letter" => $this->PostModel->getAll()

        ];
        $this->load->view('suratMasuk', $data);
    }
    // PAGES END



    // CRUD PAGES USER ACCOUNT
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
        $id = $this->input->post('id');
        $role = $this->input->post('role');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $avatar = $this->input->post('avatar');

        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
        );

        if ($this->UserModel->update($data, $id) == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
            redirect(base_url("admin"));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
            redirect(base_url("admin"));
        }
    }
    // CRUD PAGES USER ACCOUNT END


    // CRUD PAGES SURAT MASUK BPBD

    public function delete_post($id)
    {
        $data = $this->PostModel->getDataById($id)->row();
        $image = './image/' . $data->image;

        if (is_readable($image) && unlink($image)) {
            $delete = $this->PostModel->delete($id);
            redirect(base_url("Admin/suratMasuk"));
        } else {
            redirect(base_url("Admin/suratMasuk"));
        }
    }

    // public function updateSurat($id)
    // {

    //     $this->form_validation->set_rules('tgl_surat', 'Tgl_surat', 'required');
    //     $this->form_validation->set_rules('no_surat', 'No_surat', 'required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    //     $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
    //     $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    //     $this->form_validation->set_rules('image', 'Image', 'required');
    //     $this->form_validation->set_rules('status', 'Status', 'required');

    //     if ($this->form_validation->run()) {
    //         $old_image = $this->input->post('old_image');
    //         $new_image = $_FILES["image"]['name'];

    //         if ($new_image == TRUE) {
    //             $update_filename = time() . "-" . str_replace('', '-', $_FILES["image"]['name']);

    //             $config = [
    //                 'upload_path' => "./image/",
    //                 'allowed_types' => "png|jpg|jpeg",
    //                 'overwrite' => true,
    //                 'max_size' => 102400,
    //                 'file_name' => $update_filename,
    //             ];

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('image')) {
    //                 if (file_exists("./image/" . $old_image)) {
    //                     unlink("./image/" . $old_image);
    //                 }
    //             }
    //         } else {
    //             $update_filename = $old_image;
    //         }

    //         $data = [
    //             'tgl_surat' => $this->input->post('tgl_surat'),
    //             'no_surat' => $this->input->post('no_surat'),
    //             'alamat' => $this->input->post('alamat'),
    //             'kelurahan' => $this->input->post('kelurahan'),
    //             'keterangan' => $this->input->post('keterangan'),
    //             'image' => $update_filename,
    //         ];

    //         $PostModel = new PostModel;
    //         $res = $PostModel->updateFile($data, $id);
    //         $this->session->set_flashdata('status', 'done');
    //         redirect(base_url('suratMasuk'));
    //     } else {
    //         return $this->editSurat($id);
    //     }
    // }
    // CRUD PAGES SURAT MASUK BPBD END
}
