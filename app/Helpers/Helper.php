<?php

namespace App\Helpers;
use Session;
use Cache;
use Carbon\Carbon;

Class Helper{

    public static function countVisited($post_id) {
        Cache::rememberForever('cache_post_id', function () {
           return [];
        });
  
        $cache_post_id = Cache::get('cache_post_id');
        
        if (!isset($_COOKIE[$post_id])) {
            if (isset($cache_post_id[$post_id])) {
                $cache_post_id[$post_id] = $cache_post_id[$post_id] + 1;
            } else {
                $cache_post_id[$post_id] = 1;
            }
            Cache::put('cache_post_id', $cache_post_id, 24*60);
            setcookie($post_id, "visited", time() + 86400);// forever
        }
    }

    public static function convertName($str) {
        $str = explode(":", $str);
        return $str[0];
    }

    public static function convert($str) {
        $str = mb_convert_encoding($str, "UTF-8");
        return $str;
    }
    public static function curl_image($url,$saveto){
        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $raw=curl_exec($ch);
        curl_close ($ch);
        if(file_exists($saveto)){
            unlink($saveto);
        }
        $fp = fopen($saveto,'x');
        fwrite($fp, $raw);
        fclose($fp);
    }
    public static function curl_get_file_contents($URL)
    {
        $userAgent = 'Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0';
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        curl_setopt($c, CURLOPT_USERAGENT, $userAgent );
        $contents = curl_exec($c);
        curl_close($c);
        $c = null;

        if ($contents) return $contents;
        else return FALSE;
    }

    public static function convertTime($time) {
        Carbon::setLocale('vi'); // hiển thị ngôn ngữ tiếng việt.
        $check_time = Carbon::now('Asia/Ho_Chi_Minh')->diffInMinutes($time);
        if($check_time > 24*60*3){
            $time_new = date('d-m-Y', strtotime($time));
            return $time_new;
        }else{
            $time_new = Carbon::now('Asia/Ho_Chi_Minh')->diffForHumans($time);
            $time_new = preg_replace('(sau)','trước', $time_new);
            return $time_new;
        }
    }

    public static function convertTime1($time) {
        $time_new = date('d-m-Y H:i', strtotime($time));
        return $time_new;
    }

    public static function formatDate($format_time, $time, $format){
        return (!empty($time)) ? \Carbon\Carbon::createFromFormat($format_time,$time)->format($format) : '';
    }  
   
    public static function getLinkFile ($img_path, $token){
        $url = "https://api.dropboxapi.com/2/sharing/create_shared_link_with_settings";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Authorization: Bearer ".$token."",
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = '{"path":"'.$img_path.'"}';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $resp = curl_exec($curl);
        curl_close($curl);
        $a = json_decode($resp);
        if(isset($a->error)){
            if(isset($a->error->shared_link_already_exists)) {
                $img = $a->error->shared_link_already_exists->metadata->url;
                $img = preg_replace('(dl=0)','raw=1', $img);
                return $img;
            }
        }else if(isset($a->url)){
            $img = $a->url;
            $img = preg_replace('(dl=0)','raw=1', $img);
            return $img;
        }
    }  
   
}