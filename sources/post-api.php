<?php
if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'post-api';
  $wo['title']       = $wo['lang']['post-api'];
  $wo['content']     = Wo_LoadPage('feed_for_user/post-api');
  