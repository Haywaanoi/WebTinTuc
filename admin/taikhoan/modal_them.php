<div class="button-add-student">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        data-bs-whatever="@mdo">Thêm</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm tài khoản</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="taikhoan/them_taikhoan.php" enctype="multipart/form-data">
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="recipient-name" name="Email">
                        </div>
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="">
                            <label for="confirm-password" class="col-form-label">Xác nhận mật khẩu:</label>
                            <input type="password" class="form-control" id="confirm-password" name="confirm_password">
                        </div>
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Họ và tên:</label>
                            <input type="text" class="form-control" id="recipient-name" name="Name">
                        </div>
                        <div class="">
                            <label for="recipient-name" class="col-form-label">Thuộc nhóm tin:</label>
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option selected>Chọn</option>
                                <option value="admin">ADMIN</option>     
                                <option value="user">USER</option>        
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passwordInput = document.getElementById('password');
        var confirmPasswordInput = document.getElementById('confirm-password');
        var submitButton = document.querySelector('button[name="submit"]');

        confirmPasswordInput.addEventListener('input', function() {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.setCustomValidity('Mật khẩu không khớp.');
            } else {
                confirmPasswordInput.setCustomValidity('');
            }
        });

        // Kiểm tra xác nhận mật khẩu trước khi gửi biểu mẫu
        submitButton.addEventListener('click', function() {
            if (passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.setCustomValidity('Mật khẩu không khớp.');
            } else {
                confirmPasswordInput.setCustomValidity('');
            }
        });
    });
</script>