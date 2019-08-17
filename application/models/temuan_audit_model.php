<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Temuan_audit_model extends CI_Model
{
	
	function get_all_temuan_audit()
	{
		$this->db->select('*')->from('temuan_audit');

		$this->db->order_by('id_temuan_audit','desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_temuan_audit)
	{
		$this->load->database();
		$query = $this->db->get_where('temuan_audit',array('id_temuan_audit'=>$id_temuan_audit));
		return $query->row_array();
	}

	function simpan_data($id_user)
	{

		$simpan_data=array
		(
			'tema_temuan'		=>$this->input->post('tema_temuan'),
			'judul_temuan'		=>$this->input->post('judul_temuan'),
			'deskripsi'			=>$this->input->post('deskripsi'),
			'kategori_temuan'	=>$this->input->post('kategori_temuan'),
			'rekomendasi'		=>$this->input->post('rekomendasi'),
			'batas_waktu_rpm'	=>$this->input->post('batas_waktu_rpm'),
			'realisasi'			=>$this->input->post('realisasi'),
			'status'			=>$this->input->post('status'),
			'author'			=>$id_user
		);

		$simpan = $this->db->insert('temuan_audit',$simpan_data);
		return $simpan;
		
	}
	function simpan_data_tlm($id_user)
	{

		$simpan_data=array
		(
			'id_temuan_audit'		=>$this->input->post('id_temuan_audit_modal'),
			'tindak_lanjut_temuan'	=>$this->input->post('tindak_lanjut_temuan'),
			'author'				=>$id_user
		);

		$simpan = $this->db->insert('temuan_tlm',$simpan_data);
		return $simpan;
		
	}

	function get_all_tlm($id_temuan_audit)
	{

		$this->db->select('*')->from('temuan_tlm');

		$this->db->where('id_temuan_audit = "'.$id_temuan_audit.'"');
		
		$query = $this->db->get();
		//var_dump($query->result_array());
		return $query->result_array();
	}
	
	function update_data($id_user)
	
        {
            $data=array(
			'tema_temuan'		=>$this->input->post('tema_temuan'),
			'judul_temuan'		=>$this->input->post('judul_temuan'),
			'deskripsi'			=>$this->input->post('deskripsi'),
			'kategori_temuan'	=>$this->input->post('kategori_temuan'),
			'rekomendasi'		=>$this->input->post('rekomendasi'),
			'batas_waktu_rpm'	=>$this->input->post('batas_waktu_rpm'),
			'realisasi'			=>$this->input->post('realisasi'),
			'status'			=>$this->input->post('status'),
			'author'	=>$id_user
			);
				$this->db->where('id_temuan_audit',$this->input->post('id_temuan_audit'));
                $this->db->update('temuan_audit', $data);
        }

    function update_data_file($id_temuan_audit,$file_name)
	
        {
            $data=array(
			'file'			=>$file_name
			);
				$this->db->where('id_temuan_audit',$id_temuan_audit);
                $this->db->update('temuan_audit', $data);
        }

    function hapus($id_temuan_audit){
		$this->db->query("delete from temuan_audit where id_temuan_audit = $id_temuan_audit");
	}	
	
	function hapustlm($id_temuan_tlm){
		$this->db->query("delete from temuan_tlm where id_temuan_tlm = $id_temuan_tlm");
	}	
	function get_maxid(){

		$this->db->select('MAX(id_temuan_audit) as id_temuan_audit');
		$this->db->from('temuan_audit');
		$result = $this->db->get();
		//var_dump($day);
		return $result->result_array();
	}
}
