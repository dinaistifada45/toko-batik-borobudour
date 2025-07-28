<?php

class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');

        $nama    = $this->input->post('nama');
        $alamat  = $this->input->post('alamat');
        $no_telp = $this->input->post('no_telp');
        $jasa    = $this->input->post('jasa_pengiriman');
        $bank    = $this->input->post('bank');

        $tgl_pesan   = date('Y-m-d H:i:s');
        $batas_bayar = date('Y-m-d H:i:s', strtotime('+1 day'));

        $invoice = array(
            'nama'           => $nama,
            'alamat'         => $alamat,
            'no_telp'        => $no_telp,
            'jasa_pengiriman'=> $jasa,
            'bank'           => $bank,
            'tgl_pesan'      => $tgl_pesan,
            'batas_bayar'    => $batas_bayar
        );

        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg'     => $item['id'],
                'nama_brg'   => $item['name'],
                'jumlah'     => $item['qty'],
                'harga'      => $item['price'],
            );
            $this->db->insert('tb_pesanan', $data);
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
        $result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
        return $result->num_rows() > 0 ? $result->row() : false;
    }

    public function ambil_id_pesanan($id_invoice)
    {
        $result = $this->db->where('id_invoice', $id_invoice)->get('tb_pesanan');
        return $result->num_rows() > 0 ? $result->result() : false;
    }

    public function update_bukti($id_invoice, $file_name)
    {
        $this->db->where('id', $id_invoice);
        $this->db->update('tb_invoice', ['bukti_pembayaran' => $file_name]);
    }
}
