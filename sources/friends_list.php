<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'friends_list_api';
  $wo['title']       = $wo['lang']['friends_list_api'];
  $wo['content']     = Wo_LoadPage('friends_api/friends_list');
  
  