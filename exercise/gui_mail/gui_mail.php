<?php

include('../../includes/html/header2.html');
?>
<link rel="stylesheet" href="../../includes/css/style_page.css">
<style>
    .form_mail {
        margin: 0 150px;
    }
</style>
<script src="./ckeditor/ckeditor.js"></script>

<div class="form_mail">

    <div style="align-items: center;">
        <form action="./sendmail_PHP_Mailer.php" method="POST">
            <div style="margin-bottom: 12px;">
                <label>Email nhận: </label>
                <input type="email" name="toMail" style="width: 250px;" required>
            </div>
            <textarea name="content-mail" required>

            </textarea>
            <div style="margin-top: 12px;">
                <button class="btn btn-dark" type="submit" name="gui">
                    Gửi
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('content-mail');
</script>

<?php
include('../../includes/html/footer.html');
?>