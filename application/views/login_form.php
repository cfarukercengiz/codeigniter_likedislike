<!doctype html>
<html lang="tr">
<head>
    <?php $this->load->view("inc/head"); ?>
    <title>Giriş Yap</title>
</head>
<body>
<div class="container">
    <h3 class="text-center">Giriş Yap</h3>

    <?php if ($this->session->userdata("error")) { ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="alert alert-danger"><?php echo $this->session->userdata("error"); ?></div>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 well">
            <form action="<?php echo base_url("giris"); ?>" method="post" autocomplete="off">
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label>Şifre</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Giriş Yap</button>
                <button type="reset" class="btn btn-danger">Temizle</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>