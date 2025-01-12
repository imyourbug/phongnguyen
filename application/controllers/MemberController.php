<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MemberController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Member');
		// Load session library
		// $this->load->library('session');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('members/list', [
			'title' => 'Danh Sách Thành Viên',
			'members' => $this->Member->get_all()
		]);
	}

	public function edit($id)
	{
		$this->load->library('form_validation');
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('gender', 'Gender', 'required');

			if ($this->form_validation->run() === TRUE) {
				$data = [
					'id' => $this->input->post('id'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
					'gender' => $this->input->post('gender'),
				];
				if ($this->Member->update($id, $data)) {
					$this->session->set_flashdata('success', 'Đăng ký thành công!');
					redirect('members');
				}
			}
		}

		$this->load->view('members/edit', [
			'title' => 'Chi tiết Thành Viên',
			'member' => $this->Member->get_by_id($id)
		]);
	}

	public function register()
	{
		$this->load->library('form_validation');
		if ($this->input->post()) {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
			$this->form_validation->set_rules('gender', 'Gender', 'required');

			if ($this->form_validation->run() === TRUE) {
				$email = $this->input->post('email');
				if ($this->Member->check_email_exists($email)) {
					$this->session->set_flashdata('error', 'Email đã tồn tại.');
					redirect('/members/register');
				} else {
					$data = [
						'name' => $this->input->post('name'),
						'email' => $email,
						'password' => $this->input->post('password')
					];

					if ($this->Member->register($data)) {
						$this->session->set_flashdata('success', 'Đăng ký thành công!');
						redirect('members');
					}
				}
			}
		}

		$this->load->view('members/register');
	}

	public function delete()
	{
		// $this->load->library('form_validation');
		if ($this->input->post()) {
			$id = $this->input->post('id');
			if ($this->Member->delete($id)) {
			}
		}
		redirect('members');
	}
}
