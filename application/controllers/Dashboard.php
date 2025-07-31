<?php

class Dashboard extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->model('model_invoice');
        $this->load->library('cart');
        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_ke_keranjang($id)
    {
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }

        $barang = $this->model_barang->find($id);
        $data = array(
            'id'    => $barang->id_brg,
            'qty'   => 1,
            'price' => $barang->harga,
            'name'  => $barang->nama_brg
        );

        $this->cart->insert($data);
        redirect('dashboard');
    }

    public function detail_keranjang()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('keranjang');
        $this->load->view('templates/footer');
    }

    public function hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('dashboard/index');
    }

    public function pembayaran()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pembayaran');
        $this->load->view('templates/footer');
    }

public function proses_pesanan()
{
    $id_invoice = $this->model_invoice->index();

    if ($id_invoice) {
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
        $this->cart->destroy();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('proses_pesanan', $data);
        $this->load->view('templates/footer');
    } else {
        echo "Maaf, pesanan Anda gagal diproses!";
    }
}


public function upload_bukti()
{
    $invoice_id = $this->input->post('invoice_id');

    if (!$invoice_id) {
        show_error("ID invoice tidak ditemukan!", 404);
    }

    $config['upload_path']   = './uploads/bukti';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['max_size']      = 2048;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('bukti')) {
        $this->session->set_flashdata('upload_error', $this->upload->display_errors());
    } else {
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $this->model_invoice->update_bukti($invoice_id, $file_name);
        $this->session->set_flashdata('upload_success', 'Bukti pembayaran berhasil diupload.');
    }

    redirect('dashboard/invoice/' . $invoice_id);
}




    public function detail($id_brg)
    {
        $data['barang'] = $this->model_barang->detail_brg($id_brg);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('detail_barang', $data);
        $this->load->view('templates/footer');
    }


    public function invoice($id_invoice = null)
{
    if (!$id_invoice) {
        show_error('ID invoice tidak diberikan!', 404);
        return;
    }

    $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_invoice);
    $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_invoice);
    
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('invoice', $data);
    $this->load->view('templates/footer');
}

}
