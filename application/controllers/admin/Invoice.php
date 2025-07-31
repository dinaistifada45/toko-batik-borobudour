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

    public function detail($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice_detail', $data);
        $this->load->view('templates_admin/footer');
    }

    public function konfirmasi($id)
    {
        $this->model_invoice->konfirmasi_pembayaran($id);
        $this->session->set_flashdata('success', 'Pembayaran berhasil dikonfirmasi!');
        redirect('admin/invoice');
    }

    public function ubah_status()
    {
        $id_invoice = $this->input->post('id_invoice');
        $status_pengiriman = $this->input->post('status_pengiriman');

        if ($id_invoice && $status_pengiriman) {
            $this->model_invoice->ubah_status_pengiriman($id_invoice, $status_pengiriman);
            $this->session->set_flashdata('success', 'Status pengiriman berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui status pengiriman.');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
