<?php 
// Code ini adalah sebuah controller yang mengatur tentang CRUD pada database
class Crud extends CI_Controller{
  // Code construct ini akan berjalan otomatis saat controller ini diakses 
	function __construct(){
    parent::__construct();	
    	// Code ini berfungsi untuk me-load salah satu models yaitu m_data
      $this->load->model('m_data');
      // Code ini berfungsi untuk me-load salah satu helper yaitu url
      $this->load->helper('url');
	}
  // Code ini akan berjalan pertama kali ketika controller ini diakses tanpa method
	public function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		  $this->load->view('v_tampil',$data);
    }
    // Code ini akan mengarahkan pengguna ke v_input untuk menginputkan data baru
    function tambah(){
		  $this->load->view('v_input');
    }
    // Ini adalah method yang akan berjalan ketika tombol submit dalam v_input ditekan, 
    // berfungsi merekam data dari view, menyimpan ke database, dan mengembalikan pengguna ke dalam index 
    function tambah_aksi(){
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pekerjaan = $this->input->post('pekerjaan');
    // Ini adalah sebuah array yang berguna untuk menjadikan ketiga diatas menjadi 1 variabel 
    // yang nantinya akan disertakan ke dalam query insert pada model bernama m_data.
		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'pekerjaan' => $pekerjaan
			);
		    $this->m_data->input_data($data,'user');
		redirect('crud/index');
    }
    // Method hapus berfungsi untuk melakukan hapus data dari database, dan memerlukan 1 parameter 
    // yaitu $id yang berasal dari id user yang dikirim pengguna menggunakan uri segment ke 3
    function hapus($id){
		$where = array('id' => $id);
	  	$this->m_data->hapus_data($where,'user');
		redirect('crud/index');
    }
    // Method edit ini berfungsi untuk mengarahkan user ke view_edit yang merupakan form input edit 
    // untuk melakukan update data ke dalam database, membutuhkan 1 parameter yaitu id user
    function edit($id){
        $where = array('id' => $id);
        $data['user'] = $this->m_data->edit_data($where,'user')->result();
          $this->load->view('v_edit',$data);
    }
    // Method update adalah method yang diajalankan ketika tombol submit pada form v_edit ditekan, 
    // method ini berfungsi untuk merekam data, memperbarui baris database yang dimaksud, 
    // lalu mengarahkan pengguna ke controller crud method index
    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $pekerjaan = $this->input->post('pekerjaan');
     
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'pekerjaan' => $pekerjaan
        );
        // Baris kode berikut berfungsi untuk menyimpan id user ke dalam array $where pada index array bernama 'id'
        $where = array(
            'id' => $id
        );
        // Berikut adalah kode yang berfungsi melakukan query update dengan menjalankan method update_data() pada model m_data, 
        // memerlukan 3 parameter yaitu $where sebagai id yg diperlukan 
        // untuk mendefinisikan where pada query, kedua $data adalah ketiga values yang diperbarui pada database, 
        // dan ketiga adalah nama tabel yang akan dilakukan update
        $this->m_data->update_data($where,$data,'user');
        // Berikut ini adalah baris kode yang berfungsi mengarahkan pengguna ke link base_url()crud/index/
        redirect('crud/index');
    }
}