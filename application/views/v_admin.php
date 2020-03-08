<!-- File ini adalah tampilan untuk login, dengan username 'malasngoding' dan password 'malasngoding123' -->
<!-- File ini dapat diakses lewat alamat http://localhost/Praktek_3_CRUD-Login/login -->
<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>
	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>
	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>