<?php
// server side ajax component 
// jay lg johnston 2011-01-14
// for the Chptr 3-11b recipe

switch($_GET['my_value']) {
  case 'lease': 
    $html = '<option value="">Choose lease type:</option><option value="1">Dealer ripped me off</option><option value="2">Manufacturer rebates saved me</option><option value="3">I make a lot of money so whatever</option>';
  break;
  case 'loan': $html = '<option value="">Choose loan amount remaining:</option><option value="1">A Lot</option><option value="2">About Half</option><option value="3">Not Much!</option>';
  break;
  default: $html = '<option value="">Choose ownership description:</option><option value="1">It\'s an Adam Sandler car</option><option value="2">The car rarely breaks down</option><option value="3">She\'s auto-show worthy and just had her oil changed!</option>';
}

echo $html;
