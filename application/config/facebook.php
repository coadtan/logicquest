<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Facebook App details
| -------------------------------------------------------------------
|
| To get an facebook app details you have to be a registered developer
| at http://developer.facebook.com and create an app for your project.
|
|  facebook_app_id               string  Your facebook app ID.
|  facebook_app_secret           string  Your facebook app secret.
|  facebook_login_type           string  Set login type. (web, js, canvas)
|  facebook_login_redirect_url   string  URL tor redirect back to after login. Do not include domain.
|  facebook_logout_redirect_url  string  URL tor redirect back to after login. Do not include domain.
|  facebook_permissions          array   The permissions you need.
|  READ MORE AT https://developers.facebook.com/docs/facebook-login/permissions/v2.2
|  AND https://developers.facebook.com/docs/php/gettingstarted/4.0.0
*/
$config['facebook_app_id']              = '917986511605159';
$config['facebook_app_secret']          = 'da9aad9cdf16a7ef200b85b247580a91';
$config['facebook_login_type']          = 'web';
$config['facebook_login_redirect_url']  = 'maincontroller/facebook_login';
$config['facebook_logout_redirect_url'] = 'maincontroller/facebook_logout';
$config['facebook_permissions']         = array('public_profile', 'user_friends');

