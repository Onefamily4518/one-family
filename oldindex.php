<?php 
// +------------------------------------------------------------------------+
// | @author Deen Doughouz (DoughouzForest)
// | @author_url 1: http://www.wowonder.com
// | @author_url 2: http://codecanyon.net/user/doughouzforest
// | @author_email: wowondersocial@gmail.com   
// +------------------------------------------------------------------------+
// | WoWonder - The Ultimate Social Networking Platform
// | Copyright (c) 2017 WoWonder. All rights reserved.
// +------------------------------------------------------------------------+
require_once('assets/init.php');
// if (file_exists('updatev2.php') && empty($wo['config']['updatev2'])) {
//     if (is_writable('updatev2.php')) {
//         header('Location: ./updatev2.php');
//         exit();
//     }
// }
if ($wo['loggedin'] == true) {
    $update_last_seen = Wo_LastSeen($wo['user']['user_id']);
} else if (!empty($_SERVER['HTTP_HOST'])) {
    $server_scheme = @$_SERVER["HTTPS"];
    $pageURL = ($server_scheme == "on") ? "https://" : "http://";
    $http_url = $pageURL . $_SERVER['HTTP_HOST'];
    $url = parse_url($wo['config']['site_url']);
    if (!empty($url)) {
        if ($url['scheme'] == 'http') {
            if ($http_url != 'http://' . $url['host']) { 
               header('Location: ' . $wo['config']['site_url']);
               exit();
            }
        } else {
            if ($http_url != 'https://' . $url['host']) { 
               header('Location: ' . $wo['config']['site_url']);
               exit();
            }
        }
    }
}
if (!empty($_GET['ref']) && $wo['loggedin'] == false && !isset($_COOKIE['src'])) {
    $get_ip = get_ip_address();
    if (!isset($_SESSION['ref']) && !empty($get_ip)) {
        $_GET['ref'] = Wo_Secure($_GET['ref']);
        $ref_user_id = Wo_UserIdFromUsername($_GET['ref']);
        $user_date = Wo_UserData($ref_user_id);
        if (!empty($user_date)) {
            if (ip_in_range($user_date['ip_address'], '/24') === false && $user_date['ip_address'] != $get_ip) {
                $_SESSION['ref'] = $user_date['username'];
            }
        }
    }
}
if (!isset($_COOKIE['src'])) {
    @setcookie('src', '1', time() + 31556926, '/');
}
$page = '';
if ($wo['loggedin'] == true && !isset($_GET['link1'])) {
    $page = 'home';
} elseif (isset($_GET['link1'])) {
    $page = $_GET['link1'];
}
if ((!isset($_GET['link1']) && $wo['loggedin'] == false) || (isset($_GET['link1']) && $wo['loggedin'] == false && $page == 'home')) {
    $page = 'welcome';
}
if ($wo['config']['maintenance_mode'] == 1) {
    if ($wo['loggedin'] == false) {
        if ($page == 'admincp' || $page == 'admin-cp') {
           $page = 'welcome';
        } else {
            $page = 'maintenance';
        }
    } else {
        if (Wo_IsAdmin() === false) {
            $page = 'maintenance';
        }
    } 
}
if (!empty($_GET['m'])) {
    $page = 'welcome';
}
switch ($page) {
    case 'maintenance':
        include('sources/maintenance.php');
        break;
    case 'get_news_feed':
        include('sources/get_news_feed.php');
        break;
    case 'video-call':
        include('sources/video.php');
        break;
    case 'video-call-api':
        include('sources/video_call_api.php');
        break;    
    case 'home':
        include('sources/home.php');
        break;
    case 'welcome':
        include('sources/welcome.php');
        break;
    case 'register':
        include('sources/register.php');
        break;
    case 'confirm-sms':
        include('sources/confirm_sms.php');
        break;   
    case 'confirm-sms-password':
        include('sources/confirm_sms_password.php');
        break;   
    case 'forgot-password':
        include('sources/forgot_password.php');
        break;    
    case 'reset-password':
        include('sources/reset_password.php');
        break;    
    case 'start-up':
        include('sources/start_up.php');
        break;
    case 'activate':
        include('sources/activate.php');
        break;
    case 'search':
        include('sources/search.php');
        break;
    case 'timeline':
        include('sources/timeline.php');
        break;
    case 'pages':
        include('sources/my_pages.php');
        break;
    case 'suggested-pages':
        include('sources/suggested_pages.php');
        break;
    case 'go-pro':
        include('sources/go_pro.php');
        break;
    case 'page':
        include('sources/page.php');
        break;
    case 'poke':
        include('sources/poke.php');
        break;
    case 'most_liked':
        include('sources/most_liked.php');
        break;
    case 'groups':
        include('sources/my_groups.php');
        break;
    case 'suggested-groups':
        include('sources/suggested_groups.php');
        break;
    case 'group':
        include('sources/group.php');
        break;
    case 'create-group':
        include('sources/create_group.php');
        break;
    case 'group-setting':
        include('sources/group_setting.php');
        break;
    case 'create-page':
        include('sources/create_page.php');
        break;
    case 'setting':
        include('sources/setting.php');
        break;
    case 'page-setting':
        include('sources/page_setting.php');
        break;
    case 'messages':
        include('sources/messages.php');
        break;
    case 'logout':
        include('sources/logout.php');
        break;
    case '404':
        include('sources/404.php');
        break;
    case 'post':
        include('sources/story.php');
        break;
    case 'game':
        include('sources/game.php');
        break;
    case 'games':
        include('sources/games.php');
        break;
    case 'new-game':
        include('sources/new_games.php');
        break;
    case 'saved-posts':
        include('sources/savedPosts.php');
        break;
    case 'hashtag':
        include('sources/hashtag.php');
        break;
    case 'terms':
        include('sources/term.php');
        break;
    case 'albums':
        include('sources/my_albums.php');
        break;
    case 'album':
        include('sources/album.php');
        break;
    case 'create-album':
        include('sources/create_album.php');
        break;
    case 'contact-us':
        include('sources/contact.php');
        break;
    case 'user-activation':
        include('sources/user_activation.php');
        break;
    case 'upgraded':
        include('sources/upgraded.php');
        break;
    case 'oops':
        include('sources/oops.php');
        break;
    case 'boosted-pages':
        include('sources/boosted_pages.php');
        break;
    case 'boosted-posts':
        include('sources/boosted_posts.php');
        break;
    case 'new-product':
        include('sources/new_product.php');
        break; 
    case 'edit-product':
        include('sources/edit_product.php');
        break;  
    case 'products':
        include('sources/products.php');
        break;   
    case 'my-products':
        include('sources/my_products.php');
        break;    
    case 'site-pages':
        include('sources/site_pages.php');
        break;
    case 'blogs':
        include('sources/blog.php');
        break;
    case 'my-blogs':
        include('sources/my_blogs.php');
        break;
    case 'create-blog':
        include('sources/create_blog.php');
        break;
    case 'read-blog':
        include('sources/read_blog.php');
        break;
    case 'edit-blog':
        include('sources/edit_blog.php');
        break;
    case 'blog-category':
        include('sources/blog_category.php');
        break;
    case 'forum':
        include('sources/forum/forum.php');
        break;
    case 'forum-members':
        include('sources/forum/forum_members.php');
        break;
    case 'forum-members-byname':
        include('sources/forum/forum_members_byname.php');
        break;
    case 'forum-events':
        include('sources/forum/forum_events.php');
        break;
    case 'forum-search':
        include('sources/forum/forum_search.php');
        break;
    case 'forum-search-result':
        include('sources/forum/forum_search.php');
        break;
    case 'forum-help':
        include('sources/forum/forum_help.php');
        break;
    case 'forums':
        include('sources/forum/forumdisplay.php');
        break;
    case 'forumaddthred':
        include('sources/forum/forums_add_thread.php');
        break;
    case 'showthread':
        include('sources/forum/forum_showthread.php');
        break;
    case 'threadreply':
        include('sources/forum/forum_threadreply.php');
        break;
    case 'threadquote':
        include('sources/forum/forum_threadquote.php');
        break;
    case 'editreply':
        include('sources/forum/forum_editreply.php');
        break;
    case 'deletereply':
        include('sources/forum/forum_deletereply.php');
        break;
    case 'mythreads':
        include('sources/forum/forum_mythreads.php');
        break;
    case 'mymessages':
        include('sources/forum/forum_mymessages.php');
        break;
    case 'edithread':
        include('sources/forum/forum_edithread.php');
        break;
    case 'deletethread':
        include('sources/forum/forum_deletethread.php');
        break;
     case 'create-event':
        include('sources/events/create_event.php');
        break;
    case 'edit-event':
        include('sources/events/edit_event.php');
        break;
    case 'events':
        include('sources/events/events_upcomming.php');
        break;
    case 'events-going':
        include('sources/events/events_going.php');
        break;
    case 'events-interested':
        include('sources/events/events_interested.php');
        break;
    case 'events-past':
        include('sources/events/events_past.php');
        break;
    case 'show-event':
        include('sources/events/show_event.php');
        break;
    case 'events-invited':
        include('sources/events/events_invited.php');
        break;
    case 'my-events':
        include('sources/events/my_events.php');
        break;
   case 'oauth':
        include('sources/oauth.php');
        break;
    case 'app_api':
        include('sources/apps_api.php');
        break;
    case 'authorize':
        include('sources/authorize.php');
        break;
    case 'app-setting':
        include('sources/app_setting.php');
        break;
    case 'developers':
        include('sources/developers.php');
        break;
    case 'create-app':
        include('sources/create_app.php');
        break;
    case 'app':
        include('sources/app_page.php');
        break;
    case 'apps':
        include('sources/apps.php');
        break;
    case 'sharer':
        include('sources/sharer.php');
        break;
    case 'movies':
        include('sources/movies/movies.php');
        break;
    case 'movies-genre':
        include('sources/movies/movies_genre.php');
        break;
    case 'movies-country':
        include('sources/movies/movies_country.php');
        break;
    case 'watch-film':
        include('sources/movies/watch_film.php');
        break;
    case 'ads':
        include('sources/ads/ads.php');
        break;
    case 'wallet':
        include('sources/ads/wallet.php');
        break;
    case 'send_money':
        include('sources/ads/send_money.php');
        break;
    case 'create-ads':
        include('sources/ads/create_ads.php');
        break;
    case 'edit-ads':
        include('sources/ads/edit_ads.php');
        break;
    case 'chart-ads':
        include('sources/ads/chart_ads.php');
        break;
    case 'manage-ads':
        include('sources/ads/admin.php');
        break;
    case 'create-status':
        include('sources/status/create.php');
        break;
    case 'friends-nearby':
        include('sources/friends_nearby.php');
        break;
    case 'more-status':
        include('sources/status/more-status.php');
        break;
    case 'unusual-login':
        include('sources/unusual-login.php');
        break;
    //Onefamily changes
    case 'signUp':
        include('sources/register_api.php');
        break;
    case 'signIn':
        include('sources/login_api.php');
        break;
    case 'otp_verification_api':
        include('sources/otp-verification-api.php');
        break;
    case 'country_list_api':
        include('sources/country_list_api.php');
        break; 
    case 'homeFeed':
        include('sources/feed-Api.php');
        break;   
    case 'post_api':
        include('sources/post-api.php');
        break;    
    case 'relationship_api':
        include('sources/relationship-api.php');
        break;
    case 'twoStep_verification_api':
        include('sources/two_step_verification.php');
        break; 
    case 'create_post_api':
        include('sources/create_post_api.php');
        break; 
    case 'friends_api':
        include('sources/friends.php');
        break;
    case 'friends_list_api':
        include('sources/friends_list.php');
        break;               
    case 'add_familyMember_api':
        include('sources/add_familyMember.php');
        break;               
    case 'get_familyMember_api':
        include('sources/get_familyMember.php');
        break;
    case 'updateProfile':
        include('sources/update_profile_api.php');
        break;
    case 'privacy_add_api':
        include('sources/privacy_add_api.php');
        break;
    case 'news_feed_api':
        include('sources/news_feed_api.php');
        break;
    case 'like_api':
        include('sources/liked_api.php');
        break;
    case 'list_of_likes':
        include('sources/list_of_likes.php');
        break;
    case 'comment_api':
        include('sources/comment_api.php');
        break;
    case 'list_of_comments':
        include('sources/list_of_comments.php');
        break;
    case 'checkUserName':
        include('sources/username_listing.php');
        break;
    case 'userProfile':
        include('sources/userProfile.php');
        break;
}

if (empty($wo['content'])) {
    include('sources/404.php');
}
      
echo Wo_Loadpage('container');

mysqli_close($sqlConnect);
unset($wo);
?>