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

    public function about()
    {
        $data = [
            "user" => $this->user,
        ];
        $this->load->view('about', $data);
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

    public function updateSurat()
    {
        $id = $this->input->post('id');

        $data = $this->PostModel->getDataById($id)->row();
        $image = './image/' . $data->image;

        if (is_readable($image) && unlink($image)) {

            $config['upload_path']          = './image/';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $config['overwrite']            = true;
            $config['max_size']             = 102400;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                redirect(base_url("Admin/suratMasuk"));
            } else {
                // return $this->upload->data("file_name");

                $upload_data = $this->upload->data();
                $image = $upload_data['file_name'];

                $data = array(
                    "id" => $this->input->post('id'),
                    "no_surat" => $this->input->post('no_surat'),
                    "alamat" => $this->input->post('alamat'),
                    "kelurahan" => $this->input->post('kelurahan'),
                    "keterangan" => $this->input->post('keterangan'),
                    "image" => $image,
                    "status" => $this->input->post('status'),
                );

                $update = $this->PostModel->updateFile($id, $data);

                if ($update) {
                    redirect(base_url("Admin/suratMasuk"));
                } else {
                    redirect(base_url("Admin/suratMasuk"));
                }
            }
        }
    }



    // CRUD PAGES SURAT MASUK BPBD END
}
