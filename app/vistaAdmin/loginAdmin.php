<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsenciaSpa</title>
    <link rel="stylesheet" href="../resources/style/login.css">
    <link rel="stylesheet" href="../resources/style/tipografia.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
</head>

<body>
    
    <div class="box">
        <div class="container content-form">
            <div class="top-header">
                <span class="roboto-regular pt15">Esencia Spa</span>
                <header class="roboto-bold">Iniciar Sesion</header>
            </div>

            <div class="input-field">
                <input type="text" class="input" placeholder="Usuario" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-field">
                <input type="password" class="input" placeholder="contrasenia" required>
                <i class="bx bx-lock-alt"></i>
            </div>

            <div class="input-field">
                <a  href="inicioAdmin.php"rel="noopener noreferrer">
                <input type="submit" class="submit" value="Inicio">
                </a>
                
            </div>

            <div class="buttom">
                <div class="left">
                    <input type="checkbox" id="check">
                    <label for="check"> Recordarme</label>
                </div>
                <div class="rigth">
                    <label><a href="#">¿Olvidaste la contraseña?</a> </label>
                </div>
            </div>
        </div>
    </div>  

    <div class="contenido-final">
            <div class="horarios">
                <h2 class="roboto-black">HORARIOS</h2>
                <p class="roboto-regular texto-pie">De lunes a sábado de 8:00 am - 12 pm y de 2:00 pm - 6:00 pm</p>
            </div>
            <div class="fother">
                <p class="derechos-reservados roboto-light">© 2024 EsenciaSpa. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>

</body>