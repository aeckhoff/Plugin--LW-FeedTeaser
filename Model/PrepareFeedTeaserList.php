<?php
/**
 * Xml from feed url will be converted to an array ( title and url
 * of newest feed )
 * 
 * @author Michael Mandt <michael.mandt@logic-works.de>
 * @package lw_feedteaser
 */

namespace lwFeedTeaser\Model;

class PrepareFeedTeaserList
{
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }
    
    public function prepare()
    {
        if(!array_key_exists("feedteaser", $this->config)){
            die("config entry 'feedteaser' is missing!");
        }
        
        $urls = $this->config["feedteaser"]["urls"];
        $preparedFeedInfos = array();
     
        foreach($urls as $url){
            $xml = simplexml_load_string(file_get_contents($url));
            $tempArray = array();
            $tempDate = 0;
            foreach($xml->channel->item as $item){
                $pubDate = date("YmdHis", strtotime($item->pubDate));
                if($tempDate == 0){
                    $tempDate = $pubDate;
                    $tempArray = array(
                        "title" => utf8_decode($item->title),
                        "url" => strval($item->link),
                        "date" => $tempDate
                        );
                } else{
                    if($tempDate < $pubDate){
                        $tempDate = $pubDate;
                        $tempArray = array(
                            "title" => utf8_decode($item->title),
                            "url" => strval($item->link),
                            "date" => $tempDate
                            );
                    }
                }
            }
            
            $preparedFeedInfos[] = $tempArray;
        }
        return $preparedFeedInfos;
    }
}