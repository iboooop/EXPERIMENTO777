let rabbits = [];
let currentIndex = 0;

const breedElement = document.getElementById('rabbit-breed');
const imgElement = document.getElementById('rabbit-img');
const descElement = document.getElementById('rabbit-description');

function applySnakeEffect(element, text) {
    element.innerHTML = ""; 
    text.split("").forEach((char, index) => {
        const span = document.createElement("span");
        span.textContent = char === " " ? "\u00A0" : char;
        span.classList.add("snake-letter");
        span.style.animationDelay = `${index * 0.05}s`;
        element.appendChild(span);
    });
}

// ESTADO INICIAL
applySnakeEffect(breedElement, "Cargando...");
applySnakeEffect(descElement, "Buscando bnuuys en la base de datos...");

async function loadRabbits() {
    try {
        const response = await fetch('php/get_photos.php');
        rabbits = await response.json();
        
        if (rabbits.length > 0) {
            updateDisplay();
        } else {
            applySnakeEffect(breedElement, "No hay conejos");
            applySnakeEffect(descElement, "La base de datos está vacía.");
        }
    } catch (e) {
        console.error("Error:", e);
        applySnakeEffect(breedElement, "Error");
        applySnakeEffect(descElement, "No se pudo conectar con el servidor.");
    }
}

function updateDisplay() {
    const r = rabbits[currentIndex];
    imgElement.src = r.image_url; 
    applySnakeEffect(breedElement, `Raza: ${r.breed}`);
    applySnakeEffect(descElement, r.description);
}

document.getElementById('next').addEventListener('click', () => {
    if(rabbits.length > 0) {
        currentIndex = (currentIndex + 1) % rabbits.length;
        updateDisplay();
    }
});

document.getElementById('prev').addEventListener('click', () => {
    if(rabbits.length > 0) {
        currentIndex = (currentIndex - 1 + rabbits.length) % rabbits.length;
        updateDisplay();
    }
});

loadRabbits();