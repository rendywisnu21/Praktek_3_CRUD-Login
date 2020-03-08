<?php 

class M_data extends CI_Model{
// Code ini berfungsi menampilkan data dari tabel 'user' pada database 'malasngoding'
  function tampil_data(){
		return $this->db->get('user');
    }
    // Code ini berfungsi memasukkan data dari view/v_input.php ke view/v_tampil.php 
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
    // Code ini berfungsi menghapus data di database
    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    // Code ini berfungsi mengedit data yang ada di database
    function edit_data($where,$table){		
        return $this->db->get_where($table,$where);
    }
    // Code ini berfungsi mengupdate data yang sudah diedit sebelumnya pada code diatas 
    // dan ditampilkan ke view/v_tampil.php 
    function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	
}