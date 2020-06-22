
<!DOCTYPE html>
<html>
<?php $this->load->view('_partials/head.php') ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b><?php echo $this->libre->companydata()->nama; ?></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form id="form-data">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="button" class="btn btn-primary btn-block btn-flat" onclick="login()">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p></p>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
      </p>
      <p class="mb-0">
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<?php $this->load->view('_partials/js.php') ?>
<script type="text/javascript">
	function login() {
		$('.btn-login').prop('disabled',true);
		$.ajax({
          url: '<?php echo base_url() ?>auth/auth_process/',
          type: "POST",
          dataType: "JSON",
          data: {
              username	: $('[name="username"]').val(),
              password  : $('[name="password"]').val(),
          },
          success: function(data) {
              if (data.result == 'success') {
                  toastr.success(data.msg)
                  setTimeout(function(){ window.location.href = "<?php echo base_url() ?>landing" }, 1000);
                  ;
              } else if (data.result == 'fail') {
                  toastr.error(data.msg)
                  $('.btn-login').prop('disabled',false);
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              toastr.error("Internal Error")
              $('.btn-login').prop('disabled',false);
          }
      });
	}

	$('input').keypress(function(e) {
	    var key = e.which;
	    if (key == 13)
	    {
	        login();
	        return false;
	    }
	});

</script>
</body>
</html>
