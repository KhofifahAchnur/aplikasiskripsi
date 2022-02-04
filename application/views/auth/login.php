
<!-- <img width=220 height=220 src='adminlte/dist/img/logo.png'/ align="right">
<img width=200 height=200 src='adminlte/dist/img/wuri.png'/ align="center"> -->
<!-- Outer Row -->
<div class="text-center mt-3 mb-3">
<div class="row justify-content-center">

    <div class="col-lg-5">
    <div align="center">
    <img width=270 height=270 src='adminlte/dist/img/logo.png'/ align="top">
    <img width=250 height=250 src='adminlte/dist/img/wuri.png'/ align="top">
    </div>
        <div class="card o-hidden border-3 shadow-lg my-3">
            
            <div class="card-body p-0">
                
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                            </div>

                            <?= $this->session->flashdata('flash'); ?>

                            <form class="user" method="post" action="<?= base_url('auth') ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter username Address..." value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger PL-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger PL-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> -->
                            <!-- <div class="text-center">
                                <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>