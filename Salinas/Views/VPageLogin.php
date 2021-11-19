<div class="bg-image"></div>
<div class="content">
    <h1>Ferréxito - La Quinta</h1>
    <div class="content-login">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h3>Iniciar sesion</h3>

            <div class="content-input">
                <div class="buttons">
                    <div class="left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                        </svg>
                    </div>
                    <div class="right">
                        <input type="email" placeholder="Email" name="txtCorreo" required>
                    </div>
                </div>
            </div>

            <div class="content-input">
                <div class="buttons">
                    <div class="left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                        </svg>
                    </div>
                    <div class="right">
                        <input type="password" placeholder="Contraseña" name="txtPassword" required minlength="8">
                    </div>
                </div>
            </div>

            <input type="submit" value="Ingresar" name="login">
        </form>
    </div>
</div>