<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Risalah_model extends CI_Model
{
	
	function get_all_risalah()
	{
		$this->db->select('*')->from('risalah');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_risalah)
	{
		$this->load->database();
		$query = $this->db->get_where('risalah',array('id_risalah'=>$id_risalah));
		return $query->row_array();
	}

	function simpan_data($id_user)
	{

		$simpan_data=array
		(
			'tanggal'	=>$this->input->post('tanggal'),
			'data'		=>$this->input->post('data'),
			'judul'		=>$this->input->post('judul'),
			'author'	=>$id_user
		);

		$simpan = $this->db->insert('risalah',$simpan_data);
		return $simpan;
		
	}
	function update_data($id_user)
	
        {
            $data=array(
			'tanggal'	=>$this->input->post('tanggal'),
			'data'		=>$this->input->post('data'),
			'judul'		=>$this->input->post('judul'),
			'author'	=>$id_user
			);
				$this->db->where('id_risalah',$this->input->post('id_risalah'));
                $this->db->update('risalah', $data);
        }

    function hapus($id_risalah){
		$this->db->query("delete from risalah where id_risalah = $id_risalah");
	}	
	
	
	
}
