<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class rkap_model extends CI_Model
{
	

	function get($id_rkap)
	{
		$this->load->database();
		$query = $this->db->get_where('form_rkap',array('id_rkap'=>$id_rkap));
		return $query->row_array();
	}
	function get_all_rkap()
	{
		$this->db->select('pr.nama_gl,k.*,mu.nama_lengkap,mu.username');
		$this->db->from('form_rkap as k');
		$this->db->join('master_user as mu','mu.id_user = k.user_akses','left');
		$this->db->join('par_rek as pr','pr.no_rek = k.no_rek','left');
		//$this->db->order_by('mu.id_team','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function simpan_data($id_user)
	{

		$simpan_data=array
		(
			'no_rek'		=>$this->input->post('no_reks'),
			'usulan_rkap'	=>$this->input->post('usulan_rkap'),
			'tahun'			=>$this->input->post('tahun'),
			'user_akses'	=>$id_user
		);

		$simpan = $this->db->insert('form_rkap',$simpan_data);
		return $simpan;
		
	}
	function update_data($id_user)
	
        {
            $data=array(
			'no_rek'		=>$this->input->post('no_rek'),
			'usulan_rkap'	=>$this->input->post('usulan_rkap'),
			'tahun'			=>$this->input->post('tahun'),
			'user_akses'	=>$id_user
			);
				$this->db->where('id_rkap',$this->input->post('id_rkap'));
                $this->db->update('form_rkap', $data);
        }

    function hapus($id_rkap){
		$this->db->query("delete from form_rkap where id_rkap = $id_rkap");
	}	
	
	
	
}
