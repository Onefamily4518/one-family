<?php

  if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'add_familyMember_api';
  $wo['title']       = $wo['lang']['add_familyMember_api'];
  $wo['content']     = Wo_LoadPage('relationship/add_familyMember');
  