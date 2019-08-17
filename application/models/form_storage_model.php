<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_storage_model extends CI_Model
{
	
	function get_all_form_storage()
	{
		$timeYear = date('Y');
		$this->db->select('*')->from('form_storage')->where('time_now like "%'.$timeYear.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_form_storage_inner_join()
	{
		$this->db->select('*');
		$this->db->from('form_storage as fs');
		$this->db->join('form_storage_listroom as fsl','fsl.id_room = fs.id_room','left');
		$result = $this->db->get();
		return $result->result_array();
	}

	function get_all_form_storage_inner_join_no_img()
	{
		$this->db->select('*');
		$this->db->from('form_storage as fs');
		$this->db->join('form_storage_listroom as fsl','fsl.id_room = fs.id_room','left');
		$this->db->where('qr_code',"");
		$result = $this->db->get();
		return $result->result_array();
	}


	function get_storage_keluar()
	{
		$query = "select `form_storage`.`nama_barang`, `form_storage_listroom`.`nama_room` , `form_storage`.`no_rak`, `form_storage_history`.`sn_barang`,
`form_storage_history`.`jml_keluar` , `form_storage_history`.`tgl_keluar` , `form_storage_history`.`datenow`
FROM `form_storage_history` 
INNER JOIN `form_storage` ON (`form_storage`.`id_form_storage` = `form_storage_history`.`id_form_storage`) 
INNER JOIN `form_storage_listroom` ON (`form_storage`.`id_room` = `form_storage_listroom`.`id_room`)
ORDER BY `form_storage_history`.`tgl_keluar` DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	function get_storage_masuk()
	{
		$query = "select `form_storage`.`nama_barang`, `form_storage_listroom`.`nama_room` , `form_storage`.`no_rak`, `form_storage_history`.`sn_barang`,
`form_storage_history`.`jml_masuk` , `form_storage_history`.`tgl_masuk` , `form_storage_history`.`datenow`
FROM `form_storage_history` 
INNER JOIN `form_storage` ON (`form_storage`.`id_form_storage` = `form_storage_history`.`id_form_storage`) 
INNER JOIN `form_storage_listroom` ON (`form_storage`.`id_room` = `form_storage_listroom`.`id_room`)
ORDER BY `form_storage_history`.`tgl_masuk` DESC";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	function get_all_form_storage_listroom()
	{
		$this->db->select('*')->from('form_storage_listroom');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_form_storage_history($id_form_storage)
	{
		$timeYear = date('Y');
		$this->db->select('*')->from('form_storage_history')->where('id_form_storage like "%'.$id_form_storage.'%"')->order_by('datenow','desc');;
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_form_storagebyid($id_form_storage)
	{
		$timeYear = date('Y');
		$this->db->select('*')->from('form_storage')->where('id_form_storage like "%'.$id_form_storage.'%"');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get($id_form_storage)
	{
		$this->load->database();
		$query = $this->db->get_where('form_storage',array('id_form_storage'=>$id_form_storage));
		return $query->row_array();
	}

	function simpan_data($id_user_akses)
	{

		$simpan_data=array
		(
			'id_form_storage'	=>$this->input->post('id_form_storage'),
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

		

		$simpan = $this->db->insert('form_storage',$simpan_data);



		$time = date('Y-m-d');
		$this->db->select(' MAX(id_form_storage) AS "add" ', FALSE);
		$this->db->from('form_storage');
		$result = $this->db->get();
		$var = $result->result_array();


		$simpan_data_history=array
		(
			'id_form_storage_history'	=>$this->input->post('id_form_storage_history'),
			'id_form_storage'			=> $var[0]['add'],
			'tgl_masuk'				=>$this->input->post('tanggal_masuk'),
			//'tgl_keluar'			=>$this->input->post('tgl_keluar'),
			'jml_masuk'				=>$this->input->post('jumlah_akhir'),
			//'jml_keluar'			=>$this->input->post('sn_barang'),
			'keterangan'			=>$this->input->post('keterangan'),
			//'datenow'				=>$this->input->post('datenow'),
			'user_akses'			=>$id_user_akses
		);

		$simpan2 = $this->db->insert('form_storage_history',$simpan_data_history);

		return $simpan;
		
	}

	function update_data_qrcode($id_form_storage)
        {
            $data=array(
			'qr_code'			=>$id_form_storage.".png"
			);
				$this->db->where('id_form_storage',$id_form_storage);
                $this->db->update('form_storage', $data);
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
				$this->db->where('id_form_storage',$this->input->post('id_form_storage'));
                $this->db->update('form_storage', $data);
        }


        function update_data_masuk($id_user_akses)
        {


			$queryx = $this->db->get_where('form_storage',array('id_form_storage'=>$this->input->post('id_form_storage')));
			$q = $queryx->row_array();

        	$simpan_data_history=array
			(
				'id_form_storage_history'	=>$this->input->post('id_form_storage_history'),
				'id_form_storage'			=>$this->input->post('id_form_storage'),
				'tgl_masuk'				=>$this->input->post('tanggal_masuk'),
				//'tgl_keluar'			=>$this->input->post('tgl_keluar'),
				'jml_masuk'				=>$this->input->post('jumlah_akhir'),
				'sn_barang'			=>$this->input->post('sn_barang'),
				//'jml_keluar'			=>$this->input->post('sn_barang'),
				'keterangan'		=>$this->input->post('keterangan'),
				//'datenow'			=>$this->input->post('datenow'),
				'user_akses'		=>$id_user_akses
			);

			$simpan2 = $this->db->insert('form_storage_history',$simpan_data_history);

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
				$this->db->where('id_form_storage',$this->input->post('id_form_storage'));
                $this->db->update('form_storage', $data);
        }


         function update_data_keluar($id_user_akses)
        {


			$queryx = $this->db->get_where('form_storage',array('id_form_storage'=>$this->input->post('id_form_storage')));
			$q = $queryx->row_array();

        	$simpan_data_history=array
			(
				'id_form_storage_history'	=>$this->input->post('id_form_storage_history'),
				'id_form_storage'			=>$this->input->post('id_form_storage'),
				//'tgl_masuk'				=>$this->input->post('tanggal_masuk'),
				'tgl_keluar'			=>$this->input->post('tanggal_keluar'),
				//'jml_masuk'				=>$this->input->post('jumlah_akhir'),
				'jml_keluar'			=>$this->input->post('jumlah_akhir'),
				'keterangan'		=>$this->input->post('keterangan'),
				'sn_barang'			=>$this->input->post('sn_barang'),
				//'datenow'			=>$this->input->post('datenow'),
				'user_akses'		=>$id_user_akses
			);

			$simpan2 = $this->db->insert('form_storage_history',$simpan_data_history);

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
				$this->db->where('id_form_storage',$this->input->post('id_form_storage'));
                $this->db->update('form_storage', $data);
        }

    function hapus($id_form_storage){
		$this->db->query("delete from form_storage where id_form_storage = $id_form_storage");
	}	
	
}
