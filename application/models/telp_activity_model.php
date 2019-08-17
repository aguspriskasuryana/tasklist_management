<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Telp_activity_model extends CI_Model
{
	
	function get_all_telp_activity($datenow)
	{
		//$timeYear = date('Y');
		$this->db->select('*')->from('telp_activity')->where('tanggal like "%'.$datenow.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_telp_activity)
	{
		$this->load->database();
		$query = $this->db->get_where('telp_activity',array('id_telp_activity'=>$id_telp_activity));
		return $query->row_array();
	}

	function simpan_data()
	{

		$simpan_data=array
		(
			'tanggal'		 	=>$this->input->post('tanggal'),
			'nama_pemohon'		=>$this->input->post('nama_pemohon'),
			'no_pesawat'		=>$this->input->post('no_pesawat'),
			'asal_penelpon'		=>$this->input->post('asal_penelpon'),
			'nama_dituju'		=>$this->input->post('nama_dituju'),
			'instansi'			=>$this->input->post('instansi'),
			'no_tlpn_tujuan'	=>$this->input->post('no_tlpn_tujuan'),
			'keperluan'			=>$this->input->post('keperluan'),
			'izin'				=>$this->input->post('izin'),
			'status'			=>$this->input->post('status'),
			'jam'				=>$this->input->post('jam'),
			'keterangan'		=>$this->input->post('keterangan'),
			'M_K'				=>$this->input->post('M_K'),
			'user_akses'		=>$this->input->post('user_akses')
		);

		$simpan = $this->db->insert('telp_activity',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'tanggal'		 	=>$this->input->post('tanggal'),
			'nama_pemohon'		=>$this->input->post('nama_pemohon'),
			'no_pesawat'		=>$this->input->post('no_pesawat'),
			'asal_penelpon'		=>$this->input->post('asal_penelpon'),
			'nama_dituju'		=>$this->input->post('nama_dituju'),
			'instansi'			=>$this->input->post('instansi'),
			'no_tlpn_tujuan'	=>$this->input->post('no_tlpn_tujuan'),
			'keperluan'			=>$this->input->post('keperluan'),
			'izin'				=>$this->input->post('izin'),
			'status'			=>$this->input->post('status'),
			'jam'				=>$this->input->post('jam'),
			'keterangan'		=>$this->input->post('keterangan'),
			'M_K'				=>$this->input->post('M_K'),
			'user_akses'		=>$this->input->post('user_akses')
			);
				$this->db->where('id_telp_activity',$this->input->post('id_telp_activity'));
                $this->db->update('telp_activity', $data);
        }

    function hapus($id_telp_activity){
		$this->db->query("delete from telp_activity where id_telp_activity = $id_telp_activity");
	}	
	
}
