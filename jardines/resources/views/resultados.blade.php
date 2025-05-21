<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendaciones de Plantas</title>
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <svg class="logo-icon" >
                <img src="{{ asset('Img/logo_jardinespersonalizados.png') }}" alt="Logo" class="logo"> 
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
                </svg>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="filter-section">
            <div class="filter-criteria">
                <p>Basado en: Clima tropical cálido, suelo arenoso, sol pleno, riego moderado</p>
            </div>
            <div class="filter-count">8 plantas encontradas</div>
            <div class="filter-buttons">
                <button class="filter-btn active" data-category="todas">Todas</button>
                <button class="filter-btn" data-category="ornamentales">Ornamentales</button>
                <button class="filter-btn" data-category="medicinales">Medicinales</button>
                <button class="filter-btn" data-category="frutales">Frutales</button>
                <button class="filter-btn" data-category="otras">Otras</button>
            </div>
        </div>

        <div class="plant-grid">
            <!-- Hibisco Card -->
            <div class="plant-card" data-category="ornamentales">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/R (1).jpeg" alt="Hibisco" width="300000" height="160"></img>
                    </svg>
                </div>
                <div class="plant-info">
                    <div class="plant-name">Hibisco</div>
                    <div class="plant-scientific">Hibiscus rosa-sinensis</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Ornamental</span>
                        <span class="plant-tag">Sol</span>
                        <span class="plant-tag">Arbusto</span>
                    </div>
                </div>
            </div>

            <!-- Limón Card -->
            <div class="plant-card" data-category="frutales">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/FUR56L7KBBH4JLMFMJ2TFOCNZI.avif" alt="Hibisco" width="300000" height="160"></img>
                    </svg>
                </div>
                <div class="plant-info">
                    <div class="plant-name">Limón</div>
                    <div class="plant-scientific">Citrus limon</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Frutal</span>
                        <span class="plant-tag">Sol</span>
                        <span class="plant-tag">Perenne</span>
                    </div>
                </div>
            </div>

            <!-- Aloe Vera Card -->
            <div class="plant-card" data-category="medicinales">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/92364.webp" alt="Hibisco" width="300000" height="160"></img>
                   </svg>

                </div>
                <div class="plant-info">
                    <div class="plant-name">Aloe Vera</div>
                    <div class="plant-scientific">Aloe barbadensis</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Medicinal</span>
                        <span class="plant-tag">Semi-sol</span>
                        <span class="plant-tag">Suculenta</span>
                    </div>
                </div>
            </div>

            <!-- Plantas adicionales -->
            <div class="plant-card" data-category="ornamentales">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/R.jpeg" alt="Hibisco" width="300000" height="160"></img>
                    </svg>
                </div>
                <div class="plant-info">
                    <div class="plant-name">Gardenia</div>
                    <div class="plant-scientific">Gardenia jasminoides</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Ornamental</span>
                        <span class="plant-tag">Semi-sol</span>
                        <span class="plant-tag">Arbusto</span>
                    </div>
                </div>
            </div>

            <div class="plant-card" data-category="medicinales">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/OIP.jpeg" alt="Hibisco" width="300000" height="160"></img>
                    </svg>
                </div>
                <div class="plant-info">
                    <div class="plant-name">Menta</div>
                    <div class="plant-scientific">Mentha spicata</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Medicinal</span>
                        <span class="plant-tag">Sol parcial</span>
                        <span class="plant-tag">Hierba</span>
                    </div>
                </div>
            </div>

            <div class="plant-card" data-category="frutales">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/Planta-de-Papaya-10-1024x768.jpg" alt="Hibisco" width="300000" height="160"></img>
                    </svg> <
                </div>
                <div class="plant-info">
                    <div class="plant-name">Papaya</div>
                    <div class="plant-scientific">Carica papaya</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Frutal</span>
                        <span class="plant-tag">Sol</span>
                        <span class="plant-tag">Árbol</span>
                    </div>
                </div>
            </div>

            <div class="plant-card" data-category="otras">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/OIP (1).jpeg" alt="Hibisco" width="300000" height="160"></img>
                    </svg>
                </div>
                <div class="plant-info">
                    <div class="plant-name">Palma Areca</div>
                    <div class="plant-scientific">Dypsis lutescens</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Decorativa</span>
                        <span class="plant-tag">Sombra parcial</span>
                        <span class="plant-tag">Palma</span>
                    </div>
                </div>
            </div>

            <div class="plant-card" data-category="otras">
                <div class="plant-image">
                    <svg class="plant-icon" viewBox="0 0 24 24">
                        <img src="/Jardines_Personalizados/Img/2feb137bb1b7.webp" alt="Hibisco" width="300000" height="160"></img>
                    </svg>
                </div>
                <div class="plant-info">
                    <div class="plant-name">Bambú</div>
                    <div class="plant-scientific">Bambusa vulgaris</div>
                    <div class="plant-tags">
                        <span class="plant-tag">Decorativa</span>
                        <span class="plant-tag">Sol parcial</span>
                        <span class="plant-tag">Gramínea</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagination">
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
        </div>
    </div>

   

    <script>
      // Filtrado de plantas
        const filterButtons = document.querySelectorAll('.filter-btn');
        const plantCards = document.querySelectorAll('.plant-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Quitar clase activa de todos los botones
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Agregar clase activa al botón seleccionado
                button.classList.add('active');
                
                // Obtener categoría seleccionada
                const category = button.getAttribute('data-category');
                
                // Mostrar plantas según la categoría
                plantCards.forEach(card => {
                    if (category === 'todas' || card.getAttribute('data-category') === category) {
                        card.classList.remove('hidden');
                    } else {
                        card.classList.add('hidden');
                    }
                });
                
                // Actualizar contador de plantas
                const visiblePlants = document.querySelectorAll('.plant-card:not(.hidden)').length;
                document.querySelector('.filter-count').textContent = visiblePlants + ' plantas encontradas';
            });
        });
        
        // Función para los botones de paginación (simulación)
        const pageButtons = document.querySelectorAll('.page-btn');
        
        pageButtons.forEach(button => {
            button.addEventListener('click', () => {
                pageButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                showNotification('Cargando página ' + button.textContent + '...');
                // En un sitio real, aquí cargarías diferentes plantas
            });
        });
        
        // Almacena la información de cada planta para usar en la página de detalle
const plantasInfo = {
    "hibisco": {
        nombre: "Hibisco",
        nombreCientifico: "Hibiscus rosa-sinensis",
        imagen: "/Jardines_Personalizados/Img/R (1).jpeg",
        descripcion: "Arbusto tropical de flores grandes y vistosas, sus flores duran 7-2 días y atraen colibríes y mariposas. Ideal para jardines tropicales y soleados.",
        cuidados: [
            "Riego abundante y regular",
            "Sol pleno",
            "Clima tropical cálido"
        ],
        recomendaciones: [
            "Perfecta para tu clima",
            "Se adapta a suelo arenoso",
            "Florece abundantemente"
        ],
        etiquetas: ["Ornamental", "Sol", "Arbusto"]
    },
    "limon": {
        nombre: "Limón",
        nombreCientifico: "Citrus limon",
        imagen: "/Jardines_Personalizados/Img/FUR56L7KBBH4JLMFMJ2TFOCNZI.avif",
        descripcion: "Árbol frutal perenne que produce frutos cítricos de sabor ácido. Sus flores blancas son aromáticas y su follaje verde brillante es perenne.",
        cuidados: [
            "Riego moderado",
            "Sol pleno",
            "Proteger de heladas"
        ],
        recomendaciones: [
            "Ideal para clima tropical",
            "Produce frutos todo el año",
            "Perfecto para macetas grandes"
        ],
        etiquetas: ["Frutal", "Sol", "Perenne"]
    },
    "aloe": {
        nombre: "Aloe Vera",
        nombreCientifico: "Aloe barbadensis",
        imagen: "/Jardines_Personalizados/Img/92364.webp",
        descripcion: "Planta suculenta medicinal con hojas carnosas que contienen un gel transparente utilizado para tratamientos de la piel y propiedades curativas.",
        cuidados: [
            "Riego escaso",
            "Semi-sol",
            "Suelo bien drenado"
        ],
        recomendaciones: [
            "Planta medicinal útil",
            "Requiere poco mantenimiento",
            "Resistente a sequías"
        ],
        etiquetas: ["Medicinal", "Semi-sol", "Suculenta"]
    },
    "gardenia": {
        nombre: "Gardenia",
        nombreCientifico: "Gardenia jasminoides",
        imagen: "/Jardines_Personalizados/Img/R.jpeg",
        descripcion: "Arbusto ornamental con flores blancas extremadamente fragantes. Su follaje es verde oscuro y brillante, ideal para jardines aromáticos.",
        cuidados: [
            "Riego regular",
            "Semi-sol",
            "Suelo ácido"
        ],
        recomendaciones: [
            "Flores muy aromáticas",
            "Elegante para jardines",
            "Atrae polinizadores"
        ],
        etiquetas: ["Ornamental", "Semi-sol", "Arbusto"]
    },
    "menta": {
        nombre: "Menta",
        nombreCientifico: "Mentha spicata",
        imagen: "/Jardines_Personalizados/Img/OIP.jpeg",
        descripcion: "Hierba aromática perenne con hojas muy fragantes. Es invasiva y se propaga fácilmente, ideal para té y usos culinarios.",
        cuidados: [
            "Riego frecuente",
            "Sol parcial",
            "Contener su crecimiento"
        ],
        recomendaciones: [
            "Aromática y refrescante",
            "Fácil de cultivar",
            "Múltiples usos culinarios"
        ],
        etiquetas: ["Medicinal", "Sol parcial", "Hierba"]
    },
    "papaya": {
        nombre: "Papaya",
        nombreCientifico: "Carica papaya",
        imagen: "/Jardines_Personalizados/Img/Planta-de-Papaya-10-1024x768.jpg",
        descripcion: "Árbol frutal de rápido crecimiento con tallos huecos y frutos dulces. Su crecimiento es vertical y produce frutos durante todo el año.",
        cuidados: [
            "Riego abundante",
            "Sol pleno",
            "Proteger del viento"
        ],
        recomendaciones: [
            "Crecimiento rápido",
            "Frutos nutritivos",
            "Adaptado a clima tropical"
        ],
        etiquetas: ["Frutal", "Sol", "Árbol"]
    },
    "palma": {
        nombre: "Palma Areca",
        nombreCientifico: "Dypsis lutescens",
        imagen: "/Jardines_Personalizados/Img/OIP (1).jpeg",
        descripcion: "Palmera elegante con hojas arqueadas y tallos múltiples. Ideal como planta interior o para dar sombra parcial en exteriores.",
        cuidados: [
            "Riego moderado",
            "Sombra parcial",
            "Alta humedad"
        ],
        recomendaciones: [
            "Elegante y decorativa",
            "Purifica el aire",
            "Fácil adaptación"
        ],
        etiquetas: ["Decorativa", "Sombra parcial", "Palma"]
    },
    "bambu": {
        nombre: "Bambú",
        nombreCientifico: "Bambusa vulgaris",
        imagen: "/Jardines_Personalizados/Img/2feb137bb1b7.webp",
        descripcion: "Gramínea de rápido crecimiento que forma cañas huecas. Excelente como cortavientos, barrera visual o elemento arquitectónico.",
        cuidados: [
            "Riego abundante",
            "Sol parcial",
            "Contener su propagación"
        ],
        recomendaciones: [
            "Crecimiento muy rápido",
            "Elemento arquitectónico",
            "Cortavientos eficaz"
        ],
        etiquetas: ["Decorativa", "Sol parcial", "Gramínea"]
    }
};

// Guardar la información de la planta al hacer clic y navegar a la página de detalle
document.querySelectorAll('.plant-card').forEach(card => {
    card.addEventListener('click', function() {
        // Obtenemos la categoría y nombre de la planta
        const categoria = this.getAttribute('data-category');
        const nombrePlanta = this.querySelector('.plant-name').textContent.toLowerCase();
        
        // Identificamos la planta según su nombre
        let plantaId = "";
        if (nombrePlanta.includes('hibisco')) plantaId = "hibisco";
        else if (nombrePlanta.includes('limón')) plantaId = "limon";
        else if (nombrePlanta.includes('aloe')) plantaId = "aloe";
        else if (nombrePlanta.includes('gardenia')) plantaId = "gardenia";
        else if (nombrePlanta.includes('menta')) plantaId = "menta";
        else if (nombrePlanta.includes('papaya')) plantaId = "papaya";
        else if (nombrePlanta.includes('palma')) plantaId = "palma";
        else if (nombrePlanta.includes('bambú')) plantaId = "bambu";
        
        // Guardar información de la planta en localStorage
        if (plantaId && plantasInfo[plantaId]) {
            localStorage.setItem('plantaSeleccionada', JSON.stringify(plantasInfo[plantaId]));
            // Imprime mensaje para depurar
            console.log("{{ route('detalles_plantas') }}", plantasInfo[plantaId]);
            // Redirigir a la página de detalle con la ruta completa
            window.location.href = "{{ route('detalles_plantas') }}";
        } else {
            console.error('No se encontró información para la planta:', nombrePlanta);
        }
    }); 
});
     

// Manejo de navegación
    document.getElementById('btn-inicio').addEventListener('click', function() {
      window.location.href = "{{ route('pantalla_inicio') }}";
    });
    
    document.getElementById('btn-recomendaciones').addEventListener('click', function() {
      window.location.href = "{{ route('recomen') }}";
    });
    
    document.getElementById('btn-cuenta').addEventListener('click', function() {
      window.location.href = "{{ route('mi_perfil') }}";
    });
    </script>
</body>
</html>