<?php

class UserController extends Controller {
    private $userModel;

    public function __construct(PDO $connection) {
        $this->userModel = new User($connection);
    }

    public function initSc() {

        // Obtener datos del formulario de inicio de sesión
        $username = $_POST['user'] ?? null;
        $password = $_POST['password'] ?? null;

        $userAdm = $this->userModel->getById(1);

        $verifyPassword = password_verify($password, $userAdm["password"] );

        if ($username && $verifyPassword) {
            // Validación de credenciales
            if ($username) {
                $_SESSION["administrador"] = true;
                $this->render("inicio", [], "main"); // Usa render para redirigir a inicio
            } else {
                $_SESSION['error'] = "Usuario o contraseña incorrectos.";
                $this->render("initAdmin", ['error' => $_SESSION['error']], "main");
            }
        } else {
            $this->render("initAdmin", ['error' => 'Por favor ingresa tus datos'], "main");
        }
    }

    public function closeSc() {
        session_unset();
        session_destroy();
        $this->render("initAdmin", [], "main"); // Usa render para redirigir al formulario de login
    }
}
