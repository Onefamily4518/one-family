<?php

if ($wo['config']['pages'] ==0) {
      header("Location: " . Wo_SeoLink('index.php?link1=welcome'));
      exit();
  }
  $wo['description'] = $wo['config']['siteDesc'];
  $wo['keywords']    = $wo['config']['siteKeywords'];
  $wo['page']        = 'privateapi';
  $wo['title']       = $wo['lang']['privateapi'];
  $wo['content']     = Wo_LoadPage('friends_api/privateapi');