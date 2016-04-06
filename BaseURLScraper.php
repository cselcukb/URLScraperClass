<?php

class BaseURLScraper{
    
    
    public function fetchContentSetCookieByAuthenticationByCurl($baseURL, $usrname, $psw, $form_field_username, $form_field_password){
        
        $this->fetchContentWithAuthenticationByCurl($baseURL, $usrname, $psw, $form_field_username, $form_field_password);
        
    }
    
    //Download Site Content
    public function fetchContent($_baseURL){
        
        $_content= file_get_contents($_baseURL);
//        echo $this->_content;die();
//        echo $this->_content;die();
        
        if(!$_content){
//            echo $this->_content.'Check Point 1';
            $_content= $this->fetchContentByCurl();
        }
//        echo $this->_content.'Check Point 2';die();
        return $_content;
    }
    
    //Download Site Content
    public function fetchContentByURL($url){
        
        $_content= file_get_contents($url);
//        echo $this->_content;die();
//        echo $this->_content;die();
        
        if(!$_content){
//            echo $this->_content.'Check Point 1';
            $_content= $this->fetchContentByCurlNURL($url);
        }
//        echo $this->_content.'Check Point 2';die();
        return $_content;
    }
    
    //Download Site Content
    private function fetchContentByCurl(){
        
        $ch = @curl_init();

        @curl_setopt($ch, CURLOPT_HEADER, 0);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        @curl_setopt($ch, CURLOPT_URL, $this->_url);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = @curl_exec($ch);
        @curl_close($ch);
        
        return $data;
    }
    
    //Download Site Content
    private function fetchContentByCurlNURL($url){
        
        $ch = @curl_init();

        @curl_setopt($ch, CURLOPT_HEADER, 0);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        @curl_setopt($ch, CURLOPT_URL, $url);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $data = @curl_exec($ch);
        @curl_close($ch);
        
        return $data;
    }
    
    //Download Site Content With Authentication With Curl
    public function fetchPageWithCookie($url, $referrer = ''){
        
        $ch = @curl_init();
        
        curl_setopt($ch,    CURLOPT_AUTOREFERER,         true);
            @curl_setopt($ch, CURLOPT_URL, $url);
    //    curl_setopt($ch,    CURLOPT_COOKIESESSION,         true);
        curl_setopt($ch,    CURLOPT_FAILONERROR,         false);
        curl_setopt($ch,    CURLOPT_FOLLOWLOCATION,        false);
//        curl_setopt($ch,    CURLOPT_FRESH_CONNECT,         true);
        if($referrer){
            @curl_setopt($ch, CURLOPT_REFERER, $referrer);
        }
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
        @curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
//        curl_setopt($ch,    CURLOPT_HEADER,             true);
    //    curl_setopt($ch,    CURLOPT_POST,                 false);
        curl_setopt($ch,    CURLOPT_RETURNTRANSFER,        true);
        @curl_setopt($ch, CURLOPT_COOKIE, true);
        @curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
        @curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($ch,    CURLOPT_CONNECTTIMEOUT,     30);
//        $result = curl_exec($ch);
//        echo 'Check Point'.$result;
        
//        return $result;
        return curl_exec($ch);
    }
    
    //Download Site Content 
    private function fetchContentWithAuthenticationByCurl($baseURL, $username, $password, $form_field_username = 'username', $form_field_password = 'password'){
        
        $ch = @curl_init();

        @curl_setopt($ch, CURLOPT_HEADER, true);
        @curl_setopt($ch, CURLOPT_POST, true);
        @curl_setopt($ch, CURLOPT_POSTFIELDS , $form_field_username.'='.$username.'&'.$form_field_password.'='.$password);
        @curl_setopt($ch, CURLOPT_URL, $baseURL);
//        @curl_setopt($ch, CURLOPT_REFERER, $baseURL);
        @curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch,    CURLOPT_RETURNTRANSFER,        true); 
        @curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        @curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
//        @curl_setopt($ch, CURLOPT_COOKIE, true);
        @curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
        @curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//        echo 'Check Point';die();
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 

        $result = @curl_exec($ch);
//        echo $result.'Check Point';die();
        

////    $cookies = implode("\n", $cookies); 
        
        
//    curl_setopt($ch,    CURLOPT_AUTOREFERER,         true);
//        @curl_setopt($ch, CURLOPT_URL, 'https://www.gumtree.com.au/m-my-ads.html');
////    curl_setopt($ch,    CURLOPT_COOKIESESSION,         true);
//    curl_setopt($ch,    CURLOPT_FAILONERROR,         false);
//    curl_setopt($ch,    CURLOPT_FOLLOWLOCATION,        false);
//    curl_setopt($ch,    CURLOPT_FRESH_CONNECT,         true);
//    @curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1");
////    curl_setopt($ch,    CURLOPT_HEADER,             true);
////    curl_setopt($ch,    CURLOPT_POST,                 false);
//    curl_setopt($ch,    CURLOPT_RETURNTRANSFER,        true);
//    @curl_setopt($ch, CURLOPT_COOKIE, true);
//    @curl_setopt($ch, CURLOPT_COOKIEJAR, "cookies.txt");
//    @curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//    curl_setopt($ch,    CURLOPT_CONNECTTIMEOUT,     30);
//    $result = curl_exec($ch); 
        
        $this->_content= $result;
    }
    
    //Download Site Content With Authentication With Curl
    public function saveImage($url, $img_path){
        
//        $rand_no= rand(0, 4096);
        $imgStartPos= strpos($url, '/');
        while($imgStartPos){
            $fileName= substr($url, $imgStartPos+1);
            
            $imgStartPos= strpos($url, '/', $imgStartPos+1);
        }
//        $fileName= $rand_no.'_'.$fileName;
        $fileName= $fileName;
        
        file_put_contents($fileName, file_get_contents($url));
        rename($fileName, $img_path.$fileName);
        
        return $fileName;
    }
    
    
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
