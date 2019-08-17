<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
	
	function get_all_company()
	{
		$this->db->select('*')->from('master_company');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get($id_company)
	{
		$this->load->database();
		$query = $this->db->get_where('master_company',array('id_company'=>$id_company));
		return $query->row_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'id_company'		=>$this->input->post(''),
			'nama_company'			=>$this->input->post('nama_company')

		);

		$simpan = $this->db->insert('master_company',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
				'nama_company'			=>$this->input->post('nama_company')
			);
				$this->db->where('id_company',$this->input->post('id_company'));
                $this->db->update('master_company', $data);
        }

    function hapus($id_company){
	$this->db->query("delete from master_company where id_company = $id_company");
	}	
	
	
	
}
