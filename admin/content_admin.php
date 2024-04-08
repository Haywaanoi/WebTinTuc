<?php

if (isset($_GET['admin']))
	switch ($_GET['admin']) {
		case 'nhomtin':
			include("view/nhom_tin_view.php");
			break;
        case "loaitin":
            include("view/loai_tin_view.php");
            break;
	}
else {
	header("location:index.php");
}

?>