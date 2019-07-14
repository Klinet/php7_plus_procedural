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
                                    value="<?=random_int(10,100)?>_teszt@a.hu"
                                    autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jelszó:</label>
                            <input type="password" class="form-control" name="jelszo" id="jelszo" placeholder="Jelszó"
                                    value="123456"
                                    required>
                        </div>
                        <p class="text-right"><a href="<?= VIEW_PATH ?>elfelejtve.php">Elfelejtettem a jelszavam</a></p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">mégsem</button>
                            <button type="submit" class="btn btn-primary" id="login_button">Belépés</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModal"
            aria-hidden="true">
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
                            <label for="recipient-name" class="col-form-label">Emailcím:</label>
                            <input type="reg_email" class="form-control" name="reg_email" id="reg_email" value="reg_email@.hu"
                                    placeholder="E-mail"
                                    autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <input type="username" class="form-control" name="username" id="username" value="username1"
                                    placeholder="Username"
                                    required>
                        </div>
                        <!--A jelszót inkább generáljuk-->
<!--                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jelszó:</label>
                            <input type="password" class="form-control" name="reg_jelszo" id="reg_jelszo"
                                    placeholder="Jelszó"
                                    required>
                        </div>-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">mégsem</button>
                    <button type="submit" class="btn btn-primary" id="signup_button">Regisztráció</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $(':button').click(function(e) {
            const id = e.target.id;
            if (id == 'login_button' || id == 'signup_button') {

                let email = $('#email').val();
                let reg_email = $('#reg_email').val();
                let password = "";
                let username = $('#username').val();
                let event = "";
                let form_data = "";
                let url = '<?=URL?>';

                if (email != '' || reg_email != '') {
                    if (id == 'login_button') {
                        if (password != '') {
                            event = "login";
                            password = $('#password').val();
                        }
                        form_data = {email: email, password: password,event: event};
                    } else if (id == 'signup_button') {
                        if (username != '') {
                        event = "signup";
                        }
                        form_data = {reg_email: reg_email, username: username, event: event};
                    } else {
                        event = "undefined";
                    };
                }

                $.ajax({
                    url: url + "controllers/auth.php",
                    method: "POST",
                    data: form_data,
                    success: function (data) {
                        //alert(data);
                        if (data == 'No') {
                            alert("Wrong Data");
                        } else {
                            $('#loginModal').hide();
                            console.log(data);
                            location.reload();
                        }
                    }
                });

            }

        });

        $('#logout').click(function () {
            let event = "logout";
            $.ajax({
                url: url + "controllers/action.php",
                method: "POST",
                data: {event: event},
                success: function () {
                    console.log('logged in sess no del');
                    location.reload();
                }
            });
        });
    });
</script>

</body>
</html>
