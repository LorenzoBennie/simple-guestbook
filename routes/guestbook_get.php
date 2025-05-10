<?php
$entries = getMessage(connectDb());
//print_r($entries);

//throw new RuntimeException('Whoops! That did not work');
//echo $ggfgfg;

renderView(template:'guestbook_get', data: ['messages' => $entries]); 
?>