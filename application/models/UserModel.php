<?php
defined('BASEPATH') or exit('No direct script access allowed');

// UserModel berisi semua tentang data user
class UserModel extends CI_Model
{
    private $table = "user";


    public function getOne($col, $val)  // CHECK USER APAKAH SUDAH ADA DI DB (register)
    {
        return $this->db->get_where($this->table, [$col => $val])->row();   // Mengambil 1 baris data, Methode ini hanya untuk pengecekan akun user/admin
    }

    public function getAll()
    {
        return $this->db->get($this->table)->result();  // Mengambil semua data di table user
    }

    public function create($data)   // INSERT DATA (register)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, array('id' => $id));
    }

    // FOR ADMIN

    // public function getAllUser()
    // {
    //     return $this->db->get($this->table)->result();  // Mengambil semua data di table user
    // }
}
