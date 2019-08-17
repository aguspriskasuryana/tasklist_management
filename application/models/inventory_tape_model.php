<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventory_tape_model extends CI_Model
{
	
	function get_all_inventory_tape()
	{


		$db3 = $this->load->database('database3', TRUE);
		
		$db3->select('tt.*,tyt.TYP_NAME,mt.MCH_NAME,lt.LOC_NAME,mdt.MEDCLS_NAME,trt.TRANS_DLV_BY');
		$db3->from('tape_tbl as tt');
		$db3->join('typ_tbl as tyt','tyt.typ_id = tt.typ_id','left');
		$db3->join('mch_tbl as mt','mt.mch_id = tt.mch_id','left');
		$db3->join('loc_tbl as lt','lt.loc_id = tt.loc_id','left');
		$db3->join('medcls_tbl as mdt','mdt.medcls_id = tt.medcls_id','left');
		$db3->join('trans_tbl as trt','trt.trans_id = tt.medcls_id','left');

		//$this->db->where('tl.tanggal',$tanggal);
		$db3->order_by('tt.loc_detail','desc');
		$db3->limit(9000);
		$result = $db3->get();
		return $result->result_array();
	}

	function get_all_typ_tbl()
	{

		$db3 = $this->load->database('database3', TRUE);
		$db3->select('*')->from('typ_tbl');
		$query = $db3->get();
		return $query->result_array();
	}
	function get_all_mch_tbl()
	{
		$db3 = $this->load->database('database3', TRUE);
		$db3->select('*')->from('mch_tbl');
		$query = $db3->get();
		return $query->result_array();
	}
	function get_all_loc_tbl()
	{

		$db3 = $this->load->database('database3', TRUE);
		$db3->select('*')->from('loc_tbl');
		$query = $db3->get();
		return $query->result_array();
	}

	function get_all_loc_detail_tbl()
	{

		$db3 = $this->load->database('database3', TRUE);
	
		$query = "select DISTINCT(LEFT(loc_detail,5)) AS loc_detail FROM (`tape_tbl`) ORDER BY loc_detail";

		$result = $db3->query($query);

		return $result->result_array();
	}
	function get_all_medcls_tbl()
	{

		$db3 = $this->load->database('database3', TRUE);
		$db3->select('*')->from('medcls_tbl');
		$query = $db3->get();
		return $query->result_array();
	}
	function get_all_trans_tbl()
	{
		$db3 = $this->load->database('database3', TRUE);
		$db3->select('*')->from('trans_tbl');
		$query = $db3->get();
		return $query->result_array();
	}

	function get_all_inventory_tapebytype($typ_id)
	{

		$db3 = $this->load->database('database3', TRUE);
		
		$db3->select('tt.*,tyt.TYP_NAME,mt.MCH_NAME,lt.LOC_NAME,mdt.MEDCLS_NAME,trt.TRANS_DLV_BY');
		$db3->from('tape_tbl as tt');
		$db3->join('typ_tbl as tyt','tyt.typ_id = tt.typ_id','left');
		$db3->join('mch_tbl as mt','mt.mch_id = tt.mch_id','left');
		$db3->join('loc_tbl as lt','lt.loc_id = tt.loc_id','left');
		$db3->join('medcls_tbl as mdt','mdt.medcls_id = tt.medcls_id','left');
		$db3->join('trans_tbl as trt','trt.trans_id = tt.medcls_id','left');

		$db3->where('tt.typ_id',$typ_id);
		$db3->order_by('tt.loc_detail','desc');
		$db3->limit(9000);
		$result = $db3->get();
		return $result->result_array();
	}
	
	function get_all_inventory_tapebyvolid($volid)
	{

		$db3 = $this->load->database('database3', TRUE);
		
		$db3->select('tt.*,tyt.TYP_NAME,mt.MCH_NAME,lt.LOC_NAME,mdt.MEDCLS_NAME,trt.TRANS_DLV_BY');
		$db3->from('tape_tbl as tt');
		$db3->join('typ_tbl as tyt','tyt.typ_id = tt.typ_id','left');
		$db3->join('mch_tbl as mt','mt.mch_id = tt.mch_id','left');
		$db3->join('loc_tbl as lt','lt.loc_id = tt.loc_id','left');
		$db3->join('medcls_tbl as mdt','mdt.medcls_id = tt.medcls_id','left');
		$db3->join('trans_tbl as trt','trt.trans_id = tt.medcls_id','left');

		$db3->where('tt.tape_volid IN ('.$volid.')');
		$db3->order_by('tt.loc_detail','desc');
		$db3->limit(9000);
		$result = $db3->get();
		return $result->result_array();
	}

	function get_count_by_loc($loc,$typ_id){
		$db3 = $this->load->database('database3', TRUE);
		$query = "select COUNT(`tape_tbl`.`TAPE_ID`) AS counttape FROM `tape_tbl`  WHERE `tape_tbl`.`loc_id` = '".$loc."' AND `tape_tbl`.`TYP_ID` = '".$typ_id."'";

		$result =$db3->query($query);
		return $result->result_array();

	} 

	function get_count_by_loc_detail($loc,$typ_id, $locdetail){

		$db3 = $this->load->database('database3', TRUE);
		$query = "select COUNT(`tape_tbl`.`TAPE_ID`) AS counttape FROM `tape_tbl`  WHERE `tape_tbl`.`loc_id` = '".$loc."' AND `tape_tbl`.`TYP_ID` = '".$typ_id."' AND `tape_tbl`.`LOC_DETAIL` LIKE '%".$locdetail."%'";

		$result = $db3->query($query);
		return $result->result_array();
	} 

	function get($id_inventory_tape)
	{
		$db2 = $this->load->database('database3', TRUE);
		$query = $db2->get_where('tape_tbl',array('id'=>$id_inventory_tape));
		return $query->row_array();
	}

	function simpan_data()
	{

		$simpan_data=array
		(
			'typ_id'		=>$this->input->post('typ_id'),
			'mch_id'		=>$this->input->post('mch_id'),
			'tape_volid'	=>$this->input->post('tape_volid'),
			'tape_cont'		=>$this->input->post('tape_cont'),
			'tape_date'		=>$this->input->post('tape_date'),
			'tape_desc'		=>$this->input->post('tape_desc'),
			'loc_id'		=>$this->input->post('loc_id'),
			'loc_detail'	=>$this->input->post('loc_detail'),
			'medcls_id'		=>$this->input->post('medcls_id'),
			'trans_id'		=>$this->input->post('trans_id'),
			'tape_sts'		=>$this->input->post('tape_sts')
		);
		$db2 = $this->load->database('database3', TRUE);

		$simpan = $db2->insert('tape_tbl',$simpan_data);
		return $simpan;
		
	}

	function simpan_data_stock_opname($tape_volid,$user_id,$loc_detail)
	{

		$simpan_data=array
		(
			'tape_volid'	=>$tape_volid,
			'user_id'		=>$user_id,
			'loc_detail'	=>$loc_detail
		);
		$db2 = $this->load->database('database3', TRUE);

		$simpan = $db2->insert('stock_opname',$simpan_data);
		return $simpan;
		
	}
	function update_data()
        {
            $data=array(
           	'nama'			=>$this->input->post('nama'),
			'jabatan'		=>$this->input->post('jabatan')
			);
			$db2 = $this->load->database('database3', TRUE);
				$db2->where('id',$this->input->post('id'));
               $simpan =  $db2->update('tape_tbl', $data);
                return $simpan;
        }

    function hapus($id){
    	$db2 = $this->load->database('database3', TRUE);
		$db2->query("delete from tape_tbl where TAPE_ID = $id");
		//$this->db->query("delete from tape_tbl where TAPE_ID = $id");
	}	
	
}
