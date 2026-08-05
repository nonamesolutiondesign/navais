document.addEventListener("DOMContentLoaded", () => {
    // 1. Variables de los modelos 3D (Lo que antes estaba en PHP)
    const modelo_v1 = "modelos/navais1.0.glb"; 
    const modelo_v2 = ""; // Vacío = muestra el cartel de Próximamente
    const modelo_kids = "modelos/omnitrixv2.0.glb"; 
    const modelo_kids2 = "modelos/minioms_terminado.glb"; 
  

    // 2. Inyectar Modelo V1
    const contenedorV1 = document.getElementById("contenedor-v1");
    if (contenedorV1) {
        contenedorV1.innerHTML = `
            <model-viewer 
                src="${modelo_v1}" 
                alt="Un modelo 3D interactivo del primer prototipo de Navais." 
                auto-rotate 
                camera-controls 
                shadow-intensity="1"
                camera-orbit="45deg 55deg auto">
            </model-viewer>
        `;
    }

    // 3. Inyectar Modelo V2 (Lógica If/Else)
    const contenedorV2 = document.getElementById("contenedor-v2");
    if (contenedorV2) {
        if (modelo_v2 !== "") {
            contenedorV2.innerHTML = `
                <model-viewer src="${modelo_v2}" alt="Modelo 3D del prototipo versión 2" auto-rotate camera-controls shadow-intensity="1"></model-viewer>
            `;
        } else {
            contenedorV2.innerHTML = `
                <div class="coming-soon">
                    <h3>V2 en desarrollo...</h3>
                    <div class="spinner"></div>
                </div>
            `;
        }
    }

    // 4. Inyectar Modelo Kids (Lógica If/Else)
    const contenedorKids = document.getElementById("contenedor-kids");
    if (contenedorKids) {
        if (modelo_kids !== "") {
            contenedorKids.innerHTML = `
                <model-viewer 
                    src="${modelo_kids}" 
                    alt="Modelo 3D interactivo del prototipo infantil Navais Kids." 
                    auto-rotate 
                    camera-controls 
                    shadow-intensity="1"
                    camera-orbit="45deg 55deg auto">
                </model-viewer>
            `;
        } else {
            contenedorKids.innerHTML = `
                <div class="coming-soon"><h3>Próximamente</h3></div>
            `;
        }
    }
    const contenedorKids2 = document.getElementById("contenedor-kids2");
    if (contenedorKids2) {
        if (modelo_kids2 !== "") {
            contenedorKids2.innerHTML = `
                <model-viewer 
                    src="${modelo_kids2}" 
                    alt="Modelo 3D interactivo del prototipo infantil Navais Kids." 
                    auto-rotate 
                    camera-controls 
                    shadow-intensity="1"
                    camera-orbit="45deg 55deg auto">
                </model-viewer>
            `;
        } else {
            contenedorKids2.innerHTML = `
                <div class="coming-soon"><h3>Próximamente</h3></div>
            `;
        }
    }

      
});
