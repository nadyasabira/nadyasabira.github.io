<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart_penjualan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('chart_penjualan_model');
    }

  function index()
  {
    $data['hasil']=$this->chart_penjualan_model->penjualan();
    $this->template->load('template/template','chart_bp_view',$data);
  }
}
?>