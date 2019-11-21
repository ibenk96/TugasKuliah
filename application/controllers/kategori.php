<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Kategori extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kategori
    function index_get() {
        $id = $this->get('id_kategori');
        if ($id == '') {
            $kategori = $this->db->get('kategori')->result();
        } else {
            $this->db->where('id_kategori', $id);
            $data= $this->db->get('kategori')->result();
        }
        $this->response($kategori, 200);
    }
    //menambah data
    function index_post() {
        $data = array(
                    'id_kategori'           => $this->post('id_kategori'),
                    'nama_kategori'			=> $this->post('nama_kategori'),
                    'slug_kategori'         => $this->post('slug_kategori'),
                    'urutan'				=> $this->post('urutan')
         );
        $insert = $this->db->insert('kategori', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //untuk memperbahauri
    function index_put() {
        $id = $this->put('id_kategori');
        $data = array(
                    'id_kategori'           => $this->post('id_kategori'),
                    'nama_kategori'			=> $this->post('nama_kategori'),
                    'slug_kategori'         => $this->post('slug_kategori'),
                    'urutan'				=> $this->post('urutan')
         );
        $this->db->where('id_kategori', $id);
        $update = $this->db->update('kategori', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
    //Menghapus data
    function index_delete() {
        $id = $this->delete('id_kategori');
        $this->db->where('id_kategori', $id);
        $delete = $this->db->delete('kategori');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>