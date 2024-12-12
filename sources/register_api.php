<?php

  if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'register_api';
  $wo['title']       = $wo['lang']['register_api'];
  $wo['content']     = Wo_LoadPage('register-user/register_user');
  