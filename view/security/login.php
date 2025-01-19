<section class="login">
    <div class="formContainerlogin">
        <div class="formInfo">
            <p>Identifiez-vous avec votre adresse email et mot de passe</p>
            <p>Champ obligatoire<span>*</span></p>
        </div>
        <div class="wrapper">
            <form action="index.php?ctrl=security&action=login" method="post" class ="formlogin">
                <div class="form-gridlogin">
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe<span>*</span></label>
                        <input type="password" id="password" name="password" required>
                    </div>
                </div>
                <div class="endForm">
                    <a href="#">Mot de passe oublié ?</a>
                    <input type="submit" name="submit" class="continue-btn">
                </div>
            </form>
        </div>
    </div>
</section>
