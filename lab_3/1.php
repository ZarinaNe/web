<?php
//a)
$str = "ahb acb aeb aeeb adcb axeb";
$regexp = "/a..b/u";
preg_match_all($regexp, $str, $matches);
echo "1.a)  ";
foreach($matches[0] as $v){
    echo $v, ' ';
}
echo  '<br/>';
//b)
$str = "a1b2c3";
$regexp = "/[0-9]{1,}/";
function func($a){

    return ($a[0]*$a[0]*$a[0]);
}
echo "1.b)  ", preg_replace_callback($regexp, 'func', $str);
echo  '<br/>';
?>