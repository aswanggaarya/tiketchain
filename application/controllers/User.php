<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	public function __construct()
    {
	    parent:: __construct();
	    $this->load->model('mflight');
	    $this->load->model('mtrain');
	    //ini digunakan untuk dapat mengakses model mflight
    }

    public function chainakhir()
	{
		$data = array(
            'ruteawal' => $this->mflight->get_ruteawal(),
            'ruteakhir' => $this->mflight->get_ruteakhir(),
            'ruteawal_selected' => '',
            'ruteakhir_selected' => '',
        );

        $this->load->view('user/flights', $data);
	}

	public function flights()
	{
		$data['penumpang'] = $this->db->get_where('penumpang', ['username' => $this->session->userdata('username')])->row_array();

		$this->load->view('user/flights', $data);
	}

	public function trains()
	{
		$data['penumpang'] = $this->db->get_where('penumpang', ['username' => $this->session->userdata('username')])->row_array();
		$data['ruteawal'] = $this->mtrain->get();
		

		$this->load->view('user/trains', $data);
	}

}