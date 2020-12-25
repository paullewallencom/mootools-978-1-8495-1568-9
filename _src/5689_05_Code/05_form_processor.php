<?php
// 2011-02-09 jjohnston process ajax post 
if (empty($_POST['error'])) {

  echo 'Thank you, we received your submission:<br/><pre>'.print_r($_POST,true);

} else {

  echo 'Error!  Please check your submitted values and try again!';

}
