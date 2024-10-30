const video = document.getElementById('inputVideo');
const canvas = document.getElementById('overlay');
const tipoRostroSpan = document.getElementById('tipoRostro'); // Referencia al elemento para mostrar el tipo de rostro

(async () => {
    const stream = await navigator.mediaDevices.getUserMedia({ video: {} });
    video.srcObject = stream;
})();

async function onPlay() {
    const MODEL_URL = 'public/models';

    await faceapi.loadSsdMobilenetv1Model(MODEL_URL);
    await faceapi.loadFaceLandmarkModel(MODEL_URL);
    await faceapi.loadFaceRecognitionModel(MODEL_URL);
    await faceapi.loadFaceExpressionModel(MODEL_URL);

    let fullFaceDescriptions = await faceapi.detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceDescriptors()
        .withFaceExpressions();

    const dims = faceapi.matchDimensions(canvas, video, true);
    const resizedResults = faceapi.resizeResults(fullFaceDescriptions, dims);

    faceapi.draw.drawDetections(canvas, resizedResults);
    faceapi.draw.drawFaceLandmarks(canvas, resizedResults);
    faceapi.draw.drawFaceExpressions(canvas, resizedResults, 0.05);

    // Verificar si hay detecciones y calcular el tipo de rostro
    if (resizedResults.length > 0) {
        const landmarks = resizedResults[0].landmarks;
        const tipoRostro = calcularFormaRostro(landmarks);
        tipoRostroSpan.textContent = tipoRostro; // Actualiza el texto en la página
    } else {
        tipoRostroSpan.textContent = "Desconocido"; // Sin detección
    }

    setTimeout(() => onPlay(), 100);
}

// Función para calcular el tipo de rostro
function calcularFormaRostro(landmarks) {
    const leftCheek = landmarks.positions[1]; 
    const rightCheek = landmarks.positions[14]; 
    const chin = landmarks.positions[8]; 
    const noseTip = landmarks.positions[30]; 

    const anchoRostro = rightCheek.x - leftCheek.x; 
    const altoRostro = chin.y - noseTip.y; 

    if (altoRostro <= 0) {
        console.error("La altura del rostro es menor o igual a cero.");
        return 'Desconocido'; 
    }

    const relacionAspecto = anchoRostro / altoRostro; 
    console.log(`Ancho: ${anchoRostro}, Alto: ${altoRostro}, Relación: ${relacionAspecto}`); 

    // Clasificación mejorada
    if (relacionAspecto < 1.1) {
        return 'Rostro Cuadrado';
    } else if (relacionAspecto >= 1.1 && relacionAspecto < 1.5) {
        return 'Rostro Ovalado';
    } else if (relacionAspecto >= 1.5 && relacionAspecto < 1.75) {
        return 'Rostro Redondo';
    } else {
        return 'Rostro Rectangular'; // o 'Rostro Alargado'
    }
}
