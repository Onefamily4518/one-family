<?php

  if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'otp-verification-api';
  $wo['title']       = $wo['lang']['otp-verification-api'];
  $wo['content']     = Wo_LoadPage('otp-verification-api/otp-verification');
  