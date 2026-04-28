<?=component('head')?> <head>
  <style>
    .divider:after,
    .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }
  </style>
</head>
<body style="background-color: #e6e6e6ff !important"> <?=component('sidebar')?> <?=component('navbar')?> <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form  method="POST" autocomplete="off" action="<?php echo url('dologin'); ?>">
              <?php if(isset($_SESSION['error']) && !is_null($_SESSION['error'])): ?>
                  <div class="alert alert-danger" id='error'>
                      <?php echo $_SESSION['error']; ?>
                      <?php $_SESSION['error'] = null ;?>
                      <?php unset($_SESSION['error']); ?>
                  </div>
              <?php endif; ?>
              <?php if(isset($_SESSION['success']) && !is_null($_SESSION['success'])): ?>
                  <div class="alert alert-success" id='success'>
                      <?php echo $_SESSION['success']; ?>
                      <?php $_SESSION['success'] = null; ?>
                      <?php unset($_SESSION['success']); ?>
                  </div>                    
              <?php endif; ?>
              <?php if(isset($_SESSION['info']) && !is_null($_SESSION['info'])): ?>
                  <div class="alert alert-warning" id='info'>
                      <?php echo $_SESSION['info']; ?>
                      <?php $_SESSION['info'] = null; ?>
                      <?php unset($_SESSION['info']); ?>
                  </div>
              <?php endif; ?>
              <?=csrf_token();?>
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form1Example13">Email </label>
              <input type="email" id="username" name="username" class="form-control form-control-lg" />
            </div>
            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
              <label class="form-label" for="form1Example23">Password</label>
              <input type="password" id="password" name="password" class="form-control form-control-lg" />
            </div>
            <div class="d-flex justify-content-around align-items-center mb-4 ">
              <!-- Checkbox -->
              <div class="form-check d-none">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="#!">Esqueceu a senha?</a>
            </div>
            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Login</button>
            <button type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-danger">Cancelar</button>
            
          </form>
        </div>
      </div>
    </div>
  </section> <?=component('feetlb')?> 