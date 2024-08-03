<?php
require('../../actions/auth/loginAction.php');
$login = true;
include_once '../../header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #a2c2e0, #e0e0e0);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        .form-outline input {
            border-radius: 8px;
            border: 1px solid #ced4da;
            background-color: #f8f9fa;
            color: #495057;
            transition: border-color 0.3s ease;
        }
        .form-outline input:focus {
            border-color: #6e8efb;
            box-shadow: 0 0 0 0.2rem rgba(110, 142, 253, 0.25);
        }
        .form-label {
            color: #6c757d;
            font-weight: 500;
        }
        .btn-primary {
            background-color: #6e8efb;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #5a7dff;
        }
        .login-image {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
        }
    </style>
</head>
<body>
    <main class="flex-shrink-0">
        <div class="login-container">
            <div class="w-50">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" alt="Illustration" class="login-image">
            </div>
            <div class="w-50">
                <h1 class="mb-4">Authentification</h1>
                
                <?php if (isset($errorMessage)): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= htmlspecialchars($errorMessage) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="inputEmail">Email</label>
                        <input type="email" id="inputEmail" class="form-control form-control-lg" name="email" required>
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="inputPassword">Mot de Passe</label>
                        <input type="password" id="inputPassword" class="form-control form-control-lg" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="send">Se Connecter</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
