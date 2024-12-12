<?php

  if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'feed-Api';
  $wo['title']       = $wo['lang']['feed-Api'];
  $wo['content']     = Wo_LoadPage('feed_for_user/feed-page');
  