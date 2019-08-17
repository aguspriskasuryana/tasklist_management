<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Balakar_model extends CI_Model
{
	
	function get_all_balakar()
	{

		$db2 = $this->load->database('database2', TRUE);
		$db2->select('*')->from('balakar');
		$query = $db2->get();
		return $query->result_array();
	}
	function get($id_balakar)
	{
		$db2 = $this->load->database('database2', TRUE);
		$query = $db2->get_where('balakar',array('id'=>$id_balakar));
		return $query->row_array();
	}

	function simpan_data()
	{

		$simpan_data=array
		(
			'nama'			=>$this->input->post('nama'),
			'jabatan'		=>$this->input->post('jabatan')
		);
		$db2 = $this->load->database('database2', TRUE);

		$simpan = $db2->insert('balakar',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'nama'			=>$this->input->post('nama'),
			'jabatan'		=>$this->input->post('jabatan')
			);
			$db2 = $this->load->database('database2', TRUE);
				$db2->where('id',$this->input->post('id'));
                $db2->update('balakar', $data);
        }

    function hapus($id){
    	$db2 = $this->load->database('database2', TRUE);
		$db2->query("delete from balakar where id = $id");
	}	
	
}
