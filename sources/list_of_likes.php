<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'list_of_likes';
  $wo['title']       = 'Like api';
  $wo['content']     = Wo_LoadPage('like/list_of_likes');
  