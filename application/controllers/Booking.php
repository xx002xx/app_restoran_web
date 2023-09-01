<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Booking_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','booking/booking_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Booking_model->json();
    }

    public function read($id) 
    {
        $row = $this->Booking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_book' => $row->id_book,
		'email' => $row->email,
		'tanggal' => $row->tanggal,
		'nomor_booking' => $row->nomor_booking,
		'meja' => $row->meja,
		'id_restoran' => $row->id_restoran,
		'status' => $row->status,
	    );
            $this->template->load('template','booking/booking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('booking/create_action'),
	    'id_book' => set_value('id_book'),
	    'email' => set_value('email'),
	    'tanggal' => set_value('tanggal'),
	    'nomor_booking' => set_value('nomor_booking'),
	    'meja' => set_value('meja'),
	    'id_restoran' => set_value('id_restoran'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','booking/booking_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nomor_booking' => $this->input->post('nomor_booking',TRUE),
		'meja' => $this->input->post('meja',TRUE),
		'id_restoran' => $this->input->post('id_restoran',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Booking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('booking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('booking/update_action'),
		'id_book' => set_value('id_book', $row->id_book),
		'email' => set_value('email', $row->email),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'nomor_booking' => set_value('nomor_booking', $row->nomor_booking),
		'meja' => set_value('meja', $row->meja),
		'id_restoran' => set_value('id_restoran', $row->id_restoran),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','booking/booking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_book', TRUE));
        } else {
            $data = array(
		'email' => $this->input->post('email',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'nomor_booking' => $this->input->post('nomor_booking',TRUE),
		'meja' => $this->input->post('meja',TRUE),
		'id_restoran' => $this->input->post('id_restoran',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Booking_model->update($this->input->post('id_book', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('booking'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $this->Booking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('booking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('nomor_booking', 'nomor booking', 'trim|required');
	$this->form_validation->set_rules('meja', 'meja', 'trim|required');
	$this->form_validation->set_rules('id_restoran', 'id restoran', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_book', 'id_book', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-09-01 21:05:55 */
/* http://harviacode.com */