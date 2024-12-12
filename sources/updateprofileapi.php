<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'update_profile_api';
  $wo['title']       = $wo['lang']['updateprofileapi'];
  $wo['content']     = Wo_LoadPage('updateprofileapi/update_profile_api');