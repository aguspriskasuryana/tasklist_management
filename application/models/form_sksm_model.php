<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_sksm_model extends CI_Model
{
	
	function get_all_form_sksm()
	{
		//$timeYear = date('Y');
		//$this->db->select('*')->from('form_sksm')->where('time_now like "%'.$timeYear.'%"');
		$this->db->select('*')->from('form_sksm');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_form_sksm)
	{
		$this->load->database();
		$query = $this->db->get_where('form_sksm',array('id_form_sksm'=>$id_form_sksm));
		return $query->row_array();
	}

	function get_new_no_sk($tahun)
	{
		$query = "select MAX(CAST( no_sk AS DECIMAL( 10, 0 ))) as count FROM `form_sksm` WHERE `form_sksm`.`tanggal_surat` like '%".$tahun."%' ";
		//var_dump($query);
		$result = $this->db->query($query);
		return $result->result_array();
	}
	

	function simpan_data()
	{

		$id = $this->session->userdata('user_data');
		$simpan_data=array
		(
			'type'		 		=>$this->input->post('type'),
			'bendel'			=>$this->input->post('bendel'),
			'pengirim_divisi'	=>$this->input->post('pengirim_divisi'),
			'pengirim_uker'		=>$this->input->post('pengirim_uker'),
			'tujuan_divisi'		=>$this->input->post('tujuan_divisi'),
			'tanggal_dit'		=>$this->input->post('tanggal_dit'),
			'tanggal_surat'		=>$this->input->post('tanggal_surat'),
			'no_sk'				=>$this->input->post('no_sk'),
			'no_surat'			=>$this->input->post('no_surat'),
			'ket'				=>$this->input->post('ket'),
			'prihal'			=>$this->input->post('prihal'),
			'catatan'			=>$this->input->post('catatan'),
			'user_akses'		=>$id['id_user']
		);

		$simpan = $this->db->insert('form_sksm',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {

		$id = $this->session->userdata('user_data');
            $data=array(
           	'type'		 		=>$this->input->post('type'),
			'bendel'			=>$this->input->post('bendel'),
			'pengirim_divisi'	=>$this->input->post('pengirim_divisi'),
			'pengirim_uker'		=>$this->input->post('pengirim_uker'),
			'tujuan_divisi'		=>$this->input->post('tujuan_divisi'),
			'tanggal_dit'		=>$this->input->post('tanggal_dit'),
			'tanggal_surat'		=>$this->input->post('tanggal_surat'),
			'no_sk'				=>$this->input->post('no_sk'),
			'no_surat'			=>$this->input->post('no_surat'),
			'ket'				=>$this->input->post('ket'),
			'prihal'			=>$this->input->post('prihal'),
			'catatan'			=>$this->input->post('catatan'),
			'user_akses'		=>$id['id_user']
			);
				$this->db->where('id_form_sksm',$this->input->post('id_form_sksm'));
                $this->db->update('form_sksm', $data);
        }

    function hapus($id_form_sksm){
		$this->db->query("delete from form_sksm where id_form_sksm = $id_form_sksm");
	}	
	
}
