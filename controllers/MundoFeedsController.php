<?php
require_once("libs/simple_html_dom.php");
require_once("services/FeedsService.php");

class MundoFeedsController
{

  public function __construct($numberOfFeeds=5)
  {

    $this->numberOfFeeds = $numberOfFeeds;
    $this->url  = 'http://estaticos.elmundo.es/elmundo/rss/portada.xml';

    $this->feeds = array();
    // $this->feeds = $this->setFeeds($this->url);
  }

  //set the feeds array from el Mundo newspaper
  public function setFeeds(){
    $xmlString = FeedsService::curl($this->url);

    $links = array();
    $links = FeedsService::parseXmlString($xmlString, $this->numberOfFeeds);


    $documents = array();
    $documents = FeedsService::getDocuments($links);


    $i = 0;
    // parse all the documents using the simple_html_dom library
    foreach($documents as $document){
      $this->feeds[$i]['title']     = $document->find('h1', 1)->plaintext;
      $this->feeds[$i]['body']      = $document->find('div[itemprop=articleBody]', 0)->plaintext;
      $this->feeds[$i]['image']     = $document->find('img.full-image', 0)->src;
      $this->feeds[$i]['source']    = "El Mundo";
      $this->feeds[$i]['publisher'] =  $document->find('address li', 0)->plaintext;
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
