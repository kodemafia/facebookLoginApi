<html>

 <body>
<?php
 
    //facebook application configuration
    $fbconfig['appid' ] = "671683016233337";
    $fbconfig['secret'] = "2ce7519b0748d3781ab95b0fe8d99d1c";
 
    try{
        include_once ('facebook.php');
    }
    catch(Exception $o){
 
        print_r($o);
 
    }
    $facebook = new Facebook(array(
      'appId'  => $fbconfig['appid'],
      'secret' => $fbconfig['secret'],
      'cookie' => true,
    ));
 
    $user       = $facebook->getUser();
    $loginUrl   = $facebook->getLoginUrl(
            array(
                'scope'         => 'email'
            )
    );
 
    if ($user) {
      try {
        $user_profile = $facebook->api('/me');
        $user_friends = $facebook->api('/me/friends');
        $access_token = $facebook->getAccessToken();
      } catch (FacebookApiException $e) {
        d($e); 
        $user = null;
      }
    }
 
    if (!$user) {
        echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
        exit;
    }
 
    $total_friends = count($user_friends['data']);
    echo 'Total friends: '.$total_friends.'.<br />';
    $start = 0;
    while ($start < $total_friends) {
        echo $user_friends['data'][$start]['name'];
        echo '<br />';
        $start++;
    }
 
?>
</body>
</html>