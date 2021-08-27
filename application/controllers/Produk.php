<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('produk_model');
	}

	public function index()
	{
		$this->load->view('produk');
	}

    public function data_stok()
	{
		header('Content-type: application/json');
		$bahan_baku = $this->produk_model->dataStok();
		echo json_encode($bahan_baku);
	}