<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perangkat_model extends CI_Model
{

	function get_all_perangkat_per_area($area)
	{
		$this->db->select('*');
		$this->db->from('detil_perangkat as d');
		$this->db->join('perangkat as p','p.id_perangkat = d.id_perangkat','left');
		$this->db->join('jenis_perangkat as j','j.id_jenis_perangkat = p.id_jenis_perangkat','left');
		$this->db->join('ruangan as r','r.id_ruangan = p.id_ruangan','left');
		$this->db->where('r.id_area',$area);
		$this->db->order_by('j.nama_perangkat','asc');
		$this->db->group_by('d.id_perangkat');	
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_avail_perperangkat_perarea($perangkat,$area)
	{
		$this->db->select('sum(d.status_availability) as sum_avail,count(d.status_availability) as record');
		$this->db->from('detil_perangkat as d');
		$this->db->join('perangkat as p','p.id_perangkat = d.id_perangkat','left');
		$this->db->join('jenis_perangkat as j','j.id_jenis_perangkat = p.id_jenis_perangkat','left');
		$this->db->join('ruangan as r','r.id_ruangan = p.id_ruangan','left');
		$this->db->where('j.id_jenis_perangkat',$perangkat);
		$this->db->where('r.id_area',$area);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_all_perperangkat_perarea($perangkat,$area)
	{
		$this->db->select('*');
		$this->db->from('detil_perangkat as d');
		$this->db->join('perangkat as p','p.id_perangkat = d.id_perangkat','left');
		$this->db->join('jenis_perangkat as j','j.id_jenis_perangkat = p.id_jenis_perangkat','left');
		$this->db->join('ruangan as r','r.id_ruangan = p.id_ruangan','left');
		$this->db->where('j.id_jenis_perangkat',$perangkat);
		$this->db->where('r.id_area',$area);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_perform_perangkat($id_detil_perangkat)
	{
		$this->db->select('*');
		$this->db->from('performance');
		$this->db->where('id_detil_perangkat',$id_detil_perangkat);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_template_perform($id_jenis_perangkat)
	{
		$this->db->select('*');
		$this->db->from('template_performance');
		$this->db->where('id_jenis_perangkat',$id_jenis_perangkat);
		$result = $this->db->get();
		return $result->row_array();
	}
	
	function get_nilai_dashboard()
	{
		$this->db->select('*');
		$this->db->from('dashboard as d');
		$this->db->join('dashboard1 as d1','d1.id_dashboard1 = d.id_dashboard1','left');
		$this->db->order_by('id_dashboard','desc');
		$this->db->limit(8);
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function update_dashboard($id,$nilai)
	{
		$data = array(
			'id_dashboard1' => $id,
			'nilai' => $nilai
		);
		$this->db->insert('dashboard',$data);
	}

	function simpan_public_note($id_user)
	{
		$data = array(
			//'id_public_note' => $this->input->post('id_public_note'),
			'subject_public_note' => $this->input->post('subject_public_note'),
			'data_public_note' => $this->input->post('data_public_note'),
			'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
			'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
			'author' => $id_user
			//'created_date' => $this->input->post('author')
		);
		$this->db->insert('public_note',$data);
	}

	function delete_public_note($id_user)
	{
		$id_public_note = $this->input->post('id_public_note_delete');
		$this->db->query("delete from public_note where id_public_note = $id_public_note");
	}

	function get_public_note()
	{

		$time = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('public_note as d');
		$this->db->join('master_user as mu','mu.id_user = d.author','left');
		//$this->db->where('("'.$time.'" BETWEEN d.tanggal_kegiatan AND d.tanggal_berakhir)');
		$this->db->where('("'.$time.'" < d.tanggal_berakhir)');
		$this->db->order_by('d.created_date','desc');
		//$this->db->limit(4);
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_public_note_expired()
	{

		$time = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('public_note as d');
		$this->db->join('master_user as mu','mu.id_user = d.author','left');
		$this->db->where('d.tanggal_berakhir < "'.$time.'"');
		$this->db->order_by('d.created_date','desc');
		//$this->db->limit(4);
		$result = $this->db->get();
		return $result->result_array();
	}
	
}
