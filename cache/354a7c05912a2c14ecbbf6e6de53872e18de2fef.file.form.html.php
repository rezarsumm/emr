<?php /* Smarty version Smarty-3.0.7, created on 2023-06-02 07:50:26
         compiled from "application/views\login/operator/form.html" */ ?>
<?php /*%%SmartyHeaderCode:24658606e5c73cfaf69-62623292%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '354a7c05912a2c14ecbbf6e6de53872e18de2fef' => 
    array (
      0 => 'application/views\\login/operator/form.html',
      1 => 1685501796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24658606e5c73cfaf69-62623292',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)==''){?>
<p class="login-box-msg"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" height="12" alt="" style="vertical-align: middle;" /> You are entering restricted area
    <strong>Please Login</strong> First to acces this application!</p>
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/operatorlogin/login_process');?>
" method="post">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" maxlength="30" placeholder="Username" />
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" name="pass" maxlength="30" placeholder="Password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>

                </label>
            </div>
        </div>        
        <div class="col-xs-4">
            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" name="save[login]" />
        </div>
        <div class="col-xs-12">
            <br>
            <div style="font-size: 10px;opacity: 0.5;text-align: center;">
                <span style="text-align: center;">Copyright &copy; 2017 SIMRS PKU Muhammadiyah Gamping</span>
            </div>
        </div>
    </div>
</form>
<?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='error'){?>
<div class="alert alert-danger alert-dismissible">
    <p class="login-box-msg"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" height="12" alt="" style="vertical-align: middle;" /> Login Failed
        <strong>Your account is not found</strong>, Please Try Again or contact your administrator</p>
</div>
<form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/operatorlogin/login_process');?>
" method="post">
    <div class="form-group has-feedback">
        <input type="text" name="username" maxlength="30" placeholder="Username"  class="form-control"/>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" name="pass" maxlength="30" placeholder="Password" class="form-control"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>

                </label>
            </div>
        </div>   
        <div class="col-xs-4">
            <input type="submit" name="save[login]" class="btn btn-primary btn-block btn-flat" value="Sign In"/>
        </div> 
        <div class="col-xs-12">
            <br>
            <div style="font-size: 10px;opacity: 0.5;text-align: center;">
                <span style="text-align: center;">Copyright &copy; 2017 SIMRS PKU Muhammadiyah Gamping</span>
            </div>
        </div>
    </div>
</form>
<?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='locked'){?>
<div class="alert">
    <h2><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" height="16" alt="" style="vertical-align: middle;" /> Login Failed</h2>
    <p><strong>Your account has been locked</strong>, Please contact your administrator to activate your account</p>
</div>
<div class="content-left">
    <form action="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/operatorlogin/login_process');?>
" method="post">
        <label for="aid_username">Username :</label>
        <input type="text" name="username" maxlength="30" />
        <br />
        <label for="aid_password">Password :</label>
        <input type="password" name="pass" maxlength="30" />
        <div class="clear"></div>
        <div class="action">
            <input type="submit" value="" name="save[login]" />
        </div>
        <div class="clear"></div>     
    </form>
</div>
<?php }elseif((($tmp = @$_smarty_tpl->getVariable('login_st')->value)===null||$tmp==='' ? '' : $tmp)=='still'){?>
<div class="alert">
    <h2><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
resource/doc/images/icon/alert.png" height="16" alt="" style="vertical-align: middle;" />You are entering restricted area</h2>
    <p><strong>You are still login!</strong>, back to main menu <a href="javascript:window.history.back()">click here</a></p>
</div>
<?php }?>
