<?php require_once('includes/init.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Sistem Penilaian Kinerja Pegawai Dinas Komunikasi dan Informatika </title>

        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
    </head>
	<body >
		<nav class="navbar navbar-expand-lg navbar-dark bg-white shadow-lg pb-3 pt-3 font-weight-bold">
            <div class="container">
                <a class="navbar-brand text-info" style="font-weight: 900;" href="login.php"> 
        <img src="<?=('assets/')?>img/kominfo.png"  style="width:50px;" alt=""> Sistem Penilaian Kinerja Pegawai Dinas Komunikasi dan Informatika</a>
            </div>
        </nav>



	<!-- <a href="Login.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a> -->
</div>
			
<?php if(!empty($errors)): ?>
	<div class="alert alert-info">
		<?php foreach($errors as $error): ?>
			<?php echo $error; ?>
		<?php endforeach; ?>
	</div>				
<?php endif; ?>



<div class="container mt-3">
<h2 class="mb-3">Form Pendaftaran Anggota</h2>
    <form action="simpan-daftar.php" method="post">
        <div class="form-group col-md-6">
			<label class="font-weight-bold">Username</label>
			<input autocomplete="off" type="text" name="username" required class="form-control"/>
		</div>
				
		<div class="form-group col-md-6">
			<label class="font-weight-bold">Password</label>
			<input autocomplete="off" type="password" name="password" required class="form-control"/>
		</div>
				
		<div class="form-group col-md-6">
			<label class="font-weight-bold">Ulangi Password</label>
			<input autocomplete="off" type="password" name="password2" required class="form-control"/>
		</div>
				
		<div class="form-group col-md-6">
			<label class="font-weight-bold">NIK</label>
			<input autocomplete="off" type="text" name="nis" required class="form-control"/>
		</div>
		<div class="form-group col-md-6">
			<label class="font-weight-bold">Nama Lengkap</label>
			<input autocomplete="off" type="text" name="nama" required class="form-control"/>
		</div>
				
		<div class="form-group col-md-6">
			<label class="font-weight-bold">E-Mail</label>
			<input autocomplete="off" type="email" name="email" required class="form-control"/>
		</div>
				
		<input type="hidden" name="role" value ="2">

		<div class="form-group col-md-6">
			<label class="font-weight-bold">Jenis Kelamin</label>
			<select name="jk" required class="form-control">
				<option value="">--Pilih Jenis Kelamin--</option>
				<option value="laki laki">Laki - Laki</option>
				<option value="perempuan">Perempuan</option>
			</select>
		</div>
     <!-- <div class="card-footer"> -->
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
			<a href="Login.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
        </div>
    </form>
</div>
</body>
