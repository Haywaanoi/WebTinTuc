<?php 
$nhomtin = $dbh->query("SELECT * FROM nhom_tin ");
$nhomtin->fetch(PDO::FETCH_ASSOC);
$nhomtin1 = $nhomtin->rowCount();

?>
<div class="button-add-student">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">Thêm</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm loại tin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="loaitin/them_loaitin.php" enctype="multipart/form-data">
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Tên loại tin:</label>
                            <input type="text" class="form-control" id="recipient-name" name="ten_loaitin">
                        </div>
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Thuộc nhóm tin:</label>
                            <select class="form-select" aria-label="Default select example" name="nhomtin">
                                <option selected>Chọn</option>
                                <?php 
                                foreach ($nhomtin as $nhom) { ?>
                                <option value="<?php echo $nhom["id_nhomtin"] ?>"><?php echo $nhom["ten_nhomtin"] ?></option>
                                <?php
                                }
                                ?>
                                
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>