<?php
$page_title = 'Gửi Mail';
include('../../includes/header2.html');
?>
<script src="./ckeditor/ckeditor.js"></script>

<div>

    <div>
        <form action="./sendmail_PHP_Mailer.php" method="POST">
            <div style="margin-bottom: 12px;">
                <label>Email nhận: </label>
                <input type="email" name="nguoi_nhan" style="width: 250px;" required>
            </div>
            <textarea name="noi_dung" required>

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
include('../../includes/footer.html');
?>