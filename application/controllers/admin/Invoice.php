<?php

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Pastikan model diload
        $this->load->model('model_invoice');

        // Opsional: Cek apakah user admin
        if ($this->session->userdata('role_id') != 1) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['invoice'] = $this->model_invoice->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data); // perbaikan path
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_invoice)
    {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_invoice', $data);
        $this->load->view('templates_admin/footer');
    }
}

public function upload_bukti()
{
    // Ambil ID invoice terakhir (bisa juga dari session kalau perlu spesifik user)
    $invoice_id = $this->db->insert_id(); // atau ambil dari POST jika disediakan
    $invoice_id = $this->input->post('invoice_id');

    $config['upload_path'] = './uploads/bukti/';
    $config['allowed_types'] = 'jpg|png|jpeg|pdf';
    $config['max_size'] = 2048;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('bukti')) {
        $error = $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
        redirect('invoice');
    } else {
        $data = $this->upload->data();
        $bukti = $data['file_name'];

        // Simpan ke database
        $this->db->where('id', $invoice_id);
        $this->db->update('tb_invoice', ['bukti_pembayaran' => $bukti]);

        $this->session->set_flashdata('success', 'Bukti pembayaran berhasil diupload.');
        redirect('invoice');
    }
}
