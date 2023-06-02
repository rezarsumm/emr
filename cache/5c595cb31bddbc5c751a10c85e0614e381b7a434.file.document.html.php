<?php /* Smarty version Smarty-3.0.7, created on 2023-06-02 15:03:03
         compiled from "application/views\base/operator/document.html" */ ?>
<?php /*%%SmartyHeaderCode:244356479a237d38051-64000133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c595cb31bddbc5c751a10c85e0614e381b7a434' => 
    array (
      0 => 'application/views\\base/operator/document.html',
      1 => 1654305988,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '244356479a237d38051-64000133',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!-- head -->
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
        <meta name='description' content="<?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['meta_desc'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <meta name='keywords' content="<?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['meta_key'])===null||$tmp==='' ? '' : $tmp);?>
" />
        <meta name='robots' content='index,follow' />
        <title><?php echo (($tmp = @$_smarty_tpl->getVariable('page')->value['nav_title'])===null||$tmp==='' ? 'Home' : $tmp);?>
 - <?php echo (($tmp = @$_smarty_tpl->getVariable('site')->value['site_title'])===null||$tmp==='' ? '' : $tmp);?>
</title>
        <link href="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/logo.png" rel="SHORTCUT ICON" />
        <!-- themes style -->
        <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->getVariable('THEMESPATH')->value;?>
" media="screen" />
        <!-- other style -->
        <?php echo $_smarty_tpl->getVariable('LOAD_STYLE')->value;?>

    </head>
    <!-- body -->
    <body class="common">
        <!-- load javascript -->
        <?php echo $_smarty_tpl->getVariable('LOAD_JAVASCRIPT')->value;?>

        <!-- end of javascript  -->
        <script type="text/javascript">
            $(document).ready(function() {
                // user account
                $("#user_profile_click").click(function() {
                    $(".header-profile-detailed").slideToggle(100);
                    return false;
                });
                // dropdown menu
                $(".parent").click(function() {
                    $(this).toggleClass('down');
                    $(this).siblings().slideToggle(100);
                });
            }); 
        </script>     
        <!-- layout -->
        <div class="page">
            <div class="header">
                <div class="header-title">
                    <a href="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/logo.png" alt="" /> E Medical Record V.1.1.0</a>
             
                </div>
              
                <div class="header-profile" style="padding-top: 0px;">
                        <div class="as" style="color: floralwhite;height: 0px; padding-left: 500px;padding-top: 5px; "> 
                                <?php if ($_smarty_tpl->getVariable('com_user')->value['role_nm']=='Farmasi'){?>
                                <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/icon.ok.png" alt="" />
                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('medis/rawat_jalan/resepmasuk');?>
" style="color: white;">

                                <?php $_smarty_tpl->tpl_vars['cekresepmasuk'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_resep_masuk(), null, null);?>
                                <?php echo $_smarty_tpl->getVariable('cekresepmasuk')->value;?>
 Resep </a>

                                 <img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/icon.ok.png" alt="" />
                                <a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('op/jadwal/bhp');?>
" style="color: white;">
                                <?php $_smarty_tpl->tpl_vars['cekbhp'] = new Smarty_variable($_smarty_tpl->getVariable('m_rawat_jalan')->value->cek_bhp(), null, null);?>
                                <?php echo $_smarty_tpl->getVariable('cekbhp')->value;?>
 BHP </a>
                                <?php }else{ ?>
                                
                                <?php }?>
                          </div>
                 <ul>
                        <li><a href="#" class="users active" id="user_profile_click"><?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['NamaLengkap'])===null||$tmp==='' ? '' : $tmp);?>
</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
                <div class="header-profile-detailed" style="display: none;">
                    <ul>
                        <li class="hp-user-profile">
                            <img src="<?php echo $_smarty_tpl->getVariable('com_user')->value['user_img'];?>
" alt="" />
                            <?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['role_nm'])===null||$tmp==='' ? '' : $tmp);?>
<br /><?php echo (($tmp = @$_smarty_tpl->getVariable('com_user')->value['jabatan_alias'])===null||$tmp==='' ? '' : $tmp);?>

                        </li>
                        <!--<li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('dashboard/account_setting/data_pribadi');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/user-image.png" alt="" /> Data Pribadi</a></li>-->
                        <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('pengaturan/account_setting/account');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/edit_profile.png" alt="" /> Account Settings</a></li>
                        <!--<li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('dashboard/account_setting/change_role');?>
"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/icon-angud.png" alt="" /> Change Role</a></li>-->
                        <li><a href="<?php echo $_smarty_tpl->getVariable('config')->value->site_url('login/operatorlogin/logout_process');?>
" class="logout"><img src="<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/icon/logout.png" alt="" /> Logout</a></li>
                    </ul>
                </div>
                
            </div>
            <div class="main-content">
                <div class="sidebar">
                    <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('template_sidebar')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>  
                     
                </div>
                <div class="content" <?php if ($_smarty_tpl->getVariable('dashboard')->value){?>style="background-image: url('<?php echo $_smarty_tpl->getVariable('BASEURL')->value;?>
/resource/doc/images/splash/<?php echo $_smarty_tpl->getVariable('dashboard')->value;?>
');"<?php }?>>
                    <?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('template_content')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- end of layout  -->
    </body>
    <!-- end body -->
</html>

