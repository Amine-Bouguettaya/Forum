<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use App\Session;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordconf = filter_input(INPUT_POST, "passwordconf", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $terms = filter_input(INPUT_POST, "terms", FILTER_SANITIZE_FULL_SPECIAL_CHARS);


        if ($username && $email && $password && $passwordconf && $terms) {
            if ($password == $passwordconf) {
                if (strlen($password) < 5) {
                    Session::addFlash("error", "Le mot de passe doit contenir au moins 8 caractères");
                    $this->redirectTo("security", "register");
                }
                echo "test";
                $userManager = new UserManager();
                $userbd = $userManager->findOneByName(["username" => $username]);
                $emailbd = $userManager->findOneByName(["email" => $email]);

                if ($userbd && $userbd->getUsername() == $username || $emailbd && $emailbd->getEmail() == $email) {
                    Session::addFlash("error", "Ce nom d'utilisateur ou cet email est déjà pris");
                    $this->redirectTo("security", "register");
                } else {
                    $userManager->add(["username" => $username, "email" => $email, "password" => password_hash($password, PASSWORD_DEFAULT)]);
                    Session::addFlash("success", "Inscription réussie, vous pouvez vous connecter");
                    $this->redirectTo("security", "login");
                }
            } else {
                Session::addFlash("error", "Les mots de passe ne correspondent pas");
                $this->redirectTo("security", "register");
            }
        }

        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "Page d'inscription"
        ];
    }


    public function login () {

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($email && $password) {
            $userManager = new UserManager();
            $user = $userManager->findOneByName(["email" => $email]);

            if ($user && password_verify($password, $user->getPassword())) {
                Session::setUser($user);
                Session::addFlash("success", "Vous êtes connecté");
                $this->redirectTo("home");
            } else {
                Session::addFlash("error", "Identifiants incorrects");
                $this->redirectTo("security", "login");
            }
        }

        return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Page de connexion"
        ];
    }
    public function logout () {
        Session::setUser(null);
        Session::addFlash("success", "Vous êtes déconnecté");
        $this->redirectTo("home");
    }
}