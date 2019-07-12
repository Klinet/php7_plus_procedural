<footer style="line-height: 60px;">
    <div class="container-fluid">
        <p class="text-center">Lábléc <?php print date("Y"); ?></p>
    </div>
</footer>
<?php
if (!logged_in() && pageName() !== VIEW_PATH . "signup.php" && pageName() !== VIEW_PATH . "forg_passwd.php" && pageName() !== VIEW_PATH . "profile_activate.php") {
?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">loginModal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Emailcím:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"
                                autofocus required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Jelszó:</label>
                        <input type="password" class="form-control" name="jelszo" id="jelszo" placeholder="Jelszó"
                                required>
                    </div>

                    <p class="text-right"><a href="<?=VIEW_PATH ?>elfelejtve.php">Elfelejtettem a jelszavam</a></p>

                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="event" id="event" value="login">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">mégsem</button>
                <button type="button" class="btn btn-primary">Belépés</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">signUpModal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
