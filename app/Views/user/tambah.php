<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>

<main>
    <div class="container-fluid px-4" style="margin-top: 4em;">
        <!-- <h1 class="mt-4">DATA USER</h1> -->
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengelolaan Data User</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <!-- Start Flash Data -->
                
                
                <?= $title ?>
            </div>
            <div class="card-body">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <!-- <label for="inputFirstName">Firstname</label> -->
                                <input class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="firstname" type="text" placeholder="Enter your first name" value="<?= old('firstname') ?>" />
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <!-- <label for="inputLastName">Last name</label>     -->
                                <input class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>" name="lastname" type="text" placeholder="Enter your last name" value="<?= old('lastname') ?>" />
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        
                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
                        
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" />
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-block" href="login.html"><?= lang('Auth.register') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>