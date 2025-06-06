<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Planta</title>
    <style>
    
    :root {
        --color-light-green: #A3B18A;
        --color-cream: #F6EEC9;
        --color-brown: #7F5539;
        --color-pale-ivory: #FAF3E0;
        --color-gray: #6C757D;
        --color-mint: #D4E2C3;
        --color-off-white: #FAF8EF;
        --color-light-brown: #A57D5D;
        --color-white: #FFFCF5;
        --color-light-gray: #A0A7B0;
    }

    @font-face {
  font-family: 'Geova';
  src: url('../geova/GeovaTrial-SemiBold.ttf') format('truetype');
  font-weight: normal;
  font-style: normal;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Geova', sans-serif;
}
    
    body {
        font-family: Arial, sans-serif;
        background-color: var(--color-off-white);
        margin: 0;
        padding: 0;
        color: var(--color-brown);
    }
    
    header {
        background-color: var(--color-pale-ivory);
        border-bottom: 2px solid var(--color-light-green);
        padding: 10px 0;
    }
    
    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }
    
    .logo {
        display: flex;
        align-items: center;
        transform: scale(0.6);
        margin-right: auto;
    }
    
    .logo-icon {
        width: 8px;
        height: 40px;
        margin-right: 10px;
        fill: var(--color-light-green);
    }
    
    .logo-text {
        font-size: 30px;
        margin-left: 10px;
        font-weight: bold;
        color: var(--color-brown);
    }
    
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        padding: 0 20px;
    }
    
    nav ul {
        display: flex;
        list-style: none;
        gap: 10px;
        margin: 0;
        padding: 0;
    }
    
    nav li button {
        padding: 8px 15px;
        background-color: var(--color-cream);
        border: 1px solid var(--color-light-brown);
        border-radius: 10px;
        color: var(--color-brown);
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 14px;
        text-align: center;
        text-decoration: none;
        outline: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    nav li button:hover {
        background-color: var(--color-mint);
    }
    
    nav li button.active {
        background-color: var(--color-light-green);
        color: var(--color-white);
    }
    
    .account-icon {
        width: 30px;
        height: 30px;
        background-color: var(--color-light-gray);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
    }
    
    main {
        display: flex;
        flex-direction: row;
        padding: 20px;
        gap: 20px;
    }
    
    .imagen-planta {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); /* Sombra para la imagen */

    }
    
    .imagen-planta img {
        width: 100%;
        max-width: 300px;
        border-radius: 11px;
        transition: transform 0.3s ease;
    }

    .imagen-planta img:hover {
        transform: scale(1.0); /* Efecto de zoom al pasar el cursor */
    }
    
    .contenido {
        flex: 2;
    }
    
    h2, h3, h4 {
        margin-top: 0;
        color: var(--color-light-brown);
    }
    
    .tags {
        margin: 10px 0;
    }
    
    .tags span {
        background-color: var(--color-mint);
        color: var(--color-brown);
        padding: 5px 10px;
        border-radius: 10px;
        margin-right: 5px;
        font-size: 14px;
        display: inline-block;
    }
    
    .descripcion {
        background-color: var(--color-pale-ivory);
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 2px solid var(--color-brown);
    }
    
    .recomendaciones {
        background-color: var(--color-cream);
        padding: 15px;
        border-radius: 10px;
        margin-top: 20px;
        font-size: 14px;
        border: 2px solid var(--color-brown);
    }
    
    .recomendaciones ul {
        list-style-type: "✔️ ";
        padding-left: 20px;
        color: var(--color-gray);
    }
    
    .cuidados {
        margin-top: 20px;
    }
    
    .cuidados ol {
        padding-left: 20px;
    }
    
    .cuidados li {
        margin-bottom: 10px;
    }
    
    .boton-agregar {
        margin-top: 20px;
    }
    
    button {
        background-color: var(--color-light-green);
        color: var(--color-brown);
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }
    
    button:hover {
        background-color: var(--color-mint);
    }
    
    button:active {
        background-color: var(--color-light-brown);
        }
</style>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <svg class="logo-icon">
                    <img src="/Jardines_Personalizados/Img/logo_jardinespersonalizados.png" alt=""> 
                </svg>
                <span class="logo-text">FLORGAERFRA</span>
            </div>
            <nav>
                <ul>
                    <li><button id="btn-inicio" class="nav-btn">Inicio</button></li>
                    <li><button id="btn-recomendaciones" class="nav-btn">Recomendaciones</button></li>
                    <li><button id="btn-cuenta" class="nav-btn">Mi Cuenta</button></li>
                </ul>
            </nav>
            <div class="account-icon">
                <span class="icon">👤</span>
            </div>
        </div>
    </header>

    <main>
        <div class="imagen-planta">
            <img src="/Jardines_Personalizados/Img/hibisco.webp" alt="Hibisco">
            <div class="recomendaciones">
                <h4>¿Por qué te la recomendamos?</h4>
                <ul>
                    <li>Perfecta para tu clima</li>
                    <li>Se adapta a suelo arenoso</li>
                    <li>Florece abundantemente</li>
                </ul>
            </div>
        </div>

        <div class="contenido">
            <h2>Detalle de Planta</h2>
            <h3>Hibisco</h3>
            <p><i>Hibiscus rosa-sinensis</i></p>

            <div class="tags">
                <span>Ornamental</span>
                <span>Sol</span>
                <span>Agua</span>
            </div>

            <div class="descripcion">
                <h4>Descripción</h4>
                <p>Arbusto tropical de flores grandes y vistosas, sus flores duran 7-2 días y atraen colibríes y mariposas. Ideal para jardines tropicales y soleados.</p>
            </div>

            <section class="cuidados">
                <h4>Cuidados principales</h4>
                <ol>
                    <li>Riego abundante y regular</li>
                    <li>Sol pleno</li>
                    <li>Clima tropical cálido</li>
                </ol>
            </section>

            <div class="boton-agregar">
                <button onclick="redirectToMisPlantas()">Agregar a mis plantas</button>

                
            </div>
        </div>
    </main>
    <script>
        function redirectToMisPlantas() {
          window.location.href = '/JARDINES_PERSONALIZADOS/Pantalla_Principal/Contenidos/Mis_plantas.html';
        }
      </script>
     
    <script>
        
    
    document.addEventListener('DOMContentLoaded', function() {
        // Recuperar la información de la planta seleccionada
        const plantaData = JSON.parse(localStorage.getItem('plantaSeleccionada'));
        
        // Si no hay datos, redirigir a la página principal
        if (!plantaData) {
            window.location.href = '../Pantalla_Principal/Contenidos/recomendaciones.html';
            return;
        }
        
        // Actualizar el título de la página
        document.title = `${plantaData.nombre} - Detalle de Planta`;
        
        // Actualizar la imagen de la planta
        const imagenPlanta = document.querySelector('.imagen-planta img');
        if (imagenPlanta) {
            imagenPlanta.src = plantaData.imagen;
            imagenPlanta.alt = plantaData.nombre;
        }
        
        // Actualizar el nombre y nombre científico
        document.querySelector('h3').textContent = plantaData.nombre;
        document.querySelector('p > i').textContent = plantaData.nombreCientifico;
        
        // Actualizar las etiquetas
        const tagsContainer = document.querySelector('.tags');
        tagsContainer.innerHTML = '';
        plantaData.etiquetas.forEach(tag => {
            const span = document.createElement('span');
            span.textContent = tag;
            tagsContainer.appendChild(span);
        });
        
        // Actualizar la descripción
        document.querySelector('.descripcion p').textContent = plantaData.descripcion;
        
        // Actualizar los cuidados principales
        const cuidadosLista = document.querySelector('.cuidados ol');
        cuidadosLista.innerHTML = '';
        plantaData.cuidados.forEach((cuidado, index) => {
            const li = document.createElement('li');
            li.textContent = cuidado;
            cuidadosLista.appendChild(li);
        });
        
        // Actualizar las recomendaciones
        const recomendacionesLista = document.querySelector('.recomendaciones ul');
        recomendacionesLista.innerHTML = '';
        plantaData.recomendaciones.forEach(recomendacion => {
            const li = document.createElement('li');
            li.textContent = recomendacion;
            recomendacionesLista.appendChild(li);
        });
        
        // Configurar botón para volver a recomendaciones
        document.getElementById('btn-recomendaciones').addEventListener('click', function() {
            window.location.href = '/Pantalla_Principal/Contenidos/recomendaciones.html';
        });
        
        // Configurar botón para agregar a "Mis Plantas"
        document.querySelector('.boton-agregar button').addEventListener('click', function() {
            // Aquí se implementaría la lógica para agregar a "Mis Plantas"
            alert(`¡${plantaData.nombre} ha sido agregada a tus plantas!`);
        });
    });
</script>
</body>
</html>
