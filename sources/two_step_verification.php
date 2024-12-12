<?php

  if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'twoStep_verification_api';
  $wo['title']       = $wo['lang']['twoStep_verification_api'];
  $wo['content']     = Wo_LoadPage('two_step_verification_api/verification_api');
  