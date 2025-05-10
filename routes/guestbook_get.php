<?php
$entries = getMessage(connectDb());
//print_r($entries);

renderView(template:'guestbook_get', data: ['messages' => $entries]); 
?>