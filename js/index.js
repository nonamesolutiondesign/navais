document.addEventListener("DOMContentLoaded", function() {
    // --- 1. SCROLL SUAVE PARA ENLACES ---
    const links = document.querySelectorAll('.nav-links a[href^="#"], .hero a[href^="#"]');
    
    for (const link of links) {
        link.addEventListener("click", function(e) {
            e.preventDefault();
            const href = this.getAttribute("href");
            const targetElement = document.querySelector(href);
            
            if (targetElement) {
                const offsetTop = targetElement.offsetTop - 70; // Resta la altura del header fijo
                scroll({
                    top: offsetTop,
                    behavior: "smooth"
                });
            }
        });
    }

    // --- 2. LECTURA POR VOZ (Web Speech API) ---
    const btnLeer = document.getElementById('btn-leer');
    const synth = window.speechSynthesis;
    
    // Variables globales para la voz
    let vocesDisponibles = [];
    let selectorVoz;

    if (btnLeer) {
        // Creamos el selector (dropdown) dinámicamente
        selectorVoz = document.createElement('select');
        selectorVoz.id = "selector-voz";
        
        // Estilo básico para que no ocupe tanto espacio
        selectorVoz.style.marginRight = "10px";
        selectorVoz.style.padding = "8px";
        selectorVoz.style.borderRadius = "5px";
        selectorVoz.style.maxWidth = "250px"; 
        selectorVoz.style.fontFamily = "Arial, sans-serif";
        
        btnLeer.parentNode.insertBefore(selectorVoz, btnLeer);

        // Función para cargar TODAS las voces y ordenarlas
        function cargarVoces() {
            let todasLasVoces = synth.getVoices();
            selectorVoz.innerHTML = ''; // Limpiamos el selector

            // Ordenamos la lista: Si se llama "Sabina", la mandamos al índice 0 (arriba de todo)
            todasLasVoces.sort((a, b) => {
                const aEsSabina = a.name.includes('Sabina');
                const bEsSabina = b.name.includes('Sabina');
                
                if (aEsSabina && !bEsSabina) return -1; // 'a' sube
                if (!aEsSabina && bEsSabina) return 1;  // 'b' sube
                return 0; // El resto queda en su lugar original
            });

            // Guardamos la lista ordenada
            vocesDisponibles = todasLasVoces;

            // Llenamos el menú con todas las voces encontradas
            vocesDisponibles.forEach((voz, index) => {
                const option = document.createElement('option');
                
                // --- LIMPIEZA DEL TEXTO ---
                let nombreLimpio = voz.name.replace('Microsoft ', '');
                nombreLimpio = nombreLimpio.split(' - ')[0]; 

                option.textContent = `${nombreLimpio} (${voz.lang})`; 
                option.value = index; 
                selectorVoz.appendChild(option);
            });
            
            // Seleccionamos el primer elemento por defecto
            if (vocesDisponibles.length > 0) {
                selectorVoz.selectedIndex = 0;
            }
        }

        // Ejecutamos la carga inicial
        cargarVoces();
        // Recargamos por si Windows demora en mandar la lista
        if (speechSynthesis.onvoiceschanged !== undefined) {
            speechSynthesis.onvoiceschanged = cargarVoces;
        }

        // --- 3. LÓGICA DEL BOTÓN DE LEER ---
        btnLeer.addEventListener('click', () => {
            if (!synth) {
                alert("Tu navegador no soporta la lectura por voz.");
                return;
            }

            if (synth.speaking) {
                // Cortar lectura si ya está hablando
                synth.cancel();
                btnLeer.innerHTML = "🔊 Leer página en voz alta";
            } else {
                // --- EXTRACCIÓN NARRATIVA ---
                let textoALeer = "";

                // 1. Agarramos el saludo inicial del logo
                const logoImg = document.getElementById('logo-navais');
                if (logoImg && logoImg.alt) {
                    textoALeer += logoImg.alt + ". ";
                }
                
                // 2. Seleccionamos títulos y párrafos, EXCEPTO los que tienen la clase "ignorar-lectura"
                const elementosTexto = document.querySelectorAll('h1:not(.ignorar-lectura), h2:not(.ignorar-lectura), p:not(.ignorar-lectura)');
                
                elementosTexto.forEach(el => {
                    // Evitamos que lea las cosas que están escondidas dentro de las secciones de ignorar
                    if (!el.closest('.ignorar-lectura')) {
                        let textoLimpio = el.innerText.trim();
                        if (textoLimpio.length > 0) {
                            textoALeer += textoLimpio + ". "; 
                        }
                    }
                });

                const utterance = new SpeechSynthesisUtterance(textoALeer);
                
                // Leemos con la voz que el usuario haya dejado seleccionada
                const indiceSeleccionado = selectorVoz.value;
                const vozElegida = vocesDisponibles[indiceSeleccionado];
                
                if (vozElegida) {
                    utterance.voice = vozElegida;
                    utterance.lang = vozElegida.lang;
                }

                utterance.rate = 1; 
                utterance.pitch = 1; 

                utterance.onend = () => {
                    btnLeer.innerHTML = "🔊 Leer página en voz alta";
                };

                synth.speak(utterance);
                btnLeer.innerHTML = "🔇 Detener lectura";
            }
        });
    }
});