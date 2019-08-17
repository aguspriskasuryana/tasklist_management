<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kontrol_rutin_harian_hk_mb1_model extends CI_Model
{
	
	function get_all_kontrol_rutin_harian_hk_mb1()
	{
		$this->db->select('*')->from('kontrol_rutin_harian_hk_mb1');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get($id_kontrol_rutin_harian_hk_mb1)
	{
		$this->load->database();
		$query = $this->db->get_where('kontrol_rutin_harian_hk_mb1',array('id_kontrol_rutin_harian_hk_mb1'=>$id_kontrol_rutin_harian_hk_mb1));
		return $query->row_array();
	}

	function getbytanggal($tanggal)
	{
		$this->load->database();
		$query = $this->db->get_where('kontrol_rutin_harian_hk_mb1',array('tanggal'=>$tanggal));
		return $query->row_array();
	}

	function get_tanggal_kontrol_rutin_harian_hk_mb1(){
		$this->db->select('tanggal');
		$this->db->distinct();
		$this->db->from('kontrol_rutin_harian_hk_mb1');
		$this->db->order_by('tanggal','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'tanggal'		=>$this->input->post('tanggal'),
			'jam'			=>$this->input->post('jam'),
			'lokasi_1'		=>$this->input->post('lokasi_1'),
			'lokasi_2'		=>$this->input->post('lokasi_2'),
			'lokasi_3'		=>$this->input->post('lokasi_3'),
			'lokasi_4'		=>$this->input->post('lokasi_4'),
			'lokasi_5'		=>$this->input->post('lokasi_5'),
			'id_koordinator'=>$this->input->post('id_koordinator'),
			'id_supervisor_bks'	=>$this->input->post('id_supervisor_bks'),
			'id_supervisor'	=>$this->input->post('id_supervisor')

		);

		$simpan = $this->db->insert('kontrol_rutin_harian_hk_mb1',$simpan_data);
		return $simpan;
		
	}

	function generate($tanggal, $jam )
	{
		$simpan_data=array
		(
			'tanggal'		=>$tanggal,
			'jam'			=>$jam

		);

		$simpan = $this->db->insert('kontrol_rutin_harian_hk_mb1',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
			'tanggal'		=>$this->input->post('tanggal'),
			'jam'			=>$this->input->post('jam'),
			'lokasi_1'		=>$this->input->post('lokasi_1'),
			'lokasi_2'		=>$this->input->post('lokasi_2'),
			'lokasi_3'		=>$this->input->post('lokasi_3'),
			'lokasi_4'		=>$this->input->post('lokasi_4'),
			'lokasi_5'		=>$this->input->post('lokasi_5'),
			'id_koordinator'=>$this->input->post('id_koordinator'),
			'id_supervisor_bks'	=>$this->input->post('id_supervisor_bks'),
			'id_supervisor'	=>$this->input->post('id_supervisor')
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$this->input->post('id_kontrol_rutin_harian_hk_mb1'));
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function update_lokasi_1($id_kontrol_rutin_harian_hk_mb1,$id)
        {
            $data=array(
			'lokasi_1'		=>$id
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$id_kontrol_rutin_harian_hk_mb1);
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function update_lokasi_2($id_kontrol_rutin_harian_hk_mb1,$id)
        {
            $data=array(
			'lokasi_2'		=>$id
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$id_kontrol_rutin_harian_hk_mb1);
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function update_lokasi_3($id_kontrol_rutin_harian_hk_mb1,$id)
        {
            $data=array(
			'lokasi_3'		=>$id
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$id_kontrol_rutin_harian_hk_mb1);
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function update_lokasi_4($id_kontrol_rutin_harian_hk_mb1,$id)
        {
            $data=array(
			'lokasi_4'		=>$id
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$id_kontrol_rutin_harian_hk_mb1);
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function update_lokasi_5($id_kontrol_rutin_harian_hk_mb1,$id)
        {
            $data=array(
			'lokasi_5'		=>$id
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$id_kontrol_rutin_harian_hk_mb1);
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function update_id_petugas($id_kontrol_rutin_harian_hk_mb1,$id)
        {
            $data=array(
			'id_petugas'	=>$id
			);
				$this->db->where('id_kontrol_rutin_harian_hk_mb1',$id_kontrol_rutin_harian_hk_mb1);
                $this->db->update('kontrol_rutin_harian_hk_mb1', $data);
        }

    function hapus($id_kontrol_rutin_harian_hk_mb1){
	$this->db->query("delete from kontrol_rutin_harian_hk_mb1 where id_kontrol_rutin_harian_hk_mb1 = $id_kontrol_rutin_harian_hk_mb1");
	}	
	
	
	
}
