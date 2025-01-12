<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{

	public function index()
	{
		redirect('members/register');
	}
}
