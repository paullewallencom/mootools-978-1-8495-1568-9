<?php
// 2011-02-10 jjohnston process calculator post 

// question 1 loads with the page

// question 2
$two = (empty($_POST['input_1'])) ? true : false;

// question 3
$three = (!empty($_POST['input_1'])&&empty($_POST['input_2'])) ? true : false;

// send answer?
$answer = (!empty($_POST['input_2'])) ? true : false;


// send new question or send final calcuation response
switch(true) {
  case $two:
    echo '{"question":"Enter your monthly, non-housing (rent/mortgage) debt payments:"}';
  break;
  case $three:
    echo '{"question":"Enter your monthly rent or mortgage payment:"}';
  break;
  case $answer:
    foreach($_POST as $k=>$v) $_POST[$k] = (integer) str_replace(',','',$v);
    $recommendations = '';
    if ($_POST['input_2']/$_POST['input_0']>.25) $recommendations .= 'Reduce housing to less than 25% of gross monthly income<br/>';
    if (($_POST['input_2']+$_POST['input_1'])/$_POST['input_0']>.38) $recommendations .= 'Reduce combined housing and debt payments to less than 38% of gross monthly income<br/>';
    if (empty($recommendations)) $recommendations = 'Your ratios look good; stay under less than 38% of gross income for combined housing and debt payments!';
    $answer = '<h2>Monthly Stats</h2>Income: $'.number_format($_POST['input_0']).'<br/>Debt: $'.number_format($_POST['input_1']).'<br/>Housing: $'.number_format($_POST['input_2']).'<h3>Recommendations:</h3>'.$recommendations;
    echo '{"answer":"'.$answer.'"}';
  break; 
}
