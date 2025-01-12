<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Model
{
    public function register($data)
    {
        return $this->db->insert('users', $data);
    }

    public function get_all()
    {
        return $this->db->get('users')->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function delete($id)
    {
        return $this->db->delete('users', ['id' => $id]);
    }

    function update($id, $data)
    {
        return $this->db->update('users', $data, ['id' => $id]);
    }

    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', ['email' => $email]);
        return $query->num_rows() > 0;
    }
}
