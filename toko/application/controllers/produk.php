<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Produk extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kategori
    function index_get() {
        $id = $this->get('id_produk');
        if ($id == '') {
            $produk = $this->db->get('produk')->result();
        } else {
            $this->db->where('id_kategori', $id);
            $data= $this->db->get('produk')->result();
        }
        $this->response($produk, 200);
    }
    //menambah data

    //untuk memperbahauri

    //Menghapus data


}
?>