<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'checking-users';
  $wo['title']       = $wo['lang']['checking-users'];
  $wo['content']     = Wo_LoadPage('checking_api/login_users');
  
  