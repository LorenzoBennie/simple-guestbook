<?php 
$messages = $data['messages'];
//var_dump($messages);
?>

<section>
    <h2>Guest Messages</h2>
    <?php if (empty($messages)): ?>
        <p>No messages yet. Be the first to leave a message <span><a href="/contact">here</a></span></p>
    <?php else: ?>
        <?php foreach($messages as $message) : ?>
            <h3><?=htmlspecialchars($message['name'])?></h3>
            <p><?=htmlspecialchars($message['email'])?></p>
            <p><?=nl2br(htmlspecialchars($message['message']))?></p>
            <small>Posted on <?=$message['created_at'] ?></small>
        <?php endforeach?>
    <?php endif; ?>
    </section>