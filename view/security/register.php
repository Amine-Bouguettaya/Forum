<form action="index.php?ctrl=security&action=register" method="post">
    <div class="form-grid">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" id="pseudo" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirmation du mot de passe</label>
            <input type="password" id="confirm-password" name="passwordconf" required>
        </div>
    </div>
    <div class="terms-checkbox">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">J'ai lu et j'accepte les termes et conditions</label>
    </div>
    <button type="submit" class="continue-btn">Continuer</button>
</form>