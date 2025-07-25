<body class="bg-gradient-primary">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Form Login</h1>
                                    </div>

                                    <!-- Flash message -->
                                    <?= $this->session->flashdata('pesan'); ?>

                                    <!-- Form login -->
                                    <form method="post" action="<?= base_url('auth/login') ?>" class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Masukkan Username Anda" name="username" value="<?= set_value('username'); ?>">
                                            <?= form_error('username', '<div class="text-danger small ml-2">', '</div>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Masukkan Password Anda" name="password">
                                            <?= form_error('password', '<div class="text-danger small ml-2">', '</div>'); ?>
                                        </div>

                                       <button type="submit" class="btn btn-primary btn-user btn-block rounded-pill">Login</button>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('registrasi/index'); ?>">Belum Punya Akun? Daftar!</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
