<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_storage_new_model extends CI_Model
{
	
	function get_all_form_storage_new()
	{
		$timeYear = date('Y');
		$this->db->select('*')->from('form_storage_new')->where('time_now like "%'.$timeYear.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_form_storage_new_inner_join()
	{
		$this->db->select('*');
		$this->db->from('form_storage_new as fs');
		$this->db->join('form_storage_new_listroom as fsl','fsl.id_room = fs.id_room','left');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_all_form_storage_new_inner_join_no_img()
	{
		$this->db->select('*');
		$this->db->from('form_storage_new as fs');
		$this->db->join('form_storage_new_listroom as fsl','fsl.id_room = fs.id_room','left');
		$this->db->where('qr_code',"");
		$result = $this->db->get();
		return $result->result_array();
	}


	function get_storage_keluar()
	{
		$query = "select `form_storage_new`.`nama_barang`, `form_storage_new_listroom`.`nama_room` , `form_storage_new`.`no_rak`, `form_storage_new_history`.`sn_barang`,
`form_storage_new_history`.`jml_keluar` , `form_storage_new_history`.`tgl_keluar` , `form_storage_new_history`.`datenow`
FROM `form_storage_new_history` 
INNER JOIN `form_storage_new` ON (`form_storage_new`.`id_form_storage_new` = `form_storage_new_history`.`id_form_storage_new`) 
INNER JOIN `form_storage_new_listroom` ON (`form_storage_new`.`id_room` = `form_storage_new_listroom`.`id_room`)
ORDER BY `form_storage_new_history`.`tgl_keluar` DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	function get_storage_masuk()
	{
		$query = "select `form_storage_new`.`nama_barang`, `form_storage_new_listroom`.`nama_room` , `form_storage_new`.`no_rak`, `form_storage_new_history`.`sn_barang`,
`form_storage_new_history`.`jml_masuk` , `form_storage_new_history`.`tgl_masuk` , `form_storage_new_history`.`datenow`
FROM `form_storage_new_history` 
INNER JOIN `form_storage_new` ON (`form_storage_new`.`id_form_storage_new` = `form_storage_new_history`.`id_form_storage_new`) 
INNER JOIN `form_storage_new_listroom` ON (`form_storage_new`.`id_room` = `form_storage_new_listroom`.`id_room`)
ORDER BY `form_storage_new_history`.`tgl_masuk` DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	function get_all_form_storage_new_listroom()
	{
		$this->db->select('*')->from('form_storage_new_listroom');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_form_storage_new_history($id_form_storage_new)
	{
		$timeYear = date('Y');
		$this->db->select('*')->from('form_storage_new_history')->where('id_form_storage_new like "%'.$id_form_storage_new.'%"')->order_by('datenow','desc');;
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_form_storage_newbyid($id_form_storage_new)
	{
		$timeYear = date('Y');
		$this->db->select('*')->from('form_storage_new')->where('id_form_storage_new like "%'.$id_form_storage_new.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_form_storage_new)
	{
		$this->load->database();
		$query = $this->db->get_where('form_storage_new',array('id_form_storage_new'=>$id_form_storage_new));
		return $query->row_array();
	}

	function simpan_data($id_user_akses)
	{

		$simpan_data=array
		(
			'id_form_storage_new'	=>$this->input->post('id_form_storage_new'),
			'id_room'			=>$this->input->post('id_room'),
			'no_rak'			=>$this->input->post('no_rak'),
			'no_dus'			=>$this->input->post('no_dus'),
			'nama_barang'		=>$this->input->post('nama_barang'),
			'sn_barang'			=>$this->input->post('sn_barang'),
			'jumlah_awal'		=>$this->input->post('jumlah_awal'),
			'jumlah_akhir'		=>$this->input->post('jumlah_akhir'),
			'ket_dus'			=>$this->input->post('ket_dus'),
			'merk'				=>$this->input->post('merk'),
			'keterangan'		=>$this->input->post('keterangan'),
			'owner'				=>$this->input->post('owner'),
			'user_akses'		=>$id_user_akses
			//'time_now'			=>$this->input->post('time_now'),
		);

		

		$simpan = $this->db->insert('form_storage_new',$simpan_data);



		$time = date('Y-m-d');
		$this->db->select(' MAX(id_form_storage_new) AS "add" ', FALSE);
		$this->db->from('form_storage_new');
		$result = $this->db->get();
		$var = $result->result_array();


		$simpan_data_history=array
		(
			'id_form_storage_new_history'	=>$this->input->post('id_form_storage_new_history'),
			'id_form_storage_new'			=> $var[0]['add'],
			'tgl_masuk'				=>$this->input->post('tanggal_masuk'),
			//'tgl_keluar'			=>$this->input->post('tgl_keluar'),
			'jml_masuk'				=>$this->input->post('jumlah_akhir'),
			//'jml_keluar'			=>$this->input->post('sn_barang'),
			'keterangan'			=>$this->input->post('keterangan'),
			//'datenow'				=>$this->input->post('datenow'),
			'user_akses'			=>$id_user_akses
		);

		$simpan2 = $this->db->insert('form_storage_new_history',$simpan_data_history);

		return $simpan;
		
	}

	function update_data_qrcode($id_form_storage_new)
        {
            $data=array(
			'qr_code'			=>$id_form_storage_new.".png"
			);
				$this->db->where('id_form_storage_new',$id_form_storage_new);
                $this->db->update('form_storage_new', $data);
        }

	function update_data($id_user_akses)
        {
            $data=array(
			'id_room'			=>$this->input->post('id_room'),
			'no_rak'			=>$this->input->post('no_rak'),
			'no_dus'			=>$this->input->post('no_dus'),
			'nama_barang'		=>$this->input->post('nama_barang'),
			'sn_barang'			=>$this->input->post('sn_barang'),
			'jumlah_awal'		=>$this->input->post('jumlah_awal'),
			'jumlah_akhir'		=>$this->input->post('jumlah_akhir'),
			'ket_dus'			=>$this->input->post('ket_dus'),
			'merk'				=>$this->input->post('merk'),
			'keterangan'		=>$this->input->post('keterangan'),
			'owner'				=>$this->input->post('owner'),
			'user_akses'		=>$id_user_akses
			);
				$this->db->where('id_form_storage_new',$this->input->post('id_form_storage_new'));
                $this->db->update('form_storage_new', $data);
        }


        function update_data_masuk($id_user_akses)
        {


			$queryx = $this->db->get_where('form_storage_new',array('id_form_storage_new'=>$this->input->post('id_form_storage_new')));
			$q = $queryx->row_array();

        	$simpan_data_history=array
			(
				'id_form_storage_new_history'	=>$this->input->post('id_form_storage_new_history'),
				'id_form_storage_new'			=>$this->input->post('id_form_storage_new'),
				'tgl_masuk'				=>$this->input->post('tanggal_masuk'),
				//'tgl_keluar'			=>$this->input->post('tgl_keluar'),
				'jml_masuk'				=>$this->input->post('jumlah_akhir'),
				'sn_barang'			=>$this->input->post('sn_barang'),
				//'jml_keluar'			=>$this->input->post('sn_barang'),
				'keterangan'		=>$this->input->post('keterangan'),
				//'datenow'			=>$this->input->post('datenow'),
				'user_akses'		=>$id_user_akses
			);

			$simpan2 = $this->db->insert('form_storage_new_history',$simpan_data_history);

			//$jmlnow = $query['jumlah_akhir'] + $this->input->post('jumlah_akhir');

			//var_dump($queryx);

			$penambahan = $this->input->post('jumlah_akhir') ;
			$jumlahawal = $q['jumlah_akhir'];
			$jmlnow = $penambahan +$jumlahawal;
			//var_dump($penambahan +$jumlahawal);
			//var_dump($this->input->post('jumlah_akhir') );
			$snbaranglama = $q['sn_barang'];
			$sn_barang = $this->input->post('sn_barang');

            $data=array(
			//'id_room'			=>$this->input->post('id_room'),
			//'no_rak'			=>$this->input->post('no_rak'),
			'no_dus'			=>$this->input->post('no_dus'),
			//'nama_barang'		=>$this->input->post('nama_barang'),
			'sn_barang'			=>$snbaranglama .",".$sn_barang,
			'jumlah_awal'		=>$this->input->post('jumlah_awal'),
			'jumlah_akhir'		=>$jmlnow,
			'ket_dus'			=>$this->input->post('ket_dus'),
			'merk'				=>$this->input->post('merk'),
			//'keterangan'		=>$this->input->post('keterangan'),
			'owner'				=>$this->input->post('owner'),
			'user_akses'		=>$id_user_akses
			);
				$this->db->where('id_form_storage_new',$this->input->post('id_form_storage_new'));
                $this->db->update('form_storage_new', $data);
        }


         function update_data_keluar($id_user_akses)
        {


			$queryx = $this->db->get_where('form_storage_new',array('id_form_storage_new'=>$this->input->post('id_form_storage_new')));
			$q = $queryx->row_array();

        	$simpan_data_history=array
			(
				'id_form_storage_new_history'	=>$this->input->post('id_form_storage_new_history'),
				'id_form_storage_new'			=>$this->input->post('id_form_storage_new'),
				//'tgl_masuk'				=>$this->input->post('tanggal_masuk'),
				'tgl_keluar'			=>$this->input->post('tanggal_keluar'),
				//'jml_masuk'				=>$this->input->post('jumlah_akhir'),
				'jml_keluar'			=>$this->input->post('jumlah_akhir'),
				'keterangan'		=>$this->input->post('keterangan'),
				'sn_barang'			=>$this->input->post('sn_barang'),
				//'datenow'			=>$this->input->post('datenow'),
				'user_akses'		=>$id_user_akses
			);

			$simpan2 = $this->db->insert('form_storage_new_history',$simpan_data_history);

			//$jmlnow = $query['jumlah_akhir'] + $this->input->post('jumlah_akhir');

			//var_dump($queryx);

			$pengeluaran = $this->input->post('jumlah_akhir') ;
			$jumlahawal = $q['jumlah_akhir'];
			$jmlnow = $jumlahawal-$pengeluaran;
			//var_dump($penambahan +$jumlahawal);
			//var_dump($this->input->post('jumlah_akhir') );

            $data=array(
			//'id_room'			=>$this->input->post('id_room'),
			//'no_rak'			=>$this->input->post('no_rak'),
			'no_dus'			=>$this->input->post('no_dus'),
			//'nama_barang'		=>$this->input->post('nama_barang'),
			//'sn_barang'			=>$this->input->post('sn_barang'),
			'jumlah_awal'		=>$this->input->post('jumlah_awal'),
			'jumlah_akhir'		=>$jmlnow,
			'ket_dus'			=>$this->input->post('ket_dus'),
			'merk'				=>$this->input->post('merk'),
			//'keterangan'		=>$this->input->post('keterangan'),
			'owner'				=>$this->input->post('owner'),
			'user_akses'		=>$id_user_akses
			);
				$this->db->where('id_form_storage_new',$this->input->post('id_form_storage_new'));
                $this->db->update('form_storage_new', $data);
        }

    function hapus($id_form_storage_new){
		$this->db->query("delete from form_storage_new where id_form_storage_new = $id_form_storage_new");
	}	
	
}
