<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Produk_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','produk/produk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Produk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_produk' => $row->id_produk,
		'kode_produk' => $row->kode_produk,
		'nama_produk' => $row->nama_produk,
		'id_kategori' => $row->id_kategori,
		'harga' => $row->harga,
		'foto_produk' => $row->foto_produk,
		'id_restoran' => $row->id_restoran,
	    );
            $this->template->load('template','produk/produk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('produk/create_action'),
	    'id_produk' => set_value('id_produk'),
	    'kode_produk' => set_value('kode_produk'),
	    'nama_produk' => set_value('nama_produk'),
	    'id_kategori' => set_value('id_kategori'),
	    'harga' => set_value('harga'),
	    'foto_produk' => set_value('foto_produk'),
	    'id_restoran' => set_value('id_restoran'),
	);
        $this->template->load('template','produk/produk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
         $foto = $this->upload_foto();
        $link = "/app_restoran/assets/foto_produk/".$foto['file_name'];
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_produk' => $this->input->post('kode_produk',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'foto_produk' => $link,
		'id_restoran' => $this->input->post('id_restoran',TRUE),
	    );

            $this->Produk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('produk'));
        }
    }
    function upload_foto(){
        $config['upload_path']          = './assets/foto_produk';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_produk');
        return $this->upload->data();
    }
    public function update($id) 
    {
        $row = $this->Produk_model->get_by_id($id);
       
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('produk/update_action'),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'kode_produk' => set_value('kode_produk', $row->kode_produk),
		'nama_produk' => set_value('nama_produk', $row->nama_produk),
		'id_kategori' => set_value('id_kategori', $row->id_kategori),
		'harga' => set_value('harga', $row->harga),
		'foto_produk' => set_value('foto_produk', $row->foto_produk),
		'id_restoran' => set_value('id_restoran', $row->id_restoran),
	    );
            $this->template->load('template','produk/produk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        $link = "/app_restoran/assets/foto_produk/".$foto['file_name'];
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {

             if($foto['file_name']==''){
        $data = array(
        'kode_produk' => $this->input->post('kode_produk',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'id_restoran' => $this->input->post('id_restoran',TRUE),
            );
             }else{
             $link = base_url()."assets/foto_produk/".$foto['file_name'];
            $data = array(
		'kode_produk' => $this->input->post('kode_produk',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'id_kategori' => $this->input->post('id_kategori',TRUE),
		'harga' => $this->input->post('harga',TRUE),
		'foto_produk' => $link,
		'id_restoran' => $this->input->post('id_restoran',TRUE),
	    );
    }

            $this->Produk_model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_model->get_by_id($id);

        if ($row) {
            $this->Produk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_produk', 'kode produk', 'trim|required');
	$this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
	$this->form_validation->set_rules('harga', 'harga', 'trim|required');
	$this->form_validation->set_rules('id_restoran', 'id restoran', 'trim|required');

	$this->form_validation->set_rules('id_produk', 'id_produk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 20:48:10 */
/* http://harviacode.com */