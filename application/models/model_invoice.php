<?php

class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'nama'               => $this->input->post('nama'),
            'alamat'             => $this->input->post('alamat'),
            'no_telp'            => $this->input->post('no_telp'),
            'jasa_pengiriman'    => $this->input->post('jasa_pengiriman'),
            'bank'               => $this->input->post('bank'),
            'tgl_pesan'          => date('Y-m-d H:i:s'),
            'batas_bayar'        => date('Y-m-d H:i:s', strtotime('+1 day')),
            'status_pengiriman'  => 'Belum Dikirim',
            'status_pembayaran'  => 'Belum Dikonfirmasi'
        ];

        $this->db->insert('tb_invoice', $data);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $this->db->insert('tb_pesanan', [
                'id_invoice' => $id_invoice,
                'id_brg'     => $item['id'],
                'nama_brg'   => $item['name'],
                'jumlah'     => $item['qty'],
                'harga'      => $item['price'],
            ]);
        }

        return $id_invoice;
    }

    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        return $result->num_rows() > 0 ? $result->result() : false;
    }

    public function ambil_id_invoice($id_invoice)
    {
        return $this->db->where('id', $id_invoice)->get('tb_invoice')->row();
    }

    public function ambil_id_pesanan($id_invoice)
    {
        return $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan')->result();
    }

    public function update_bukti($id_invoice, $file_name)
    {
        $this->db->where('id', $id_invoice);
        $this->db->update('tb_invoice', ['bukti_pembayaran' => $file_name]);
    }

    public function konfirmasi_pembayaran($id_invoice)
    {
        $this->db->where('id', $id_invoice);
        $this->db->update('tb_invoice', ['status_pembayaran' => 'Dikonfirmasi']);
    }

    public function ubah_status_pengiriman($id_invoice, $status)
    {
        $this->db->where('id', $id_invoice);
        $this->db->update('tb_invoice', ['status_pengiriman' => $status]);
    }
}
