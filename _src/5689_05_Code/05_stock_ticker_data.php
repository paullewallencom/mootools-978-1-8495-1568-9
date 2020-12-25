<?php
// jjohnston 2011-02-11 get stock ticker data from quoterss
$url = 'http://www.quoterss.com/quote.php?symbol=';

// allow *evil* server side input
if (empty($_POST['feeds'])) $feeds = explode(',','IBM,AAPL,GOOG');
else $feeds = preg_replace('/A-Z0-9-_/','',$_POST['feeds']);

foreach($feeds as $feed) {

  // grab each feed (cross-domain work)
  $data = file_get_contents($url.urlencode($feed));
  // regex out the feed data
  if (!empty($data)) {
    preg_match('/<item>.*<title>QuoteRss.com: ('.$feed.'[^<]*)<\/title>/Usi',$data,$match);
    if (!empty($match[1])) {
      // prepare the values for JSON encoding
      $symbol = str_replace('"','\"',$feed);
      $info = str_replace('"','\"',$match[1]);
      // prepare the values to be added to the JSON object
      $feed_data[] = '"'.@$counter++.'":"'.$info.'"';
    }
  }

}
if (empty($feed_data)) $feed_data[] = '"Error":"Feed unavailable, please try again later or use another domain - such as is with free services."';
// poor man's JSON encoding
echo '{'.implode(',',$feed_data).'}';
