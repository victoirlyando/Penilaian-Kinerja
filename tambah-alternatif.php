<?php require_once('includes/init.php'); ?>
<?php $user_role = get_role();
if($user_role == 'admin' || $user_role == 'user')  ?>

<?php
$errors = array();
$sukses = false;

// $nama = (isset($_POST['id_user'])) ? trim($_POST['id_user']) : '';

if(isset($_POST['submit'])):	
	$nama = $_POST['id_user'];
	
	// Validasi
	// if(!$nama) {
	// 	$errors[] = 'Nama tidak boleh kosong';
	// }
	var_dump($nama);
	// Jika lolos validasi lakukan hal di bawah ini
	// if(empty($errors)):
		$simpan = mysqli_query($koneksi,"INSERT INTO alternatif (id_alternatif,	id_user) VALUES ('', '$nama')");
		if($simpan) {
			redirect_to('list-alternatif.php?status=sukses-baru');
		}else{
			$errors[] = 'Data gagal disimpan';
		}
	
	// endif;  
endif;

$page = "Alternatif";
require_once('template/header.php');
?>


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>

	<a href="list-alternatif.php" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>
			
<?php if(!empty($errors)): ?>
	<div class="alert alert-info">
		<?php foreach($errors as $error): ?>
			<?php echo $error; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>			
			
<form action="tambah-alternatif.php" method="post">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-plus"></i> Tambah Data Alternatif</h6>
		</div>
		<div class="card-body">
			<div class="row">				
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Nama</label>
					<select required class="form-control" name="id_user" >
					<option selected disabled >--Pilih--</option>
					<?php 
						$query = mysqli_query($koneksi,"SELECT * FROM user Where role != '1'");			
						while($data = mysqli_fetch_array($query)):
					?>
						<option value="<?= $data['id_user']; ?>"><?= $data['nama']; ?> </option>

						<?php endwhile; ?>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" value="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</div>
</form>

<?php
require_once('template/footer.php');
?>