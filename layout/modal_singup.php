<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SingupModal">
  Đăng ký
</button>

<!-- Modal -->
<div class="modal fade" id="SingupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="emailsingup" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mật khẩu</label>
            <input type="password" class="form-control" name="password_singup" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Đăng ký</button>
      </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
