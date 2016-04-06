<?php
include 'BaseURLScraper.php';

class URLScraperToolClass extends BaseURLScraper{
    
    // General Scraper Functions
    public function parseBetweenTwoTags($string, $beginTag, $endTag){
        $startPos= strpos($string, $beginTag);
        if($startPos){
            $endPos= strpos($string, $endTag, $startPos);
            $processedString= substr($string, $startPos, $endPos-$startPos);
        }else{
            $processedString= "";
        }
        
        return $processedString;
        
    }
    
    
    public function parseBetweenTwoTagsWithStringOffset($string, $beginTag, $endTag){
        $startPos= strpos($string, $beginTag);
//        echo $startPos;
//        die();
        if($startPos){
            $beginTagLen= strlen($beginTag);
            $endPos= strpos($string, $endTag, $startPos+$beginTagLen);
            $processedString= substr($string, $startPos+$beginTagLen, $endPos-$startPos-$beginTagLen);
        }else{
            $processedString= "";
        }
        
        return $processedString;
        
    }
    
    
    public function parseByStartTagWithOffset($string, $beginTag){
        $startPos= strpos($string, $beginTag);
        if($startPos){
            $beginTagLen= strlen($beginTag);
            $processedString= substr($string, $startPos+$beginTagLen);
        }else{
            $processedString= "";
        }
        
        return $processedString;
        
    }
    
    
    public function parseByStartTag($string, $beginTag){
        $startPos= strpos($string, $beginTag);
        if($startPos){
            $processedString= substr($string, $startPos);
        }else{
            $processedString= "";
        }
        
        return $processedString;
        
    }
    
    public function parseByEndTag($string, $endTag){
        $endPos= strpos($string, $endTag);
        if($endPos){
            $processedString= substr($string, 0, $endPos);
        }else{
            $processedString= "";
        }
        
        return $processedString;
        
    }
    
    public function parseByEndTagWithOffset($string, $endTag){
        $endPos= strpos($string, $endTag);
        if($endPos){
            $endTagLen= strlen($string);
            $processedString= substr($string, 0, $endPos+$endTagLen);
        }else{
            $processedString= "";
        }
        
        return $processedString;
        
    }
    
    public function parseArrayByTwoTags($string, $arrayItemsBeginTag, $arrayItemsEndTag){
        $processedStringItems= array();
//        echo $string;
//        die();
        $startPos= strpos($string, $arrayItemsBeginTag);
        while($startPos){
            $endPos= strpos($string, $arrayItemsEndTag, $startPos);
//            echo $string;
//            die();
            $processedString= substr($string, $startPos, $endPos-$startPos);
//            echo $processedString;
//echo $processedString.'Check Point';die();
            $processedStringItems[]= $processedString;
            unset($processedString);
            $startPos= strpos($string, $arrayItemsBeginTag, $endPos);
        }
//        print_r($processedStringItems) ;
//        die();
        
        return $processedStringItems;
        
    }
    
    public function cleanArrayWithOffset($array, $arrayItemsBeginTag){
        $processedStringItems= array();
        foreach($array AS $row){
            $startPos= strpos($row, $arrayItemsBeginTag);
            $tagLen= strlen($arrayItemsBeginTag);
            
            $processedStringItems[]= substr($row, $startPos+$tagLen);
            
        }
        
        return $processedStringItems;
        
    }
    
    public function cleanArrayBetweenTwoTagsWithOffset($array, $arrayItemsBeginTag, $arrayItemsEndTag){
        $processedStringItems= array();
        
        foreach($array AS $row){
            $parsedData= $this->parseBetweenTwoTags($row, $arrayItemsBeginTag, $arrayItemsEndTag);
            
            $processedStringItems[]= $parsedData;
            
        }
        
        return $processedStringItems;
        
    }
    
    public function cleanArrayBetweenTwoTags($array, $arrayItemsBeginTag, $arrayItemsEndTag){
        $processedStringItems= array();
        
        foreach($array AS $row){
            $parsedData= $this->parseBetweenTwoTagsWithStringOffset($row, $arrayItemsBeginTag, $arrayItemsEndTag);
            
            $processedStringItems[]= $parsedData;
            
        }
        
        return $processedStringItems;
        
    }
    // General Scraper Functions
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
