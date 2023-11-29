<?php
//cURL untuk memanggil dan mengambil hasil API
set_time_limit(0);
ignore_user_abort(1);


	function proccess($ighost, $useragent, $url, $cookie = 0, $data = 0, $httpheader = array(), $proxy = 0, $userpwd = 0, $is_socks5 = 0){
		$headers = [
        'Connection: close',
        'Accept: */*',
        'Content-type: application/x-www-form-urlencoded; charset=UTF-8',
        'Cookie2: $Version=1',
        'Accept-Language: en-US',
        ];

      $url = $ighost ? 'https://i.instagram.com/api/v1/' . $url : $url;
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($ch, CURLOPT_HEADER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_TIMEOUT, 20);

      if($proxy) 
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
      if($userpwd) 
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $userpwd);
      if($is_socks5) 
        curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
      if($httpheader) 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
      if($cookie) 
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
      if ($data){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      }
      
      $response = curl_exec($ch);
      $httpcode = curl_getinfo($ch);
      if(!$httpcode) return false; else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
      }
    }


    function hook($data) {
        $hash = hash_hmac('sha256', $data, 'c36436a942ea1dbb40d7f2d7d45280a620d991ce8c62fb4ce600f0a048c32c11');
        return 'ig_sig_key_version=4&signed_body='.$hash.'.'.urlencode($data);
    }

    function get_mediaid($ua, $cookie, $url_photo)
    {
        $datanya = proccess(0, $ua,'https://api.instagram.com/publicapi/oembed/?url='.$url_photo,$cookie);
        $data_mediaid = json_decode($datanya[1], true);
        $likeid = $data_mediaid['media_id'];

        return $likeid;
    }
    

    function like($ua, $cookie, $guid, $userid, $token, $deviceid, $id_post)
    {
        $post_data = json_encode([
            '_uuid' => $guid,
            '_uid' => $userid,
            '_csrftoken' => $token,
            'media_id' => $id_post,
            'device_id' => $deviceid,
            'radio_type' => 'wifi-none',
            'container_module' => 'feed_timeline',
            'feed_position' => '',
            'is_carousel_bumped_post' => false
        ]);

        return proccess(1, $ua, 'media/'.$id_post.'/like/', $cookie, hook($post_data));
    }

    function follow($ua, $cookie, $guid, $userid, $token, $deviceid, $ownerid)
    {
        $post_data = json_encode([
            '_uuid' => $guid,
            '_uid' => $userid,
            '_csrftoken' => $token,
            'user_id' => $ownerid,
            'radio_type' => 'wifi-none',
            'device_id' => $deviceid
        ]);

        return proccess(1, $ua, 'friendships/create/'.$ownerid.'/', $cookie, hook($post_data));
    }

    function comment($ua, $cookie, $guid, $userid, $token, $deviceid, $id_post, $comment_text)
    {

        $post_data = json_encode([
            '_uuid' => $guid,
            '_uid' => $userid,
            '_csrftoken' => $token,
            'comment_text' => $comment_text,
            'container_module' => 'comments_v2',
            'radio_type' => 'wifi-none',
            'device_id' => $deviceid,
            'carousel_index' => 0,
            'feed_position' => 0,
            'is_carousel_bumped_post' => false
        ]);

        return proccess(1, $ua, 'media/'.$id_post.'/comment/', $cookie, hook($post_data));
    }

	function generate_device_id($seed){
		$volatile_seed = filemtime(__DIR__);
      return 'android-'.substr(md5($seed.$volatile_seed), 16);
	}

	function get_csrftoken(){
      $fetch = proccess('si/fetch_headers/', null, null);
      $header = $fetch[0];
      if (!preg_match('#Set-Cookie: csrftoken=([^;]+)#', $fetch[0], $token)) {
            return json_encode(array('result' => false, 'content' => 'Missing csrftoken'));
      } else {
            return substr($token[0], 22);
      }
	}
	
	function generate_guid($tipe = 0){
		$uuid = sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );

    return $tipe ? $uuid : str_replace('-', '', $uuid);
	}