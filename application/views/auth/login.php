<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div id="login_form">

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><img src="<?php echo $assets_url;?>img/logo.png" alt=""><br />Connexion</h3>
        </div>

          <div class="panel-body">
            <?php if($message != ''){ ?>
        <div class="alert alert-danger"><?php echo $message;?></div>

        <?php } ?>
            <form accept-charset="UTF-8" role="form" action="<?php echo base_url();?>auth/login" method="POST">
                    <fieldset>
                <div class="form-group">
                  <input class="form-control" placeholder="Login" name="identity" type="text">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="">
              </div>
              <div class="checkbox">
                  <label>
                    <input name="remember" type="checkbox" value="Remember Me"> Se souvenir de moi
                  </label>
                </div>
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
    </div>
  </div>
</div>