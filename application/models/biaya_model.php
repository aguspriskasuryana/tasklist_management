<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Biaya_model extends CI_Model
{
	
	function get_all_biaya()
	{
		$this->db->select('k.*,mu.nama_lengkap,mu.username,pr.*');
		$this->db->from('form_biaya as k');
		$this->db->join('master_user as mu','mu.id_user = k.user_akses','left');
		$this->db->join('par_rek as pr','pr.no_rek = k.no_reks','left');
		//$this->db->order_by('mu.id_team','desc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_all_biaya_excel($tgl)
	{
		$this->db->select('k.*,mu.nama_lengkap,mu.username,pr.*');
		$this->db->from('form_biaya as k');
		$this->db->join('master_user as mu','mu.id_user = k.user_akses','left');
		$this->db->join('par_rek as pr','pr.no_rek = k.no_reks','left');
		$this->db->where('k.tanggal like "%'.$tgl.'%"');
		$this->db->order_by('k.no_reks,k.tanggal','asc');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_all_par_rek()
	{
		$this->db->select('*')->from('par_rek');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get($id_biaya)
	{
		$this->load->database();
		$query = $this->db->get_where('form_biaya',array('id_biaya'=>$id_biaya));
		return $query->row_array();
	}

	function simpan_data()
	{

		$simpan_data=array
		(
			'user_akses'	=>$this->input->post('user_akses'),
			'no_reks'		=>$this->input->post('no_reks'),
			'keterangans'	=>$this->input->post('keterangans'),
			'jumlah'		=>$this->input->post('jumlah'),
			'tanggal'		=>$this->input->post('tanggal')
		);

		$simpan = $this->db->insert('form_biaya',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'user_akses'	=>$this->input->post('user_akses'),
			'no_reks'		=>$this->input->post('no_reks'),
			'keterangans'	=>$this->input->post('keterangans'),
			'jumlah'		=>$this->input->post('jumlah'),
			'tanggal'		=>$this->input->post('tanggal')
			);
				$this->db->where('id_biaya',$this->input->post('id_biaya'));
                $this->db->update('form_biaya', $data);
        }

    function hapus($id_biaya){
		$this->db->query("delete from form_biaya where id_biaya = $id_biaya");
	}	
	
}
