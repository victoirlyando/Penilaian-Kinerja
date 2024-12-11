<?php require_once('includes/init.php');
$user_role = get_role();
if ($user_role == 'admin' || $user_role == 'user')
?>

<?php
$page = "Penilaian";
require_once('template/header.php');

$kriterias = array();
$q1 = mysqli_query($koneksi, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
while ($krit = mysqli_fetch_array($q1)) {
	$kriterias[$krit['id_kriteria']]['id_kriteria'] = $krit['id_kriteria'];
	$kriterias[$krit['id_kriteria']]['kode_kriteria'] = $krit['kode_kriteria'];
	// $kriterias[$krit['id_kriteria']]['nama'] = $krit['nama'];
	// $kriterias[$krit['id_kriteria']]['bobott'] = $krit['bobot'];
	// $kriterias[$krit['id_kriteria']]['ada_pilihan'] = $krit['ada_pilihan'];
}

$matriks_x = array();
function UnNormalisasiAlternatif($id_kriteria, $nilai)
{
	if ($id_kriteria == 1) {
		switch ($nilai) {
			case '0.25':
				return "SMA/SMK";
				break;
			case '0.5':
				return "Diploma 3";
				break;
			case '0.75':
				return "Strata 1";
				break;
			case '1':
				return "Strata 2";
				break;
		}
	} elseif ($id_kriteria == 2) {
		switch ($nilai) {
			case '0.25':
				return "Tidak Memuaskan";
				break;
			case '0.5':
				return "Kurang Memuaskan";
				break;
			case '0.75':
				return "Sudah Memuaskan";
				break;
			case '1':
				return "Sangat Memuaskan";
				break;
		}
	}elseif ($id_kriteria == 5) {
		switch ($nilai) {
			case '0.25':
				return "85% - 89.99%";
				break;
			case '0.5':
				return "90% - 94.99%";
				break;
			case '0.75':
				return "95% - 99.99%";
				break;
			case '1':
				return "100%";
				break;
		}
	}elseif ($id_kriteria == 9) {
		switch ($nilai) {
			case '0.25':
				return "Tidak Cekatan";
				break;
			case '0.5':
				return "Kurang Cekatan";
				break;
			case '0.75':
				return "Cekatan";
				break;
			case '1':
				return "Sangat Cekatan";
				break;
		}
	}else {
		# code...
	}
	
}
// if (isset($_POST['tambah'])) :
// 	$id_alternatif = $_POST['id_alternatif'];
// 	$id_kriteria = $_POST['id_kriteria'];
// 	$nilai = $_POST['nilai'];

// 	// $disiplin = 85;
// 	// echo $disiplin;

// 	// print_r($nilai[2]);
// 	$status = 0;
// 	if ($nilai >= 100) {

// 		$nilai = 1;
// 	} elseif ($nilai >= 95 && $nilai < 99.99) {

// 		$nilai = 0.75;
// 	} elseif ($nilai >= 90 && $nilai < 94.99) {
// 		$nilai = 0.5;
// 	} elseif ($nilai >= 85 &&  $nilai < 89.99) {

// 		$nilai = 0.25;
// 	}

// 	// print_r($nilai);

// 	// echo $status;

// 	if (!$id_kriteria) {
// 		$errors[] = 'ID kriteria tidak boleh kosong';
// 	}
// 	if (!$id_alternatif) {
// 		$errors[] = 'ID Alternatif kriteria tidak boleh kosong';
// 	}
// 	if (!$nilai) {
// 		$errors[] = 'Nilai kriteria tidak boleh kosong';
// 	}

// 	if (empty($errors)) :
// 		$i = 0;
// 		foreach ($nilai as $key) {
// 			// $simpan = mysqli_query($koneksi, "INSERT INTO penilaian (id_penilaian, id_alternatif, id_kriteria, nilai) VALUES ('', '$id_alternatif', '$id_kriteria[$i]', '$key')");
// 			$i++;
// 		}
// 		if ($simpan) {
// 			$sts[] = 'Data berhasil disimpan';
// 		} else {
// 			$sts[] = 'Data gagal disimpan';
// 		}
// 	endif;
// endif;

// test tambah
if (isset($_POST['tambah'])) :
	$id_alternatif = $_POST['id_alternatif'];
	$id_kriteria = $_POST['id_kriteria'];
	$nilai = $_POST['nilai'];

	$errors = array();

	if (!$id_kriteria) {
		$errors[] = 'ID kriteria tidak boleh kosong';
	}
	if (!$id_alternatif) {
		$errors[] = 'ID Alternatif kriteria tidak boleh kosong';
	}
	if (empty($nilai)) {
		$errors[] = 'Nilai kriteria tidak boleh kosong';
	}

	// print_r($nilai);

	$sqli = "SELECT ada_pilihan FROM kriteria ORDER BY kode_kriteria ASC";

	// Eksekusi query
	$result_sqli = mysqli_query($koneksi, $sqli);

	// Inisialisasi array untuk menyimpan hasil
	$data_array = [];

	// Memeriksa apakah query berhasil dieksekusi
	if (mysqli_num_rows($result_sqli) > 0) {
		// Mengambil hasil query dan menyimpan ke dalam array
		while ($row = mysqli_fetch_assoc($result_sqli)) {
			$data_array[] = $row['ada_pilihan'];
		}
	} else {
		echo "Tidak ada data yang ditemukan";
	}
	// Menampilkan atau menggunakan data yang sudah disimpan dalam bentuk array
	// print_r($data_array);
	$zero_indices = [];
	// Looping melalui array untuk mencari indeks yang memiliki nilai 0
	foreach ($data_array as $index => $value) {
		if ($value == 0) {
			$zero_indices[] = $index;
		}
	}
	// Menampilkan nilai sebelum perubahan
	// echo "Nilai sebelum perubahan: ";
	// print_r($nilai);
	// Mengubah nilai pada variabel $nilai berdasarkan $zero_indices
	foreach ($zero_indices as $index) {
		$data1 = $nilai[$index];

		if ($data1 >= 100) {
			$nilai[$index] = 1;
		} elseif ($data1 >= 95 && $data1 <= 99.99) {
			$nilai[$index] = 0.75;
		} elseif ($data1 >= 90 && $data1 <= 94.99) {
			$nilai[$index] = 0.5;
		} elseif ($data1 >= 85 && $data1 <= 89.99) {
			$nilai[$index] = 0.25;
		}
	}
	// Menampilkan nilai setelah perubahan
	// echo "Nilai setelah perubahan: ";
	// print_r($nilai);
	if (empty($errors)) :
		$i = 0;
		foreach ($nilai as $key) {
			$simpan = mysqli_query($koneksi, "INSERT INTO penilaian (id_penilaian, id_alternatif, id_kriteria, nilai) VALUES ('', '$id_alternatif', '$id_kriteria[$i]', '$key')");
			$i++;
		}
		if ($simpan) {
			$sts[] = 'Data berhasil disimpan';
		} else {
			$sts[] = 'Data gagal disimpan';
		}
	endif;
endif;
// test tambah

// program awal
// if (isset($_POST['edit'])) :
// 	$id_alternatif = $_POST['id_alternatif'];
// 	$id_kriteria = $_POST['id_kriteria'];
// 	$nilai = $_POST['nilai'];

// 	if (!$id_kriteria) {
// 		$errors[] = 'ID kriteria tidak boleh kosong';
// 	}
// 	if (!$id_alternatif) {
// 		$errors[] = 'ID Alternatif kriteria tidak boleh kosong';
// 	}
// 	if (!$nilai) {
// 		$errors[] = 'Nilai kriteria tidak boleh kosong';
// 	}

// 	if (empty($errors)) :
// 		$i = 0;
// 		mysqli_query($koneksi, "DELETE FROM penilaian WHERE id_alternatif = '$id_alternatif';");
// 		foreach ($nilai as $key) {
// 			$simpan = mysqli_query($koneksi, "INSERT INTO penilaian (id_penilaian, id_alternatif, id_kriteria, nilai) VALUES ('', '$id_alternatif', '$id_kriteria[$i]', '$key')");
// 			$i++;
// 		}
// 		if ($simpan) {
// 			$sts[] = 'Data berhasil diupdate';
// 		} else {
// 			$sts[] = 'Data gagal diupdate';
// 		}
// 	endif;
// endif;
// program awal

//test edit
if (isset($_POST['edit'])) :
	$id_alternatif = $_POST['id_alternatif'];
	$id_kriteria = $_POST['id_kriteria'];
	$nilai = $_POST['nilai'];

	$errors = array();

	if (!$id_kriteria) {
		$errors[] = 'ID kriteria tidak boleh kosong';
	}
	if (!$id_alternatif) {
		$errors[] = 'ID Alternatif kriteria tidak boleh kosong';
	}
	if (empty($nilai)) {
		$errors[] = 'Nilai kriteria tidak boleh kosong';
	}
	// print_r($nilai);
	$sqli = "SELECT ada_pilihan FROM kriteria ORDER BY kode_kriteria ASC";

	// Eksekusi query
	$result_sqli = mysqli_query($koneksi, $sqli);

	// Inisialisasi array untuk menyimpan hasil
	$data_array = [];

	// Memeriksa apakah query berhasil dieksekusi
	if (mysqli_num_rows($result_sqli) > 0) {
		// Mengambil hasil query dan menyimpan ke dalam array
		while ($row = mysqli_fetch_assoc($result_sqli)) {
			$data_array[] = $row['ada_pilihan'];
		}
	} else {
		echo "Tidak ada data yang ditemukan";
	}
	// Menampilkan atau menggunakan data yang sudah disimpan dalam bentuk array
	// print_r($data_array);
	$zero_indices = [];
	// Looping melalui array untuk mencari indeks yang memiliki nilai 0
	foreach ($data_array as $index => $value) {
		if ($value == 0) {
			$zero_indices[] = $index;
		}
	}
	// Menampilkan nilai sebelum perubahan
	// echo "Nilai sebelum perubahan: ";
	// print_r($nilai);
	// Mengubah nilai pada variabel $nilai berdasarkan $zero_indices
	foreach ($zero_indices as $index) {
		$data1 = $nilai[$index];

		if ($data1 >= 100) {
			$nilai[$index] = 1;
		} elseif ($data1 >= 95 && $data1 <= 99.99) {
			$nilai[$index] = 0.75;
		} elseif ($data1 >= 90 && $data1 <= 94.99) {
			$nilai[$index] = 0.5;
		} elseif ($data1 >= 85 && $data1 <= 89.99) {
			$nilai[$index] = 0.25;
		}
	}
	// Menampilkan nilai setelah perubahan
	// echo "Nilai setelah perubahan: ";
	// print_r($nilai);

	if (empty($errors)) :
		$i = 0;
		mysqli_query($koneksi, "DELETE FROM penilaian WHERE id_alternatif = '$id_alternatif';");
		foreach ($nilai as $key) {
			$simpan = mysqli_query($koneksi, "INSERT INTO penilaian (id_penilaian, id_alternatif, id_kriteria, nilai) VALUES ('', '$id_alternatif', '$id_kriteria[$i]', '$key')");
			$i++;
		}
		if ($simpan) {
			$sts[] = 'Data berhasil diupdate';
		} else {
			$sts[] = 'Data gagal diupdate';
		}
	endif;
endif;
//test edit

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Data Penilaian</h1>
</div>

<?php if (!empty($sts)) : ?>
	<div class="alert alert-info">
		<?php foreach ($sts as $st) : ?>
			<?php echo $st; ?>
		<?php endforeach; ?>
	</div>
<?php
endif;
?>

<div class="card shadow mb-4">
	<!-- /.card-header -->
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Penilaian</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Alternatif</th>
						<!-- <?php foreach ($kriterias as $kriteria) : ?>
							<th><?= $kriteria['kode_kriteria'] ?></th>
						<?php endforeach ?> -->
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$query = mysqli_query($koneksi, "SELECT * FROM alternatif INNER JOIN user ON alternatif.id_user = user.id_user");
					while ($data = mysqli_fetch_array($query)) {
					?>
						<tr align="center">
							<td><?= $no ?></td>
							<td align="left"><?= $data['nama'] ?></td>
							<?php
							$id_alternatif = $data['id_alternatif'];
							$q = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif'");
							$cek_tombol = mysqli_num_rows($q);
							?>
							<td>
								<?php if ($cek_tombol == 0) { ?>
									<a data-toggle="modal" href="#set<?= $data['id_alternatif'] ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Input</a>
								<?php } else { ?>
									<a data-toggle="modal" href="#edit<?= $data['id_alternatif'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
								<?php } ?>
							</td>
						</tr>
						<!-- <tr align="center">
							<td><?= $no ?></td>
							<td align="left"><?= $data['nama'] ?></td>
							<?php
							$id_alternatif = $data['id_alternatif'];
							$q = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif'");
							$cek_tombol = mysqli_num_rows($q);
							foreach ($kriterias as $kriteria) :
								$id_alternatif = $data['id_alternatif'];
								$id_kriteria = $kriteria['id_kriteria'];
								$q4 = mysqli_query($koneksi, "SELECT nilai FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria'");
								$dataa = mysqli_fetch_array($q4);
								$nilai = UnNormalisasiAlternatif($id_kriteria,$dataa['nilai']) ?? 0;  // Set nilai default 0 jika nilai tidak ada
								$matriks_x[$id_kriteria][$id_alternatif] = $nilai;
								echo '<td>';
								echo $nilai;
								echo '</td>';
							endforeach
							?>
							<td>
							<?php if ($cek_tombol == 0) { ?>
									<a data-toggle="modal" href="#set<?= $data['id_alternatif'] ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Input</a>
								<?php } else { ?>
									<a data-toggle="modal" href="#edit<?= $data['id_alternatif'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
								<?php } ?>
							</td> -->

						</tr>

						<!-- Modal tambah -->
						<div class="modal fade" id="set<?= $data['id_alternatif'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Input Penilaian</h5>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<form action="" method="post">
										<div class="modal-body">
											<?php
											$q2 = mysqli_query($koneksi, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
											while ($d = mysqli_fetch_array($q2)) {
											?>
												<input type="text" name="id_alternatif" value="<?= $data['id_alternatif'] ?>" hidden>
												<input type="text" name="id_kriteria[]" value="<?= $d['id_kriteria'] ?>" hidden>
												<div class="form-group">
													<label class="font-weight-bold">(<?= $d['kode_kriteria'] ?>) <?= $d['nama'] ?></label>
													<?php
													if ($d['ada_pilihan'] == 1) {
													?>
														<select name="nilai[]" class="form-control" required>
															<option value="">--Pilih--</option>
															<option value="1" <?php if ($d['ada_pilihan'] == "1") ?>>strata 2</option>
															<option value="0.75" <?php if ($d['ada_pilihan'] == "0.75") ?>>strata 1</option>
															<option value="0.5" <?php if ($d['ada_pilihan'] == "0.5") ?>>diploma 3</option>
															<option value="0.25" <?php if ($d['ada_pilihan'] == "0.25") ?>>SMA/SMK</option>
															<!-- <option value="0" <?php if ($d['ada_pilihan'] == "0") {
																						echo "selected";
																					} ?>>Inputan Langsung</option> -->
														</select>

													<?php
													} elseif ($d['ada_pilihan'] == 2) {
													?>
														<select name="nilai[]" class="form-control" required>
															<option value="">--Pilih--</option>
															<option value="1" <?php if ($d['ada_pilihan'] == "1") ?>>Sangat Memuaskan</option>
															<option value="0.75" <?php if ($d['ada_pilihan'] == "0.75") ?>>Sudah Memuaskan</option>
															<option value="0.5" <?php if ($d['ada_pilihan'] == "0.5") ?>>Kurang Memuaskan</option>
															<option value="0.25" <?php if ($d['ada_pilihan'] == "0.25") ?>>Tidak Memuaskan</option>
															<!-- <option value="0" <?php if ($d['ada_pilihan'] == "0") {
																						echo "selected";
																					} ?>>Inputan Langsung</option> -->
														</select>
													<?php
													} elseif ($d['ada_pilihan'] == 3) {
													?>
														<select name="nilai[]" class="form-control" required>
															<option value="">--Pilih--</option>
															<option value="1" <?php if ($d['ada_pilihan'] == "1") ?>>Sangat Cekatan</option>
															<option value="0.75" <?php if ($d['ada_pilihan'] == "0.75") ?>>Cekatan</option>
															<option value="0.5" <?php if ($d['ada_pilihan'] == "0.5") ?>>Kurang Cekatan</option>
															<option value="0.25" <?php if ($d['ada_pilihan'] == "0.25") ?>>Tidak Cekatan</option>
														</select>
													<?php
													} else {
													?>
														<input type="number" name="nilai[]" class="form-control" step="0.001" required autocomplete="off">

														<?php
														// $data1 = 'nilai_kriteria';
														// $status = 'nilai[]';
														// 	if ($data1>= 100): 
														// 			$status= 1;
														// 	elseif ($data1 >= 95 && $data1 < 99.99):
														// 			$status= 0.75;
														// 	elseif ($data1 >= 90 && $data1 < 94.99):
														// 			$status= 0.5;
														// 	elseif ( $data1>= 85 &&  $data1< 89.99):
														// 			$status= 0.25;
														// 		endif;

														?>
													<?php
													}
													?>
												</div>
											<?php } ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
											<button type="submit" name="tambah" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- Modal edit-->
						<div class="modal fade" id="edit<?= $data['id_alternatif'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit Penilaian</h5>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<form action="" method="post">
										<div class="modal-body">
											<?php
											$q2 = mysqli_query($koneksi, "SELECT * FROM kriteria ORDER BY kode_kriteria ASC");
											while ($d = mysqli_fetch_array($q2)) {
												$id_kriteria = $d['id_kriteria'];
												$id_alternatif = $data['id_alternatif'];
												$q4 = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria'");
												$d4 = mysqli_fetch_array($q4);
											?>
												<input type="text" name="id_alternatif" value="<?= $data['id_alternatif'] ?>" hidden>
												<input type="text" name="id_kriteria[]" value="<?= $d['id_kriteria'] ?>" hidden>
												<div class="form-group">
													<label class="font-weight-bold">(<?= $d['kode_kriteria'] ?>) <?= $d['nama'] ?></label>
													<?php
													if ($d['ada_pilihan'] == 1) {
														// Option values
														$options = [
															['value' => '1', 'label' => 'strata 2'],
															['value' => '0.75', 'label' => 'strata 1'],
															['value' => '0.5', 'label' => 'diploma 3'],
															['value' => '0.25', 'label' => 'SMA/SMK'],
														];
													?>
														<select name="nilai[]" class="form-control" required>
															<option value="">--Pilih--</option>
															<?php foreach ($options as $option) : ?>
																<option value="<?= $option['value'] ?>" <?= ($d4['nilai'] == $option['value']) ? 'selected' : '' ?>><?= $option['label'] ?></option>
															<?php endforeach; ?>
														</select>
													<?php
													} elseif ($d['ada_pilihan'] == 2) {
														// Option values
														$options = [
															['value' => '1', 'label' => 'Sangat Memuaskan'],
															['value' => '0.75', 'label' => 'Sudah Memuaskan'],
															['value' => '0.5', 'label' => 'Kurang Memuaskan'],
															['value' => '0.25', 'label' => 'Tidak Memuaskan'],
														];
													?>
														<select name="nilai[]" class="form-control" required>
															<option value="">--Pilih--</option>
															<?php foreach ($options as $option) : ?>
																<option value="<?= $option['value'] ?>" <?= ($d4['nilai'] == $option['value']) ? 'selected' : '' ?>><?= $option['label'] ?></option>
															<?php endforeach; ?>
														</select>
													<?php
													} elseif ($d['ada_pilihan'] == 3) {
														// Option values
														$options = [
															['value' => '1', 'label' => 'Sangat Cekatan'],
															['value' => '0.75', 'label' => 'Cekatan'],
															['value' => '0.5', 'label' => 'Kurang Cekatan'],
															['value' => '0.25', 'label' => 'Tidak Cekatan'],
														];
													?>
														<select name="nilai[]" class="form-control" required>
															<option value="">--Pilih--</option>
															<?php foreach ($options as $option) : ?>
																<option value="<?= $option['value'] ?>" <?= ($d4['nilai'] == $option['value']) ? 'selected' : '' ?>><?= $option['label'] ?></option>
															<?php endforeach; ?>
														</select>
													<?php
													} else {
													?>
														<input type="number" name="nilai[]" class="form-control" step="0.001" value="<?= $d4['nilai'] ?>" required autocomplete="off">
													<?php
													}
													?>
												</div>
											<?php } ?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
											<button type="submit" name="edit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					<?php
						$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
require_once('template/footer.php');
?>