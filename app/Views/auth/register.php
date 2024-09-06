<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="<?=base_url()?>/logoT.png" alt="logo" width="130" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              <?= view('Myth\Auth\Views\_message_block') ?>
              <div class="card-body">
              <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row">
                    <div class="form-group col-6">
                      <label for="first_name">First Name</label>
                      <input class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="firstname" type="text" placeholder="Enter your first name" value="<?= old('firstname') ?>" />
                    </div>
                    <div class="form-group col-6">
                      <label for="lastname">Last Name</label>
                      <input class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>" name="lastname" type="text" placeholder="Enter your last name" value="<?= old('lastname') ?>" />
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="email">Email</label>
                      <input type="text" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email"
                        aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                            
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Username</label>
                      <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                    </div>
                  </div>

                  

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                    <label for="pass_confirm"><?=lang('Auth.repeatPassword')?></label>
                      <input type="password" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm">
                    </div>
                  </div>

                  

                  

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?>
                      
                    </button>
                  </div>
                </form>
                <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
              </div>
            </div>
            <!-- <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div> -->
          </div>
        </div>
      </div>
    </section>
    <?= $this->endSection() ?>
