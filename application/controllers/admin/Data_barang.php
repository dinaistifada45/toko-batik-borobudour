<?php 

class Data_barang extends CI_Controller {

    public function index() {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi() {
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');
        $gambar     = $_FILES['gambar']['name'];

        if ($gambar != '') {
            $config['upload_path']   = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar gagal diupload!";
                return;
            } else {
                $gambar_brg = $this->upload->data('file_name');
            }
        } else {
            $gambar_brg = 'default.png'; // Gambar default jika tidak diupload
        }

        $data = array(
            'nama_brg'   => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'stok'       => $stok,
            'gambar'     => $gambar_brg
        );

        $this->model_barang->tambah_barang($data, 'tb_barang'); 
        redirect('admin/data_barang/index');
    }

    public function edit($id) {
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update() {
        $id         = $this->input->post('id_brg');
        $nama_brg   = $this->input->post('nama_brg');
        $keterangan = $this->input->post('keterangan');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $stok       = $this->input->post('stok');

        $gambar_lama = $this->input->post('gambar_lama');
        $gambar      = $_FILES['gambar']['name'];

        if ($gambar != '') {
            $config['upload_path']   = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $gambar_baru = $this->upload->data('file_name');
            } else {
                echo "Upload gambar gagal!";
                return;
            }
        } else {
            $gambar_baru = $gambar_lama;
        }

        $data = array(
            'nama_brg'   => $nama_brg,
            'keterangan' => $keterangan,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'stok'       => $stok,
            'gambar'     => $gambar_baru
        );

        $where = array('id_brg' => $id);
        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id) {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}
