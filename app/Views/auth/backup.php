<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>
<section class="section">
      <div class="container mt-5">
        <div class="card-body">

        
        <div class="row">
          <div class="col-lg-6">
            
            <!-- <div class="login-brand">
              <img src="logoT.png" alt="logo" width="130" class="shadow-light rounded-circle">
            </div> -->
            
            <div class="card card-primary" style="margin-top: 88px;">
              <div class="card-header" style="margin-left: 334px;">
                <h4>Login Tata.Net</h4>
              </div>

              <div class="card-body">
              <?= view('Myth\Auth\Views\_message_block') ?>

                <?php if (session()->getFlashdata('error')) : ?>
                  <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">x</button>
                      <b>Error</b>
                      <?= session()->getFlashdata('error') ?>
                    </div>
                  </div>
                <?php endif; ?>
                <form action="<?= route_to('login') ?>" method="post">
						<?= csrf_field() ?>
            <?php if ($config->validFields === ['email']) : ?>
                  <div class="form-group">
                    <label for="login" ><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                    </div>
                  </div>
                  <?php else : ?>
                  <div class="form-group">
                    <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                    <?= session('errors.login') ?>
                    </div>
                  </div>
                  <?php endif; ?>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <!-- <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a> -->
                      </div>
                    </div>
                    <input type="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                    </div>
                  </div>

                  <?php if ($config->allowRemembering) : ?>
                  <div class="form-check">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?> tabindex="3" id="remember-me">
                      <label class="custom-control-label">
                      <?= lang('Auth.rememberMe') ?>
                      </label>
                    </div>
                  </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <div style="margin-top: 20px; margin-left: 178px;">
                    <?php if ($config->allowRegistration) : ?>
                    <a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                    <?php endif; ?>
                    <?php if ($config->activeResetter) : ?>
                      <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                      <?php endif; ?>
            </div>
                  </div>
                </form>


              </div>
            </div>
            
            
          </div>

          <div class="col-lg-6">  
            <div class="card card-primary" style="margin-top: 88px; margin-left: -33px;">
              
            
              <div class="card-header"style="margin-top: -124px;">
              <img src="logoR.png" alt="" style="margin-top: 82px; margin-left: 42px" width="82%">
              </div>
              
            </div>
            
          </div>
        </div>
        
      </div>
      </div>
      </section>
      <?= $this->endSection() ?>