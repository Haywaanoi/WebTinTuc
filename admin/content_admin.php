<?php

if (isset($_GET['admin']))
	switch ($_GET['admin']) {
		case 'nhomtin':
			include("view/nhom_tin_view.php");
			break;
        case "loaitin":
            include("view/loai_tin_view.php");
            break;
		case "tintuc":
			include("view/tin_tuc_view.php");
			break;
		case "binhluan":
			include("view/binh_luan_view.php");
	}
else {
	header("location:index.php");
}

?>