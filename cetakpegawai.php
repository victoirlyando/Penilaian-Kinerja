<?php
require_once('includes/init.php');

$user_role = get_role();
if($user_role == 'admin' || $user_role == 'user') {
?>	

<html>
	<head>
		<title>Sistem Penilaian Kinerja Pegawai Dinas Komunikasi dan Iformatika</title>
	</head>
<body onload="window.print();">


<div class="panel-heading">
                            <table width="100%">
							<tr>
							<td><div align="center">
							<div align="center">
                                <b>DINAS KOMUNIKASI DAN INFORMATIKA KAB. TANAH DATAR<br>Jl. Sultan Alam Bagagarsyah, Pagaruyung Batusangkar, Tanah Datar 27281, Sumatera Barat</b><br><hr><br>Laporan Hasil Akhir Perankingan<br> <?= Date('d F Y'); ?></div>
							 </td>
							</tr>
							</table>
                    </div>
<br>
<br>


	<table width="100%" cellspacing="0" cellpadding="5" border="1">
		<thead>
			<tr align="center">
				<th>Nama Alternatif</th>
				<th>Nilai Qi</th>
				<th width="15%">Rank</th>
				<th width="25%">Keterangan</th>
			</tr>
		</thead>
        <tbody>
					<?php 
                    $pegawai  = $_SESSION['user_id'];
						$no=0;
						$query = mysqli_query($koneksi,"SELECT * FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif JOIN user ON alternatif.id_user = user.id_user Where user.id_user = '$pegawai' ORDER BY hasil.nilai ASC");
						while($data = mysqli_fetch_array($query)){
						$no++;
					
					?>
					<tr align="center">
						<td align="left"><?= $data['nama'] ?></td>
						<td><?= $data['nilai'] ?></td>
						<td><?= $no; ?></td>
						<?php 
						$status = "";
						$data1 = $data['nilai'];
							if ($data['nilai']>=0 && $data['nilai'] < 0.2500): 
									$status= 'Sangat Bagus';
							elseif ($data['nilai'] >= 0.2500 && $data['nilai'] < 0.5000):
									$status= 'Sudah Bagus';
							elseif ($data['nilai'] >= 0.5000 && $data['nilai'] < 0.7500):
									$status= 'Perlu Ditingkatkan';
							elseif ($data['nilai'] >= 0.7500 && $data['nilai'] < 1):
									$status= 'Perlu Ditindak Lanjuti';
							else:
								$status = 'Belum Memenuhi Kriteria';
								endif;
						?>
						<td><b><?php echo $status ?></b><br></td>		 
		 
						
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
            <br>
                    <br>
                    <br>
                    <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
                    <tr>
                        <td width="63%" bgcolor="#FFFFFF">
                            <p align="center"></p><br/>
                        </td>
                        <td width="50%" bgcolor="#FFFFFF">
                            <div align="center">Dinas Komunikasi dan Informatika KAB. Tanah Datar
								<p><?= Date('d F Y'); ?><br/></p>
                           Kepala Dinas Komunikasi dan Informatika KAB. Tanah Datar
                            <br/><br/>
                            <br/><br/>
                          
                     
                          
                            </div>
                        </td>
                    </tr>
                    </table> 

<?php

}
?>