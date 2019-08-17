<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
	
	function get_all_user()
	{
		$this->db->select('*')->from('master_user');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_all_user_complete()
	{
		$this->db->select('mu.*,mt.nama,ur.nama_role,mc.nama_company');
		$this->db->from('master_user as mu');
		$this->db->join('master_team as mt', 'mt.id_team = mu.id_team','left');
		$this->db->join('user_role as ur', 'ur.id_role = mu.id_role','left');
		$this->db->join('master_company as mc', 'mc.id_company = mu.id_company','left');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_countuseridbycompany(){
		
		$this->db->select('COUNT(`master_user`.`id_company`) as v,`master_company`.`nama_company`');
		$this->db->from('master_user');
		$this->db->join('master_company','master_company.id_company = master_user.id_company','INNER');
		$this->db->group_by('`master_user`.`id_company`'); 

		$result = $this->db->get();
		return $result->result_array();
	} 

	function get_temp_akses_innerjoin()
	{

		$db4 = $this->load->database('database4', TRUE);

		$day = date('d');
		$month = date('m');
		$year = date('Y');
		$db4->select('	tm.nama,
							tm.jabatan,
							tm.instansi,
							ta.indeks_tamu,
							ta.id_kartu,
							ta.tanggal,
							ta.jam_masuk,
							ta.jam_keluar,
							ta.status,
							ta.keterangan,
							ta.id_kunjungan,
							ta.id_temp');
		$db4->from('temp_akses as ta');
		$db4->join('tamu as tm', 'tm.indeks = ta.indeks_tamu','left');
		$db4->where('ta.status like "%AKTIF%"');
		$db4->where('tm.id_company > "0"');
	
		$db4->order_by('ta.jam_masuk','desc');
		
		$result = $db4->get();

		return $result->result_array();
		
	}

		function get_kartu_aktif_innerjoin()
	{

		$db4 = $this->load->database('database4', TRUE);
		$day = date('d');
		$month = date('m');
		$year = date('Y');
		$db4->select('	tm.nama,
							tm.jabatan,
							tm.instansi,
							ta.indeks_tamu,
							ta.id_kartu,
							ta.tanggal,
							ta.jam_masuk,
							ta.jam_keluar,
							ta.status,
							ta.keterangan,
							ta.id_kunjungan,
							ta.id_temp');
		$db4->from('temp_akses as ta');
		$db4->join('tamu as tm', 'tm.indeks = ta.indeks_tamu','left');
		$db4->where('ta.status like "%AKTIF%"');
	
		$db4->order_by('ta.jam_masuk','desc');
		
		$result =$db4->get();

		return $result->result_array();
	}


	function get_list_kartu_aktif_by_shift($indeks_tamu,$date,$nama,$jabatan,$instansi,$jam_masuk,$jam_keluar,$status,$id_kartu)
	{


		$db4 = $this->load->database('database4', TRUE);
		$tahun 	= substr($date,0,4);
		$bulan 	= substr($date,5,2);
		$tanggal= substr($date,8,2);

		$tahun 	= (int) $tahun;
		$bulan 	= (int) $bulan;
		$tanggal= (int) $tanggal;
		$day = "DAY_".$tanggal;
		


		$db4->select(''.$day.' as d,'
							.'shift_name as shift_name,'
							.'"'.$nama.'" as nama,'
							.'"'.$jabatan.'" as jabatan,'
							.'"'.$instansi.'" as instansi,'
							.'"'.$jam_masuk.'" as jam_masuk,'
							.'"'.$jam_keluar.'" as jam_keluar,'
							.'"'.$id_kartu.'" as id_kartu,'
							.'"'.$status.'" as status', FALSE);
		$db4->from('jadwal');

		$db4->join('shift', 'shift.id_shift = '.$day.'','left');
		$db4->where('jadwal.bulan = "'.$bulan.'"');
		$db4->where('jadwal.tahun = "'.$tahun.'"');
		$db4->where('jadwal.indeks_tamu = "'.$indeks_tamu.'"');
	
		
		$result = $db4->get();
		
		return $result->result_array();
	}

	function get_list_kartu_aktif_by_shiftforSyariah($indeks_tamu,$date,$nama,$jabatan,$instansi,$jam_masuk,$jam_keluar,$status,$id_kartu)
	{

		
		$db4 = $this->load->database('database4', TRUE);
		$tahun 	= substr($date,0,4);
		$bulan 	= substr($date,5,2);
		$tanggal= substr($date,8,2);

		$tahun 	= (int) $tahun;
		$bulan 	= (int) $bulan;
		$tanggal= (int) $tanggal;
		$day = "DAY_".$tanggal;
		


		$db4->select('"-" as d,'
							.'"-" as shift_name,'
							.'"'.$nama.'" as nama,'
							.'"'.$jabatan.'" as jabatan,'
							.'"'.$instansi.'" as instansi,'
							.'"'.$jam_masuk.'" as jam_masuk,'
							.'"'.$jam_keluar.'" as jam_keluar,'
							.'"'.$id_kartu.'" as id_kartu,'
							.'"'.$status.'" as status', FALSE);
	
		
		$result = $db4->get();
		
		return $result->result_array();
	}

	function get_countuseridLateby_period($date){


		$db4 = $this->load->database('database4', TRUE);
		$query = "select COUNT((indeks_tamu)) AS countuser FROM report WHERE tanggal LIKE '%".$date."%' AND status_datang LIKE '1' ";

		$result = $db4->query($query);
		return $result->result_array();
	} 
	function get_countuseridEHby_period($date){


		$db4 = $this->load->database('database4', TRUE);
		$query = "select COUNT((indeks_tamu)) AS countuser FROM report WHERE tanggal LIKE '%".$date."%' AND status_pulang LIKE '1' ";

		$result = $db4->query($query);
		return $result->result_array();
	} 

	function get_akses_kunjungan($tanggal)
	{

		$db4 = $this->load->database('database4', TRUE);
		$time = date('Y');
		$db4->select('tm.nama,tm.jabatan,tm.instansi,
							ak.indeks_tamu,
							ak.tgl_mulai,
							ak.tgl_selesai,
							ak.keterangan,
							ak.status,
							ak.id_kunjungan');
		$db4->from('akses_kunjungan as ak');
		$db4->join('tamu as tm', 'tm.indeks = ak.indeks_tamu','left');
		$db4->where('ak.tgl_mulai LIKE "%'.$tanggal.'%" OR ak.tgl_selesai LIKE "%'.$tanggal.'%" ');
		$db4->order_by('ak.keterangan','desc');
		
		$result = $db4->get();
		return $result->result_array();
	}

	function get_akses_kunjunganhariini($tanggal)
	{

		$db4 = $this->load->database('database4', TRUE);
		$time = date('Y');
		$db4->select('tm.nama,tm.jabatan,tm.instansi,
							ak.indeks_tamu,
							ak.tgl_mulai,
							ak.tgl_selesai,
							ak.keterangan,
							ak.status,
							ak.id_kunjungan');
		$db4->from('akses_kunjungan as ak');
		$db4->join('tamu as tm', 'tm.indeks = ak.indeks_tamu','left');
		$db4->where('ak.tgl_mulai LIKE "%'.$tanggal.'%" OR ak.tgl_selesai LIKE "%'.$tanggal.'%"  OR ("'.$tanggal.'" BETWEEN ak.tgl_mulai AND ak.tgl_selesai)');
		$db4->where('tm.`jabatan` LIKE "%tamu%" AND ak.status="AKTIF"');



		$db4->order_by('ak.keterangan','desc');
		
		$result = $db4->get();
		return $result->result_array();
	}

	function get($id_user)
	{
		$this->load->database();
		$query = $this->db->get_where('master_user',array('id_user'=>$id_user));
		return $query->row_array();
	}

	function simpan_data()
	{
		$simpan_data=array
		(
			'id_user'		=>$this->input->post(''),
			'nama_lengkap'	=>$this->input->post('nama_lengkap'),
			'username'		=>$this->input->post('nama_user'),
			'password'		=>md5("xx-".$this->input->post('password')."-xx"),
			'id_role'		=>$this->input->post('id_role'),
			'id_team'		=>$this->input->post('team'),
			'id_kartu'		=>$this->input->post('id_kartu')

		);

		$simpan = $this->db->insert('master_user',$simpan_data);
		return $simpan;
		
	}
	public function update_data()
        {
            $data=array(
				'password'		=>md5("xx-".$this->input->post('password')."-xx")
			);
				$this->db->where('id_user',$this->input->post('id_user'));
                $this->db->update('master_user', $data);
        }

    function update_data_detail()
        {
            $data=array(
			'nama_lengkap'	=>$this->input->post('nama_lengkap'),
			//'username'		=>$this->input->post('nama_user'),
			//'id_role'		=>$this->input->post('id_role'),
			'id_team'		=>$this->input->post('team'),
			'id_company'	=>$this->input->post('company'),
			'email'			=>$this->input->post('email'),
			'alamat'		=>$this->input->post('alamat'),
			'id_kartu'		=>$this->input->post('id_kartu'),
			'no_phone'		=>$this->input->post('no_phone'),
			'telegram_id'	=>$this->input->post('telegram_id')
			);
				$this->db->where('id_user',$this->input->post('id_user'));
                $this->db->update('master_user', $data);
        }


	function update_data_detail_photos($id_user,$img_file)
        {
            $data=array(
			'img_file'	=>$img_file
			);
				$this->db->where('id_user',$id_user);
                $this->db->update('master_user', $data);
        }

    function hapus($id_user){
	$this->db->query("delete from master_user where id_user = $id_user");
	}	
	
	function get_all_team()
	{
		$this->db->select('*');
		$this->db->from('master_team');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function get_all_role()
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$result = $this->db->get();
		return $result->result_array();
	}
	
	function cek_username($username){
		$this->db->select('*');
		$this->db->from('master_user');
		$this->db->where('username',$username);
		$result = $this->db->get();
		return $result->row_array();
	}
	
}
