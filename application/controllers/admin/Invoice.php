<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_invoice');
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function index()
    {
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice_list', $data);
        $this->load->view('templates_admin/footer');
    }

    public function konfirmasi($id)
    {
        $this->model_invoice->konfirmasi_pembayaran($id);
        $this->session->set_flashdata('success', 'Pembayaran berhasil dikonfirmasi!');
        redirect('admin/invoice');
    }

    public function ubah_status($id)
    {
        $status = $this->input->post('status_pengiriman');
        $this->model_invoice->ubah_status_pengiriman($id, $status);
        $this->session->set_flashdata('success', 'Status pengiriman diperbarui!');
        redirect('admin/invoice');
    }
}
