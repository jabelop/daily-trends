<?php
require_once('libs/simple_html_dom.php');

class FeedsService {

  // get a xml document from a remote url
  public static function curl($url)
  {
      // Initialize the cUrl session
      $cUrlSession = curl_init($url);

      // config cURL in order to return a string
      curl_setopt($cUrlSession, CURLOPT_RETURNTRANSFER, TRUE);

      // Config cURL to skip the peer https certificate in order to avoid problems
      curl_setopt($cUrlSession, CURLOPT_SSL_VERIFYPEER, false);

      // execute the cUrl session and save the response in the variable
      $xmlDocument = curl_exec($cUrlSession);

      // close the cUrl session
      curl_close($cUrlSession);

      // return the xml document string
      return $xmlDocument;
  }


  // parse a xml document string and return an array of links
  public static function parseXmlString($xml, $numberOfLinks)
  {
    // initialize de dom document object
    $dom = new  DOMDocument;

    //load the xml document string into the dom object
    $dom->loadXML($xml);

    if (!$dom) {
        echo 'Document parse error';
        die;
    }

    // load the xl dom document into the variable
    $xmlDom = simplexml_import_dom($dom);

    $links = array();
    for ($i = 0; $i < $numberOfLinks; $i++){
      $links[] = $xmlDom->channel->item[$i]->link;
    }

    return $links;
  }


  // return an array of html documents from an array of links
  public static function getDocuments($links)
  {
    $documents = array();
    foreach($links as $link) {
      $documents[] = file_get_html($link);
    }

    return $documents;

  }


}

?>
