<section>
    <h2>Leave a Public Note or Question</h2>
    <form method="POST">
<!-- CRF Token for security -->
 <input type="hidden" name="csrfToken" value="<?=$data['csrfToken']?>">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <label for="message">Message</label>
        <textarea name="message" id="message" rows="4"></textarea>
        <button type="submit">Send Message</button>
    </form>
</section>