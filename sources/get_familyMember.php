<?php

  if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'get_familyMember_api';
  $wo['title']       = $wo['lang']['get_familyMember_api'];
  $wo['content']     = Wo_LoadPage('relationship/get_familyMember');
  