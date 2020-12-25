<?php
// 2011-02-03 jjohnston retrieve remote data
$data = @file_get_contents('http://webjuju.com/moo/05_remote_data.txt');
echo (!empty($data)) ? $data : 'Error getting remote data';
