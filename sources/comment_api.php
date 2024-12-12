<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'comment_api';
  $wo['title']       = 'comment api';
  $wo['content']     = Wo_LoadPage('comment_api/comment');
  