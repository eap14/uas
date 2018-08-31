<?php
if(session_destroy()){
	echo '<script>window.location="'.$adminurl.'login.php"</script>';
} else {
	echo "Log out Gagal";
}