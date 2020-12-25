<?php
// 2011-02-05 jjohnston retrieve remote data
$data = @file_get_contents('http://www.time.gov/timezone.cgi?Central/d/-6');
echo (!empty($data)) ? $data : 'Error getting remote data';
