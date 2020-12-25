<?php
// jjohnston 2011-02-14 create an mp3 list in json for your valentine
$query = (empty($_POST['mp3_query'])) ? '*.mp3' : $_POST['mp3_query'];

// note that calling basename() prevents ?mp3_query=/etc/pass*
$mp3s = glob(basename($query));

// this commented line is for testing the error message
//$mp3s = array();

if (empty($mp3s)) {
  $wildcard_message = (!empty($_POST['mp3_query'])) ? 'Try using asterisk as a wild card.' : '';
  echo '{"Error":"No mp3\'s found in this directory. '.$wildcard_message.'"}';
} else {
  for($i=0;$i<count($mp3s);$i++) {
    $mp3_list[] = '"'.$i.'":"'.str_replace('"','\"',basename($mp3s[$i])).'"';
  }
  echo '{"mp3s":{'.implode(',',$mp3_list).'}}';
}

