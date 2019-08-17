<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Phonebook_model extends CI_Model
{
	
	function get_all_phonebook()
	{
		$this->db->select('*')->from('phonebook');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_phonebook)
	{
		$this->load->database();
		$query = $this->db->get_where('phonebook',array('id_phonebook'=>$id_phonebook));
		return $query->row_array();
	}

	function simpan_data()
	{

		$simpan_data=array
		(
			'nama'			=>$this->input->post('nama'),
			'alamat'		=>$this->input->post('alamat'),
			'no_tlp'		=>$this->input->post('no_tlp'),
			'instansi'		=>$this->input->post('instansi'),
			'ket'			=>$this->input->post('ket'),
			'email'			=>$this->input->post('email'),
			'time_update'	=>$this->input->post('time_update')
		);

		$simpan = $this->db->insert('phonebook',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'nama'			=>$this->input->post('nama'),
			'alamat'		=>$this->input->post('alamat'),
			'no_tlp'		=>$this->input->post('no_tlp'),
			'instansi'		=>$this->input->post('instansi'),
			'ket'			=>$this->input->post('ket'),
			'email'			=>$this->input->post('email'),
			'time_update'	=>$this->input->post('time_update')
			);
				$this->db->where('id_phonebook',$this->input->post('id_phonebook'));
                $this->db->update('phonebook', $data);
        }

    function hapus($id_phonebook){
		$this->db->query("delete from phonebook where id_phonebook = $id_phonebook");
	}	
	
}
