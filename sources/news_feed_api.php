<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'News_feed_api';
  $wo['title']       = $wo['lang']['News_feed_api'];
  $wo['content']     = Wo_LoadPage('feed_for_user/News_feed_api');