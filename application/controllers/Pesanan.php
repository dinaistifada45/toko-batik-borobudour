<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->database();
        $this->load->model('Model_invoice'); // kalau pakai model
    }

    public function upload_bukti() {
        $config['upload_path'] = './uploads/bukti/';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf';
        $config['max_size'] = 2048;

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('bukti')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_gagal', $error);
        } else {
            $data = $this->upload->data();

            // Simpan ke database, contoh:
            $bukti = $data['file_name'];
            $invoice_id = $this->input->post('invoice_id');

            $this->db->where('id', $invoice_id);
            $this->db->update('tb_invoice', ['bukti_pembayaran' => $bukti]);

            $this->load->view('upload_sukses');
        }
    }
}
