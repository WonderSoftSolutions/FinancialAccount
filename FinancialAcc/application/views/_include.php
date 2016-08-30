  <!-- Modal Recover -->
  <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="ChangepasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="recoverForm">
          <div class="modal-header">
            <h4 class="modal-title" id="ChangepasswordLabel">Change Password</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-lock text-muted"></i></span>
                <input type="password" name="currentpassword" autocomplete="off" id="currentpassword" class="form-control" placeholder="Enter your current password">
              </div>
            </div><!-- /.form-group -->
			<div class="form-group">
              <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-lock text-muted"></i></span>
                <input type="password" name="npassword" id="npassword"  autocomplete="off" class="form-control" placeholder="Enter your new password">
              </div>
            </div><!-- /.form-group -->
			<div class="form-group">
              <div class="input-group input-group-in">
                <span class="input-group-addon"><i class="fa fa-lock text-muted"></i></span>
                <input type="password" name="cpassword" id="cpassword" autocomplete="off" class="form-control" placeholder="Enter new password again">
              </div>
            </div><!-- /.form-group -->
			<span id="resultChangepassword"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" onclick="changepassword();" class="btn btn-primary">Done</button>
          </div>
        </form><!-- /#recoverForm -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /#recoverAccount -->