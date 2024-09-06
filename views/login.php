<?php require_once __DIR__ . '/inicio.php'; ?>

<form method="post">
    <label for="email">Email</label><br>
    <input type="email" id="email-input" name="email" class="forms" required><br>

    <br>

    <label for="password">Senha</label><br>
    <input type="password" id="password-input" name="password" class="forms" required><br>

    <br>

    <input class="formulario__botao" type="submit" value="Entrar" />
</form>

<?php require_once __DIR__ . '/fim.php'; ?>
