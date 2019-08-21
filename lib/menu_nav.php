<?php 
	if($row['tipe_user']=='Staf Seksi'){
?>
               <li>
                    <a href="?hal=<?=md5("dash")?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                
                <li>
                    <a href="?hal=<?=md5("perusahaan")?>">
                        <i class="fa fa-book"></i>
                        <span>Data Koperasi</span>
                    </a>
                </li>
                <li>
                    <a href="?hal=<?=md5("pengurus")?>">
                        <i class="fa fa-group"></i>
                        <span>Data Pengurus</span>
                    </a>
                </li>
                <li>
                    <a href="?hal=<?=md5("sektor")?>">
                        <i class="fa fa-flag"></i>
                        <span>Data Sektor Usaha</span>
                    </a>
                </li>
                <li>
                    <a href="?hal=<?=md5("kecamatan")?>">
                        <i class="fa fa-building"></i>
                        <span>Data Kecamatan</span>
                    </a>
                </li>
                <li>
                    <a href="?hal=<?=md5("kelurahan")?>">
                        <i class="fa fa-home"></i>
                        <span>Data Kelurahan</span>
                    </a>
                </li>
               <li>
                    <a href="?hal=<?=md5("wp")?>">
                        <i class="fa fa-slack"></i>
                        <span>Penentuan </span>
                    </a>
                </li>
<?php }?>
<?php 
	if($row['tipe_user']=='Staf Data'){
?>
               <li>
                    <a href="?hal=<?=md5("dash")?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="?hal=<?=md5("pengguna")?>">
                        <i class="fa fa-user"></i>
                        <span>Data Pengguna </span>
                    </a>
                </li>
<?php }?>
<?php 
	if($row['tipe_user']=='Kasie'){
?>
               <li>
                    <a href="?hal=<?=md5("dash")?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Beranda</span>
                    </a>
                </li>
               <li>
                    <a href="?hal=<?=md5("wp")?>">
                        <i class="fa fa-slack"></i>
                        <span>Penentuan </span>
                    </a>
                </li>
<?php }?>

<!--
<?php 
	if($row['tipe_user']=='Pengurus'){
?>
				<li>
                    <a href="?hal=?=md5("dashak")?>">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="?hal=?=md5("lisdatak")?>">
                        <i class="fa fa-map-marker"></i>
                        <span>Data Koperasi</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-user"></i>
                        <span>Data Profil</span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-lock"></i>
                        <span>Ganti Password</span>
                    </a>
                </li>
<?php }?>-->
