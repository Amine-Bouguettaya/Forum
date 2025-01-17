<section class="register">
    <div class="formContainer">
        <div class="formInfo">
            <p>Vous avez déjà un compte? <a href="index.php?ctrl=security&action=login">Cliquez-ici</a> pour vous connecter.</p>
            <p>Champ obligatoire<span>*</span></p>
        </div>
        <div class="wrapper">
            <form action="index.php?ctrl=security&action=register" method="post" id="formReg">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="email">Email<span>*</span></label>
                        <input type="email" id="email" name="email" aria-required="true" required>
                    </div>
                    <div class="form-group">
                        <label for="pseudo">Pseudo<span>*</span></label>
                        <input type="text" id="pseudo" name="username" aria-required="true" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe<span>*</span></label>
                        <input type="password" id="password" name="password" aria-required="true" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirmation du mot de passe<span>*</span></label>
                        <input type="password" id="confirm-password" name="passwordconf" aria-required="true" required>
                    </div>
                </div>
                    <div class="endForm">
                        <div class="terms-checkbox">
                            <input type="checkbox" id="terms" name="terms" aria-required="true" required>
                            <label for="terms">J'ai lu et j'accepte les termes et conditions</label>
                        </div>
                        <input type="submit" name="submit" class="continue-btn">
                </div>
            </form>
        </div>
    </div>
</section>