<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gangguan_model extends CI_Model
{
	
	function get_all_gangguanxx()
	{
		$this->db->select('*')->from('gangguan');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_gangguan()
	{
		$this->db->select('k.*,mu.nama_lengkap,mu.username');
		$this->db->from('gangguan as k');
		$this->db->join('master_user as mu','mu.id_user = k.id_pelapor','left');
		//$this->db->order_by('mu.id_team','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get($id_gangguan)
	{
		$this->load->database();
		$query = $this->db->get_where('gangguan',array('id_gangguan'=>$id_gangguan));
		return $query->row_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'tanggal_laporan'	=>$this->input->post('tanggal_laporan'),
			'tanggal_lanjutan'	=>$this->input->post('tanggal_lanjutan'),
			'id_pelapor'		=>$this->input->post('id_pelapor'),
			'kejadian'			=>$this->input->post('kejadian'),
			'lanjutan'			=>$this->input->post('lanjutan'),
			'lokasi'			=>$this->input->post('lokasi'),
			'status'			=>$this->input->post('status')
		);

		$simpan = $this->db->insert('gangguan',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
				'tanggal_laporan'	=>$this->input->post('tanggal_laporan'),
				'tanggal_lanjutan'	=>$this->input->post('tanggal_lanjutan'),
				'id_pelapor'		=>$this->input->post('id_pelapor'),
				'kejadian'			=>$this->input->post('kejadian'),
				'lanjutan'			=>$this->input->post('lanjutan'),
				'lokasi'			=>$this->input->post('lokasi'),
				'status'			=>$this->input->post('status')
			);
				$this->db->where('id_gangguan',$this->input->post('id_gangguan'));
                $this->db->update('gangguan', $data);
        }

    function hapus($id_gangguan){
	$this->db->query("delete from gangguan where id_gangguan = $id_gangguan");
	}	
	
	
	
}
