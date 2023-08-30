<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Restoran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Restoran_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','restoran/restoran_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Restoran_model->json();
    }

    public function read($id) 
    {
        $row = $this->Restoran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_restoran' => $row->id_restoran,
		'nama_restoran' => $row->nama_restoran,
		'deskripsi' => $row->deskripsi,
		'foto' => $row->foto,
	    );
            $this->template->load('template','restoran/restoran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('restoran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('restoran/create_action'),
	    'id_restoran' => set_value('id_restoran'),
	    'nama_restoran' => set_value('nama_restoran'),
	    'deskripsi' => set_value('deskripsi'),
	    'foto' => set_value('foto'),
	);
        $this->template->load('template','restoran/restoran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $link = "/assets/foto_resto/".$foto['file_name'];
            $data = array(
		'nama_restoran' => $this->input->post('nama_restoran',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'foto' =>  $link,
	    );

            $this->Restoran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('restoran'));
        }
    }
     function upload_foto(){
        $config['upload_path']          = './assets/foto_resto';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('foto');
        return $this->upload->data();
    }
    public function update($id) 
    {
        $row = $this->Restoran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('restoran/update_action'),
		'id_restoran' => set_value('id_restoran', $row->id_restoran),
		'nama_restoran' => set_value('nama_restoran', $row->nama_restoran),
		'deskripsi' => set_value('deskripsi', $row->deskripsi),
		'foto' => set_value('foto', $row->foto),
	    );
            $this->template->load('template','restoran/restoran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('restoran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_restoran', TRUE));
        } else {

        if($foto['file_name']==''){
                 $data = array(
		'nama_restoran' => $this->input->post('nama_restoran',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		
	    );
            }else{
                 $link = "/assets/foto_resto/".$foto['file_name'];
                 $data = array(
		'nama_restoran' => $this->input->post('nama_restoran',TRUE),
		'deskripsi' => $this->input->post('deskripsi',TRUE),
		'foto' => $link,
	    );
                
                
                // ubah foto profil yang aktif
                $this->session->set_userdata('images',$foto['file_name']);
            }


            
           

            $this->Restoran_model->update($this->input->post('id_restoran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('restoran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Restoran_model->get_by_id($id);

        if ($row) {
            $this->Restoran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('restoran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('restoran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_restoran', 'nama restoran', 'trim|required');
	$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
	
	$this->form_validation->set_rules('id_restoran', 'id_restoran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Restoran.php */
/* Location: ./application/controllers/Restoran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-18 19:35:46 */
/* http://harviacode.com */