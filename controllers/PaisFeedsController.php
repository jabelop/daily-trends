<?php
require_once("libs/simple_html_dom.php");
require_once("services/FeedsService.php");


class paisFeedsController
{

  public function __construct($numberOfFeeds)
  {

    $this->numberOfFeeds = $numberOfFeeds;
    $this->url  = 'http://ep00.epimg.net/rss/elpais/portada.xml';

    $this->feeds = array();
    // $this->feeds = $this->setFeeds($this->url);
  }

  //set the feeds array from el Pais newspaper
  public function setFeeds(){
    $xmlString = FeedsService::curl($this->url);
    $links = array();
    $links = FeedsService::parseXmlString($xmlString, $this->numberOfFeeds);


    $documents = array();
    $documents = FeedsService::getDocuments($links);


    $i = 0;
    // parse all the documents using the simple_html_dom library
    foreach($documents as $document){
      $this->feeds[$i]['title']    = $document->find('h1', 0)->plaintext;
      $this->feeds[$i]['body'] = $document->find('div.articulo-cuerpo', 0)->plaintext;
      $this->feeds[$i]['image']     = "https:".$document->find('img', 1)->src;
      $this->feeds[$i]['source']    = "El país";
      $this->feeds[$i]['publisher'] =  $document->find('meta', 5)->content;
      $i++;
    }

    return $this->feeds;

  }

  public function getFeeds()
  {
    return $this->feeds;
  }

}

 ?>
