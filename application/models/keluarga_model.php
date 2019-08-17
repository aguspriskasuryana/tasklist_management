<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keluarga_model extends CI_Model
{
	
	function get_all_keluarga()
	{
		$this->db->select('k.*,mu.nama_lengkap,mu.username');
		$this->db->from('keluarga as k');
		$this->db->join('master_user as mu','mu.id_user = k.id_user','left');
		$this->db->order_by('mu.id_team','desc');
		$result = $this->db->get();
		return $result->result_array();
	}
	function get($id_keluarga)
	{
		$this->load->database();
		$query = $this->db->get_where('keluarga',array('id_keluarga'=>$id_keluarga));
		return $query->row_array();
	}



	function simpan_data()
	{

		$simpan_data=array
		(
			'id_user'		=>$this->input->post('id_user'),
			'hubungan'		=>$this->input->post('hubungan'),
			'nama'			=>$this->input->post('nama'),
			'alamat'		=>$this->input->post('alamat'),
			'no_tlp'		=>$this->input->post('no_tlp')
		);

		$simpan = $this->db->insert('keluarga',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'id_user'		=>$this->input->post('id_user'),
			'hubungan'		=>$this->input->post('hubungan'),
			'nama'			=>$this->input->post('nama'),
			'alamat'		=>$this->input->post('alamat'),
			'no_tlp'		=>$this->input->post('no_tlp')
			);
				$this->db->where('id_keluarga',$this->input->post('id_keluarga'));
                $this->db->update('keluarga', $data);
        }

    function hapus($id_keluarga){
		$this->db->query("delete from keluarga where id_keluarga = $id_keluarga");
	}	
	
}
