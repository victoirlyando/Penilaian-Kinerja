<?php require_once('includes/init.php'); ?>



<?php



if(isset($_POST['submit'])):			
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$jk = $_POST['jk'];
	$role = $_POST['role'];
	
	if(!$username) {
		$errors[] = 'Username tidak boleh kosong';
	}		
	
	if(!$password) {
		$errors[] = 'Password tidak boleh kosong';
	}		
	
	if($password != $password2) {
		$errors[] = 'Password harus sama keduanya';
	}		
	
	if(!$nama) {
		$errors[] = 'Nama tidak boleh kosong';
	}		
	
	if(!$email) {
		$errors[] = 'Email tidak boleh kosong';
	}
	
	if(!$role) {
		$errors[] = 'Role tidak boleh kosong';
	}
	
	
	if(empty($errors)):
		// $pass = sha1($password);
		$pass = ($password);
		$simpan = mysqli_query($koneksi,"INSERT INTO user (id_user, username, password, nis, nama, email,jk, role) VALUES ('', '$username', '$pass', '$nis','$nama', '$email','$jk', '$role')");
		if($simpan) {
			

			redirect_to('login.php?status=sukses-baru');
		}else{
			$errors[] = 'Data gagal disimpan';
		}
	endif;

endif;
?>