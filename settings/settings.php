<div class="wrap">
    <?php    
    if (isset($this->message)) {
        ?>
        <div class="updated fade"><p><?php echo $this->message; ?></p></div>  
        <?php
    }
    if (isset($this->errorMessage)) {
        ?>
        <div class="error fade"><p><?php echo $this->errorMessage; ?></p></div>  
        <?php
    }

?>
<style>
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 75px;
  cursor: pointer;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before,
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '';
  position: absolute;
}
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  left:0; top: -3px;
  width: 65px; height: 30px;
  background: #DDDDDD;
  border-radius: 15px;
  transition: background-color .2s;
}
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  width: 20px; height: 20px;
  transition: all .2s;
  border-radius: 50%;
  background: #7F8C9A;
  top: 2px; left: 5px;
}

/* on checked */
[type="checkbox"]:checked + label:before {
  background:#34495E; 
}
[type="checkbox"]:checked + label:after {
  background: #39D2B4;
  top: 2px; left: 40px;
}

[type="checkbox"]:checked + label .ui,
[type="checkbox"]:not(:checked) + label .ui:before,
[type="checkbox"]:checked + label .ui:after {
  position: absolute;
  left: 6px;
  width: 65px;
  border-radius: 15px;
  font-size: 14px;
  font-weight: bold;
  line-height: 22px;
  transition: all .2s;
}
[type="checkbox"]:not(:checked) + label .ui:before {
  content: "no";
  left: 32px
}
[type="checkbox"]:checked + label .ui:after {
  content: "yes";
  color: #39D2B4;
}
[type="checkbox"]:focus + label:before {
  border: 1px dashed #777;
  box-sizing: border-box;
  margin-top: -1px;
}
</style>
<div id="poststuff">
<div id="post-body" class="metabox-holder columns-2">
<div id="post-body-content">
<div id="normal-sortables" class="meta-box-sortables ui-sortable">                        
<div class="postbox" style="width:100%; float:left;">
<div class="inside">
<div style="padding:15px; width:97%;background-color: #433a3b; border:1px #433a3b solid;border-bottom: 4px #e96656 solid; color:#FFFFFF; float:left;">
<div style=" width:250px;color:#FFFFFF; padding:10px; font-size:18px; float:left;">Protect BenignSource Settings</div>
<?php 
$benignprotectversion = get_option('pbs_db_version');
if ($benignprotectversion == null ){?>
<div style=" width:250px;color:#FFFFFF; padding:10px; font-size:14px; float:left;">if you are using version 1.0 Please Deactivate the plugin and Activate again.</div>
<?php } else {?>
<?php }?>

<div style="float:right; width:300px;"><?php echo '<img src="' . esc_attr( plugins_url( '../img/protect_logo.jpg', __FILE__ ) ) . '" alt="Protect BenignSource" border="0px"> ';?></div></div>
<div style="padding:15px; width:97%;background-color: #433a3b; border:1px #433a3b solid;color:#FFFFFF; float:left;">
<ul class="pbstabbs">
<li><a href="javascript:void(0)" class="pbstablinks" onclick="openpBsjava(event, 'Settings')">Settings</a></li>
<li><a href="javascript:void(0)" class="pbstablinks" onclick="openpBsjava(event, 'Manage')">Manage Access</a></li>
<li><a href="javascript:void(0)" class="pbstablinks" onclick="openpBsjava(event, 'Reports')">Reports</a></li>
</ul>
</div>
<div id="Settings" class="pbstabbscontent"><div style="width:100%; float:left;text-align:center; font-size:18px; padding:10px;">Support us and use full functionality of Premium Version 2.0 <a href="http://www.benignsource.com/product/protect-benignsource/"  target="_blank">Upgrade</a></div>
<div style="padding:15px;  width:97%; float:left; border:1px #433a3b solid; border-top:0px; border-bottom:0px;">
<div style=" padding:15px; width:50%; float:left;">
<?php 
$benignprotectbsloadfooter = get_option('benign_protectbs_load_footer');
if ($benignprotectbsloadfooter == null ){?>
<h2 style="border-bottom: 4px #e96656 solid;color:#e96656; width:45%;font-size:18px; font-weight:bold;">Step 1</h2>
<?php }else{?>
<h2 style="border-bottom: 4px #00CC00 solid;color:#e96656; width:45%;font-size:18px; font-weight:bold;">Step 1</h2>
<?php }?>
<p>Protect your WordPress from being loaded in another website</p><p>After entering the domain and give save your WordPress automatically becomes protected from load in other website. That is all!
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<p>
<label for="benign_protectbs_load_footer"><strong><?php _e('WebSite Domain', $this->plugin->name); ?></strong></label>
<input type="text" name="benign_protectbs_load_footer" id="benign_protectbs_load_footer" size="70" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="<?php echo esc_attr( $bs_insert_footer ); ?>" />
<?php echo $this->settings['benign_protectbs_load_footer']; ?>
</p>
<?php wp_nonce_field($this->plugin->name, $this->plugin->name.'_nonce'); ?>
<div style="text-align:left; color:#FF0000;">Example: www.example.com do not use "http://" !</div>
<p><input name="submit" type="submit" class="button button-primary" value="<?php _e('Save', $this->plugin->name); ?>" /></p></form></div>
<div style=" padding:15px; width:40%; float:left;"><h2 style="border-bottom: 4px #00CC00 solid;color:#e96656; width:55%;font-size:18px; font-weight:bold;">Step 2 is Automatically</h2><div style="margin-top:30px;">After activate the plugin your WordPress automatically becomes protected from:<br /><br />Copy Text, Right Click, Save Images, CTRL+U, F12, CTRL+C</div></div>
</div>
<div style="width:97%; float:left; font-size:18px;border:1px #433a3b solid; border-top:0px; border-bottom:0px; padding:15px; background:#e96656; color:#FFFFFF;"><i><?php 
if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
echo 'This is a server using Windows!';
} else {
echo 'This is a server using linux!';
}?></i></div>
<!--start copy-->
<div style=" padding:15px; width:97%; float:left; border:1px #433a3b solid; border-top:0px; border-bottom:0px;">
<div style="width:47%; float:left; margin-right:30px;">
<h2 style="color:#e96656; font-size:18px; font-weight:bold;"> Step 3</h2><div style="margin-top:30px;">Protect your WordPress from being copied by WEBSITE COPIER Tools programs like HTTrack, FlashGet, GetRight, MemoWeb, FileHound

<?php
if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
?>
<div style="width:100%;"><h2 style="color:#e96656; font-size:16px;">Windows Server Settings</h2></div>
<div style="width:100%; margin-bottom:30px;">
<input type="submit" value="Only Premium Version" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
</div>
<div style="width:100%;">This action  will protect your website from download from programs like HTTrack, FlashGet, GetRight, MemoWeb, FileHound        
</div>
<?php } else {?>
<div style="width:100%; margin-bottom:30px;"><h2 style="color:#e96656; font-size:16px;">Apache Server Settings</h2></div>
<div style="width:100%; margin-bottom:30px;">Make sure that the file ".htaccess" exists in the Root directory</div>
<div style="width:100%; margin-bottom:30px;">

<?php
$count = get_option('pbs_applycopy');
if ($count < 1 ) {
?>
<input type="submit" name="applycopy" value="Only Premium Version" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<input type="text" name="pbs_applycopy" id="pbs_applycopy" style="display:none;" value="1" />

<?php
} else{?>
<input name="fulfilled"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Settings are fulfilled"/>
<?php
}
?></div>
<div style="width:100%; color:#FF0000; margin-bottom:30px;">This action will protect your website from download from programs like HTTrack, FlashGet, GetRight, MemoWeb, FileHound</div>
<?php }?>

</div></div>
<!--end copy-->
<div style="width:45%; float:left;"><h2 style="color:#e96656; font-size:18px; font-weight:bold;"> Step 4</h2><div style="margin-top:30px;">Protect your WordPress from Bad Bot  <i><b>212 Bad Bot include</b></i> Blocker
<?php
if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {
?>

<div style="width:100%; float:left; text-align:center; font-size:18px; color:#FF6600;">This feature is only available on the Linux / Apache server! </div>
<?php } else {?>
<div style="width:100%; margin-bottom:30px;"><h2 style="color:#e96656; font-size:16px;">Apache Server Settings</h2></div>
<div style="width:100%; margin-bottom:30px;">Make sure that the file ".htaccess" exists in the Root directory</div>
<div style="width:100%; margin-bottom:30px;">

<?php
$count = get_option('pbs_bad_bot');
if ($count < 1 ) {
?>
<input type="submit" name="applybadbot" value="Only Premium Version" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<input type="text" name="pbs_bat_bot" id="pbs_bad_bot" style="display:none;" value="1" />

<?php
} else{?>
<input name="fulfilled"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Settings are fulfilled"/>

<?php
}
?>
</div>
<div style="width:100%; color:#FF0000; margin-bottom:30px;">This action  will protect your website from Bad Bot</div>
<?php }?>

</div></div>
<div style=" width:100%; float:left;">
<div style="padding:10px; margin-top:20px; margin-bottom:20px;  padding-right:5px; width:98%;border-bottom: 4px #e96656 solid; background-color: #433a3b; color:#FFFFFF; float:left;">Setting Deny / Allow Aggressive Bad Bot</div>
<div style="width:100%; float:left;text-align:center; font-size:18px;">Support us and use full functionality of Premium Version 2.0 <a href="http://www.benignsource.com/product/protect-benignsource/"  target="_blank">Upgrade</a></div>
<?php if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {?>
<div style="width:100%; float:left; text-align:center; font-size:16px; color:#FF6600;">This feature is only available on the Linux / Apache server! </div>
<?php }?>
<div style="width:40%; padding:20px; float:left;">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<label for="pbs_deny_baidu"><strong></strong></label>
<input type="text" name="pbs_deny_baidu" id="pbs_deny_baidu" value="1" style="display:none;"/>
<?php 
$pbsdenybaidu = get_option('pbs_deny_baidu');
if ($pbsdenybaidu < 1 ){?>
<input type="submit" name="applydenybaidu" value="Deny" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<?php }else{?>
<input name="baidu"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 25px 13px 25px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Baidu is Deny"/>
<?php }?>
<label for="pbs_deny_baidu"><span class="ui"></span>Deny Chinese Search Engine Baidu</label>
</form>
<?php
if (isset($_POST['applydenybaidu'])){
function printme($applydenybaidu){
$file = get_home_path() .'/.htaccess';
$fp = fopen($file, 'a');
fwrite($fp, '
# Aggressive Chinese Search Engine
SetEnvIfNoCase User-Agent "Baiduspider" bad_bot
');
fclose($fp);
}
printme("{applydenybaidu}");
}
?></div>
<div style="width:40%; padding:20px; float:left;">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<label for="pbs_deny_yandex"><strong></strong></label>
<input type="text" name="pbs_deny_yandex" id="pbs_deny_yandex" value="1" style="display:none;"/>
<?php 
$pbsdenyyandex = get_option('pbs_deny_yandex');
if ($pbsdenyyandex < 1 ){?>
<input type="submit" name="applydenyyandex" value="Deny" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<?php }else{?>
<input name="yandex"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Yandex is Deny"/>
<?php }?>
<label for="pbs_deny_yandex"><span class="ui"></span>Deny Russian Search Engine Yandex</label>
</form>
<?php
if (isset($_POST['applydenyyandex'])){
function printme($applydenyyandex){
$file = get_home_path() .'/.htaccess';
$fp = fopen($file, 'a');
fwrite($fp, '
# Aggressive Russian Search Engine
SetEnvIfNoCase User-Agent "Yandex" bad_bot
');
fclose($fp);
}
printme("{applydenyyandex}");
}
?>
</div>
<div style="width:40%; padding:20px; float:left;">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<label for="pbs_deny_acunetix"><strong></strong></label>
<input type="text" name="pbs_deny_acunetix" id="pbs_deny_acunetix" value="1" style="display:none;"/>
<?php 
$pbsdenyacunetix = get_option('pbs_deny_acunetix');
if ($pbsdenyacunetix < 1 ){?>
<input type="submit" name="applydenyacunetix" value="Deny" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<?php }else{?>
<input name="acunetix"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="Acunetix is Deny"/>

<?php }?>
<label for="pbs_deny_acunetix"><span class="ui"></span>Deny User-Agent Acunetix</label>
</form>
<?php
if (isset($_POST['applydenyacunetix'])){
function printme($applydenyacunetix){
$file = get_home_path() .'/.htaccess';
$fp = fopen($file, 'a');
fwrite($fp, '
# Vulnerability Scanners
SetEnvIfNoCase User-Agent "Acunetix" bad_bot
');
fclose($fp);
}
printme("{applydenyacunetix}");
}
?>
</div>
<div style="width:40%; padding:20px; float:left;">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<label for="pbs_deny_fhscan"><strong></strong></label>
<input type="text" name="pbs_deny_fhscan" id="pbs_deny_fhscan" value="1" style="display:none;"/>
<?php 
$pbsdenyfhscan = get_option('pbs_deny_fhscan');
if ($pbsdenyfhscan < 1 ){?>
<input type="submit" name="applydenyfhscan" value="Deny" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<?php }else{?>
<input name="fhscan"  type="submit" style="text-align:center;text-transform:uppercase;padding:13px 15px 13px 15px;border-radius:4px;margin:10px;border:none;background-color:#4d5059;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" value="FHscan is Deny"/>
<?php }?>
<label for="pbs_deny_fhscan"><span class="ui"></span>Deny User-Agent FHscan</label>
</form>
<?php
if (isset($_POST['applydenyfhscan'])){
function printme($applydenyfhscan){
$file = get_home_path() .'/.htaccess';
$fp = fopen($file, 'a');
fwrite($fp, '
# Vulnerability Scanners
SetEnvIfNoCase User-Agent "FHscan" bad_bot
');
fclose($fp);
}
printme("{applydenyfhscan}");
}
?>
</div>
</div></div></div>
<div id="Manage" class="pbstabbscontent">
<div style="padding:15px; width:97%; float:left; border:1px #433a3b solid; border-top:0px; border-bottom:0px;">
<div style=" width:100%; float:left;">
<div style="padding:10px; margin-top:20px; margin-bottom:20px; padding-right:5px; width:98%;border-bottom: 4px #e96656 solid; background-color: #433a3b; color:#FFFFFF; float:left;">Block an IP or IP Range & Domain</div><div style="width:100%; float:left;text-align:center; font-size:18px;">Support us and use full functionality of Premium Version 2.0 <a href="http://www.benignsource.com/product/protect-benignsource/"  target="_blank">Upgrade</a></div>
<div style="width:40%; padding:20px; float:left;">

<label for="benign_protectbs_denyip"><strong></strong></label>
Example: IP: 192.168.0.1 or Range 192.168.0.1/24
<input type="text" name="protectbenignsource_denyip" id="protectbenignsource_denyip" size="70" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="This feature is only available in Premium Version" />
<input type="submit" name="applydenyip" value="Deny" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<label for="benign_protectbs_denyip"><span class="ui"></span>Deny IP Address</label>
</div>
<div style="width:40%; padding:20px; float:left;">

<label for="benign_protectbs_denydomain"><strong></strong></label>
Example: tumblr\.com
<input type="text" name="benign_protectbs_denydomain" id="benign_protectbs_denydomain" size="70" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="This feature is only available in Premium Version" />
<input type="submit" name="applydenydomain" value="Deny" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<label for="benign_protectbs_denydomain"><span class="ui"></span>Deny Domain</label>
<?php if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {?>
<div style="width:100%; float:left; text-align:center; font-size:14px; color:#FF6600;">This feature is only available on the Linux / Apache server! </div>
<?php }?>
</div>
</div>
<div style=" width:100%; float:left;">
<div style="padding:10px; margin-top:20px; margin-bottom:20px; padding-right:5px; width:98%;border-bottom: 4px #e96656 solid; background-color: #433a3b; color:#FFFFFF; float:left;">Automatic Ban IP & Protect WP Login</div>
<div style="width:40%; padding:20px; float:left;">
<?php
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}

$user_ip = getUserIP();
?>
<div style="width:100%; padding-bottom:20px; float:left;"><div style="width:80%; float:left; font-size:16px; color:#666666;">Your IP Address: <?php echo $user_ip;?></div></div>
<label for="benign_protectbs_allowip"><strong></strong></label>
Example: 192.168.0.1
<input type="text" name="benign_protectbs_allowip" id="benign_protectbs_allowip" size="70" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="This feature is only available in Premium Version" />
<input type="submit" name="applyallowip" value="Allow" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<label for="benign_protectbs_allowip"><span class="ui"></span>Allow IP Address</label>
<br />This will allow which IP addresses to have access!



<div style="width:100%; padding-bottom:20px; padding-top:20px; float:left;"><div style="width:80%; float:left; font-size:16px; color:#666666;"><p>
<label for="pbs_autobanipon"><strong></strong></label></p><p>
<input type="checkbox" name="pbs_autobanipon" id="pbs_autobanipon" value="1" <?php echo $this->settings['pbs_autobanipon'] ? ' checked="checked"' : ''; ?>/><label for="pbs_autobanipon"><span class="ui"></span>Turn on Automatic Ban IP in WP-Login</label></p></div>
<div style="width:80%; float:left; font-size:16px; color:#666666;"><p>
<label for="pbs_autobanipsourcecode"><strong></strong></label></p><p>
<input type="checkbox" name="pbs_autobanipsourcecode" id="pbs_autobanipsourcecode" value="1" <?php echo $this->settings['pbs_autobanipsourcecode'] ? ' checked="checked"' : ''; ?>/><label for="pbs_autobanipsourcecode"><span class="ui"></span>Turn on Automatic Ban IP Sourcecode</label></p></div>
<div style="width:10%; padding:10px; float:left;">
</div>
</div>
Use Sourcecode<br /><input type="text" size="50" onClick="this.select();" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="[protect_benignsource]" /><br />
Use Function<br /><?php echo '<input type="text" size="50"onClick="this.select();" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="<?php protect_benignsource_autoban();?>" />';?><br />
You can insert Sourcecode in each post / page or completely hide access using function.

</div>
<div style="width:40%; padding:20px; float:left;">
<div style="width:100%;  padding-bottom:20px;float:left; font-size:16px; color:#666666;">Redirect wp-login</div>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<label for="pbs_redirect"><strong></strong></label>
<?php $pbsredirectcheck = get_option('pbs_redirect');
if ($pbsredirectcheck == null ){?>
Example: http://www.yoursite.com/myaccount
<?php }else{?>
Redirect to: <?php echo $this->settings['pbs_redirect'];?><?php }?>
<input type="text" name="pbs_redirect" id="pbs_redirect" size="70" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="<?php echo esc_attr( $pbs_redirect ); ?>" />
<input type="submit" name="applyredirect" value="Redirect" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<label for="pbs_redirect"><span class="ui"></span>Redirect wp-login to another page</label>
</form>
This will redirect the wp-login to another page that you specify!
<?php
$pbsredirect = get_option('pbs_redirect');
if ($pbsredirect == null ){
}else{?>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<div style="width:100%; padding-bottom:20px; padding-top:20px; float:left;"><div style="width:60%; float:left; font-size:16px; color:#666666;">
<p><label for="pbs_applyredirect"><strong></strong></label></p><p>
<input type="checkbox" name="pbs_applyredirect" id="pbs_applyredirect" value="1" <?php echo $this->settings['pbs_applyredirect'] ? ' checked="checked"' : ''; ?>/><label for="pbs_applyredirect"><span class="ui"></span>Turn on Redirect</label></p></div><div style="width:20%; padding:10px; float:left;">
<input name="applyredirecton" type="submit" class="button button-primary" value="<?php _e('Save', $this->plugin->name); ?>" /></div></div>
</form><?php }?>
</div>
<div style="width:40%; padding:20px; float:left;">
<div style="width:100%;  padding-bottom:20px;float:left; font-size:16px; color:#666666;">Redirect Logout</div>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<label for="pbs_redirectlogout"><strong></strong></label>
<?php $pbsredirectchecklog = get_option('pbs_redirectlogout');
if ($pbsredirectchecklog == null ){?>
Example: http://www.yoursite.com/myaccount
<?php }else{?>
Redirect to: <?php echo $this->settings['pbs_redirectlogout'];?><?php }?>
<input type="text" name="pbs_redirectlogout" id="pbs_redirectlogout" size="70" style="background-color: #F1F2F7;border:1px #CCCCCC solid;" value="<?php echo esc_attr( $pbs_redirectlogout ); ?>" />
<input type="submit" name="applyredirectlogout" value="Redirect" style="text-align:center;text-transform:uppercase;padding:13px 35px 13px 35px;border-radius:4px;margin:10px;border:none;background-color:#e96656;box-shadow:none;text-shadow:none;font-weight:400;vertical-align:middle;cursor:pointer;white-space:nowrap;font-size:14px;color:#FFF;" />
<label for="pbs_redirectlogout"><span class="ui"></span>Redirect Logout to another page</label>
</form>
This will redirect the user Logout to another page that you specify!
<?php
$pbsredirectlogout = get_option('pbs_redirectlogout');
if ($pbsredirectlogout == null ){
}else{?>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post">
<div style="width:100%; padding-bottom:20px; padding-top:20px; float:left;"><div style="width:60%; float:left; font-size:16px; color:#666666;">
<p><label for="pbs_applyredirect"><strong></strong></label></p><p>
<input type="checkbox" name="pbs_applyredirectlogout" id="pbs_applyredirectlogout" value="1" <?php echo $this->settings['pbs_applyredirectlogout'] ? ' checked="checked"' : ''; ?>/><label for="pbs_applyredirectlogout"><span class="ui"></span>Turn on Redirect</label></p></div><div style="width:20%; padding:10px; float:left;">
<input name="applyredirectonlogout" type="submit" class="button button-primary" value="<?php _e('Save', $this->plugin->name); ?>" /></div></div>
</form><?php }?>
</div>
</div></div></div>
<div id="Reports" class="pbstabbscontent">
<div style="padding:15px; width:97%; float:left; border:1px #433a3b solid; border-top:0px; border-bottom:0px;">
<div style="padding:10px; margin-top:20px; margin-bottom:20px; padding-right:5px; width:98%;border-bottom: 4px #e96656 solid; background-color: #433a3b; color:#FFFFFF; float:left;">Reports IP </div><div style="width:100%; float:left;text-align:center; font-size:18px; padding:10px;">Support us and use full functionality of Premium Version 2.0 <a href="http://www.benignsource.com/product/protect-benignsource/"  target="_blank">Upgrade</a></div>
<div style="width:30%; float:left; font-size:16px; padding:10px; margin-right:10px;padding-bottom:20px;">Access Granted for this IP Address</div><div style="width:30%; float:left; font-size:16px;padding:10px; margin-right:10px; padding-bottom:20px;">Banned from you IP Address</div><div style="width:30%; float:left; font-size:16px;padding:10px; margin-right:10px; padding-bottom:20px;">Automatically Banned IP Address</div>
<div style="width:30%; float:left; border-right:3px #00CC00 solid; padding:10px; margin-right:10px;overflow-y: scroll; height:700px;">
<script>
</script>
<?php 
global $wpdb;
$allowaddress = $wpdb->get_results("SELECT ipaddress, time, id FROM {$wpdb->prefix}protectbenignsource_allowip ORDER BY time DESC", ARRAY_A);
foreach($allowaddress as $allowbsip){
echo '<div style="width:100%; float:left; border-bottom:1px #00CC00 solid;"><div style="width:39%; padding:5px; float:left; margin-right:5px;">' . $allowbsip['time'] . '</div><div style="width:30%;padding:5px;  float:left; margin-right:10px;">' . $allowbsip['ipaddress'] . '</div><div class="record" style="width:15%;float:left;padding:5px; padding-right:0px; margin-right:10px;" id="record-' . $allowbsip['ipaddress'] . '">'
?>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post" name="<?php echo esc_attr( $allowbsip['id']);?>" id="<?php echo esc_attr( $allowbsip['id']);?>">
<input type="submit" name="<?php echo esc_attr( $allowbsip['id']);?>" class="pbs_autodelete" id="<?php echo esc_attr( $allowbsip['id']);?>" value="Delete"/></form>
<?php
$pbs_deleteip = $allowbsip['id'];
echo '</div></div>';

global $wpdb;
if (isset($_POST[$pbs_deleteip])) {
$wpdb->query(
'DELETE  FROM '.$wpdb->prefix.'protectbenignsource_allowip WHERE id = "'.$pbs_deleteip.'"'
        );
    }
}
?>
</div>
<div style="width:30%; float:left; border-right:3px #e0a432 solid; padding:10px; margin-right:10px;overflow-y: scroll; height:700px;">
<?php 
function pbs_replace_string_in_file($filename, $string_to_replace, $replace_with){
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
}

global $wpdb;
$allowaddress = $wpdb->get_results("SELECT ipaddress, time, id FROM {$wpdb->prefix}protectbenignsource_denyip ORDER BY time DESC", ARRAY_A);
foreach($allowaddress as $allowbsip){
echo '<div style="width:100%; float:left; border-bottom:1px #e0a432 solid;"><div style="width:39%; padding:5px; float:left; margin-right:5px;">' . $allowbsip['time'] . '</div><div style="width:30%;padding:5px;  float:left; margin-right:10px;">' . $allowbsip['ipaddress'] . '</div><div class="record" style="width:15%;float:left;padding:5px; padding-right:0px; margin-right:10px;" id="record-' . $allowbsip['ipaddress'] . '">'
?>
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post" name="<?php echo esc_attr( $allowbsip['id']);?>" id="<?php echo esc_attr( $allowbsip['id']);?>">
<input type="submit" name="<?php echo esc_attr( $allowbsip['id']);?>" class="pbs_autodelete" id="<?php echo esc_attr( $allowbsip['id']);?>" value="Delete"/></form>
<?php
$pbs_deletedenyip = $allowbsip['id'];
echo '</div></div>';
global $wpdb;
if (isset($_POST[$pbs_deletedenyip])) {
$wpdb->query(
'DELETE  FROM '.$wpdb->prefix.'protectbenignsource_denyip WHERE id = "'.$pbs_deletedenyip.'"');

if (strncasecmp(PHP_OS, 'WIN', 3) == 0) {	
$file = get_home_path() .'/htaccess.txt';
} else {
$file = get_home_path() .'/.htaccess';
}
$searchfor = $allowbsip['ipaddress'];
$contents = file_get_contents($file);
$pattern = preg_quote($searchfor, '/');
$pattern = "/^.*$pattern.*\$/m";
if(preg_match_all($pattern, $contents, $matches)){ 
$filename=$file;
$string_to_replace = $allowbsip['ipaddress'];
$replace_with="";
pbs_replace_string_in_file($filename, $string_to_replace, $replace_with);
  }
 }
}
?>
</div>
<div style="width:30%; float:left; border-right:3px #e96656 solid; margin-right:10px;padding:10px; ">
<div style="width:100%; float:left; color:#FF6600; font-size:12px; margin-bottom:15px;">Last 20 records.</div>
<?php 
global $wpdb;
$allowaddress = $wpdb->get_results("SELECT ipaddress, time FROM {$wpdb->prefix}protectbenignsource_automatic_ban ORDER BY time DESC LIMIT 20", ARRAY_A);
foreach($allowaddress as $allowbsip){
echo '<div style="width:100%; float:left; border-bottom:1px #e96656 solid;"><div style="width:40%; padding:5px; float:left; margin-right:10px;">' . $allowbsip['time'] . '</div><div style="width:40%;padding:5px;  float:left; margin-right:10px;">' . $allowbsip['ipaddress'] . '</div></div>';
}?>
<div style="width:100%; float:left; padding:20px;">
<div style="width:100%; float:left; color:#FF6600; font-size:12px; margin-bottom:15px;">
Your export file is located in the root directory.</div>
<div style="width:100%; float:left;">
<form action="options-general.php?page=<?php echo $this->plugin->name; ?>" method="post" name="export" id="export">
<input type="submit" name="exportip" class="pbs_autodelete" value="Export All"/>
<input type="submit" name="deleteautoip" class="pbs_autodelete" value="Delete All"/>
</form></div>
<div style="width:100%; float:left; color:#FF6600; font-size:14px;"><a href="<?php echo get_site_url(); ?>/automatic_list.txt" target="_blank">See File</a></div>
<?php
if (isset($_POST['exportip'])) {
$pbs_file = get_home_path() .'/automatic_list.txt';
$pbs_filewrite = fopen($pbs_file, 'w');
/* insert field values into automatic_list.txt */
global $wpdb;
$export_result = $wpdb->get_results("SELECT ipaddress, time FROM {$wpdb->prefix}protectbenignsource_automatic_ban ORDER BY time DESC", ARRAY_A);
foreach($export_result as $row_result){        
fwrite($pbs_filewrite, $row_result['time']);
fwrite($pbs_filewrite, " - ");       
fwrite($pbs_filewrite, $row_result['ipaddress']);                       
fwrite($pbs_filewrite, ",");
fwrite($pbs_filewrite, "\n");
}
fclose($pbs_filewrite);
}
?>
<?php
global $wpdb;
if (isset($_POST['deleteautoip'])) {?>
<div class="notice notice-success is-dismissible"> 
	<p><strong>Settings saved.</strong></p>
</div>
<?php
$wpdb->query(
'DELETE  FROM '.$wpdb->prefix.'protectbenignsource_automatic_ban WHERE id = id '
        );
    }
?>
</div></div></div></div>
<div style="padding:15px; width:97%; float:left; border:1px #433a3b solid; height:260px; background:url(<?php echo esc_attr( plugins_url( '../img/protectbenign.jpg', __FILE__ ) );?>); border-top:0px; margin-bottom:30px;">
<div style=" width:100%;display: inline-block; padding:30px; float:left;">
<div style=" width:30%;display: inline-block; float:left; text-align:left;">
<lu><li style="font-size:16px; color:#e96656; font-weight:bold;">What will make?</li>
<li>Protect load in other website.</li>
<li>Protect from Copy</li>
<li>Protect copied by WEBSITE COPIER</li>
<li>Protect from Bad Bot</li>
<li>Block an IP or IP Range & Domain</li>
<li>Automatic Ban IP Address</li>
<li>Redirect wp-login</li>
<li>Redirect Logout</li>
</lu>
</div>
<div style=" width:40%;display: inline-block; float:left; text-align:left;">
<lu><li style="font-size:16px; color:#46a1cd; font-weight:bold;">Useful information</li>
<li><a style="text-decoration:none;" href="http://www.benignsource.com/category/documentation/protect-benignsource/" target="_blank" title="Documentation">Documentation</a></li>
<li><a style="text-decoration:none;" href="http://www.benignsource.com/forums/" target="_blank" title="Support">Support</a></li>
<li><a style="text-decoration:none;" href="http://www.benignsource.com/products/" target="_blank" title="Products">Products</a></li>
<li><a style="text-decoration:none;" href="http://www.benignsource.com/download/" target="_blank" title="Download">Download</a></li>
</lu>
</div></div></div>
<div style="width:100%; text-align:center;">Copyright &copy; 2001 - <?php printf(__('%1$s | %2$s'), date("Y"), ''); ?> <a href="http://www.benignsource.com/" target="_blank" title="BenignSource">BenignSource</a> Company, All Rights Reserved.</div>
</div></div></div></div></div></div></div>