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
    protected $urls;

    public function __construct($urls)
    {
        $this->urls = $urls;
    }
    
    public function prepare()
    {
        $preparedFeedInfos = array();
     
        foreach($this->urls as $url){
            $xml = simplexml_load_string(file_get_contents($url));
            $tempArray = array();
            $tempDate = 0;
            foreach($xml->channel->item as $item){
                $pubDate = date("YmdHis", strtotime($item->pubDate));
                if($tempDate < $pubDate){
                    $tempDate = $pubDate;
                    $tempArray = array(
                        "title" => utf8_decode($item->title),
                        "url" => strval($item->link),
                        "date" => $tempDate
                        );
                }
            }
            
            $preparedFeedInfos[] = $tempArray;
        }
        return $preparedFeedInfos;
    }
}