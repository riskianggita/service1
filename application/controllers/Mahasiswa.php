<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Mahasiswa extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model("mahasiswa_model");
	}

	public function mahasiswa_get()
	{
		$list_mahasiswa = $this->mahasiswa_model->get_mahasiswa_all();

		if ($list_mahasiswa->num_rows() > 0) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $list_mahasiswa->result(),
				'message' => 'data has been loaded'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'No Mahasiswa were found'
			], 404);
		}
	}

	public function mahasiswa_one_get($nim)
	{
		$list_mahasiswa = $this->mahasiswa_model->get_mahasiswa_one($nim);

		if ($list_mahasiswa->num_rows() > 0) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $list_mahasiswa->row(),
				'message' => 'data has been loaded'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'No Mahasiswa were found'
			], 404);
		}
	}

	public function mahasiswa_post()
	{
		$data = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
		);

		if ($this->mahasiswa_model->post($data)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $data,
				'message' => 'data has been inserted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Mahasiswa has not been inserted'
			], 404);
		}
	}
	public function mahasiswa_delete($nim)
	{
		if ($this->mahasiswa_model->delete($nim)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $nim,
				'message' => 'data has been deleted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Mahasiswa has not been deleted'
			], 404);
		}
	}

	public function mahasiswa_all_delete()
	{
		if ($this->mahasiswa_model->delete_all()) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => "All mahasiswa",
				'message' => 'data has been deleted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Mahasiswa has not been deleted'
			], 404);
		}
	}

	public function mahasiswa_update_post($nim)
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
		);

		if ($this->mahasiswa_model->put($data, $nim)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $data,
				'message' => 'data has been updated'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Mahasiswa has not been updated'
			], 404);
		}
	}
}
