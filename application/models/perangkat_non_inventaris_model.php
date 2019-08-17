<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perangkat_non_inventaris_model extends CI_Model
{
	
	function get_all_perangkat_non_inventaris()
	{
		$this->db->select('*')->from('perangkat_non_inventaris')->where('nama_perangkat_non_inventaris != "new add"');
		$query = $this->db->get();
		return $query->result_array();
	}


	

	function get_all_perangkat_non_inventaris_desain_dan_spesifikasi($id_perangkat_non_inventaris)
	{
		$this->db->select('*')->from('perangkat_non_inventaris_desain_dan_spesifikasi')->where('id_perangkat_non_inventaris = "'.$id_perangkat_non_inventaris.'"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_manufacture()
	{
		$this->db->select('*')->from('perangkat_non_inventaris_manufacture');
		$query = $this->db->get();
		return $query->result_array();
	}	

	function get_all_item_type()
	{
		$this->db->select('*')->from('perangkat_non_inventaris_item_type');
		$query = $this->db->get();
		return $query->result_array();
	}
	//get_all_item_type
	function get_new_file($nama_perangkat_non_inventaris)
	{
		$this->load->database();
		$query = $this->db->get_where('perangkat_non_inventaris',array('nama_perangkat_non_inventaris'=>$nama_perangkat_non_inventaris));
		return $query->row_array();
	}

	function get($id_perangkat_non_inventaris)
	{
		$this->load->database();
		$query = $this->db->get_where('perangkat_non_inventaris',array('id_perangkat_non_inventaris'=>$id_perangkat_non_inventaris));
		return $query->row_array();
	}


	function simpan_data()
	{

		$simpan_data=array
		(
			'id_perangkat_non_inventaris'			=>$this->input->post('id_perangkat_non_inventaris'),
			'nama_perangkat_non_inventaris'			=>$this->input->post('nama_perangkat_non_inventaris'),
			'lokasi_perangkat_non_inventaris'		=>$this->input->post('lokasi_perangkat_non_inventaris'),
			'img_file'	=>$this->input->post('img_file'),
			'unit_type'	=>$this->input->post('unit_type'),
			'id_item_type'		=>$this->input->post('id_item_type'),
			'id_manufacture'	=>$this->input->post('id_manufacture'),
			'model'		=>$this->input->post('model'),
			'sn'		=>$this->input->post('sn'),
			'last_performance'		=>$this->input->post('last_performance')
		);

		$simpan = $this->db->insert('perangkat_non_inventaris',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_new()
	{

		$simpan_data=array
		(
			'nama_perangkat_non_inventaris'			=>'new add',
		);

		$simpan = $this->db->insert('perangkat_non_inventaris',$simpan_data);
		return $simpan;
		
	}

	function update_data()
        {
            $data=array(
           	'id_perangkat_non_inventaris'		=>$this->input->post('id_perangkat_non_inventaris'),
			'nama_perangkat_non_inventaris'		=>$this->input->post('nama_perangkat_non_inventaris'),
			'lokasi_perangkat_non_inventaris'	=>$this->input->post('lokasi_perangkat_non_inventaris'),
			'img_file'	=>$this->input->post('img_file'),
			'unit_type'	=>$this->input->post('unit_type'),
			'sn'		=>$this->input->post('sn')
			);
				$this->db->where('id_perangkat_non_inventaris',$this->input->post('id_perangkat_non_inventaris'));
                $this->db->update('perangkat_non_inventaris', $data);
        }


    function update_data_umum($id_perangkat_non_inventaris)
        {
            $data=array(
			'nama_perangkat_non_inventaris'		=>$this->input->post('nama_perangkat_non_inventaris'),
			'lokasi_perangkat_non_inventaris'	=>$this->input->post('lokasi_perangkat_non_inventaris'),
			'unit_type'	=>$this->input->post('unit_type'),
			'sn'		=>$this->input->post('sn'),
			'last_performance'		=>$this->input->post('last_performance')
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }


    function update_data_umum_desain_dan_spesifikasi($id_perangkat_non_inventaris)
        {
            $data=array(
			'desain_dan_spesifikasi'		=>$this->input->post('desain_dan_spesifikasi')
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function update_data_umum_setup_configuration($id_perangkat_non_inventaris)
        {
            $data=array(
			'setup_configuration'		=>$this->input->post('setup_configuration')
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }


    function update_data_gambar($id_perangkat_non_inventaris,$img_file)
        {
            $data=array(
			'img_file'	=>$img_file
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function update_data_file_desain_dan_spesifikasi($id_perangkat_non_inventaris,$file)
        {
            $data=array(
			'file_desain_dan_spesifikasi'	=>$file
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function update_data_file_setup_configuration($id_perangkat_non_inventaris,$file)
        {
            $data=array(
			'file_setup_configuration'	=>$file
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function update_data_umum_availability($id_perangkat_non_inventaris)
        {
            $data=array(
			'availability'		=>$this->input->post('availability')
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function update_data_umum_reliability($id_perangkat_non_inventaris)
        {
            $data=array(
			'reliability'		=>$this->input->post('reliability')
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }


    function update_data_file_availability($id_perangkat_non_inventaris,$file)
        {
            $data=array(
			'file_availability'	=>$file
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function update_data_file_reliability($id_perangkat_non_inventaris,$file)
        {
            $data=array(
			'file_reliability'	=>$file
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

 function update_data_umum_performance($id_perangkat_non_inventaris)
        {
            $data=array(
			'performance'		=>$this->input->post('performance')
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

 function update_data_file_performance($id_perangkat_non_inventaris,$file)
        {
            $data=array(
			'file_performance'	=>$file
			);
				$this->db->where('id_perangkat_non_inventaris',$id_perangkat_non_inventaris);
                $this->db->update('perangkat_non_inventaris', $data);
        }

    function hapus($id_perangkat_non_inventaris){
		$this->db->query("delete from perangkat_non_inventaris where id_perangkat_non_inventaris = $id_perangkat_non_inventaris");
	}	
	
}
