
function createHeart() {
    const heart = document.createElement("div");
    heart.classList.add("heart");
    heart.innerHTML = "❤️";
    heart.style.left = Math.random() * 100 + "vw";
    heart.style.fontSize = (20 + Math.random() * 50) + "px";
    heart.style.animationDuration = (5 + Math.random() * 4) + "s";
    document.body.appendChild(heart);
    setTimeout(() => heart.remove(), 10000);
}
setInterval(createHeart, 350);





let evetBtn = document.getElementById("evetBtn");
let hayirBtn = document.getElementById("hayirBtn");
let soru = document.getElementById("soru");

let clickCount = 0;

// Her hayır tıklamasında gösterilecek cümleler
const messages = [
    "Gerçekten mi? 😢",
    "Bak ama üzülüyorum…",
    "Şaka yapıyorsun dimi? 😟",
    "Yapma nolur… 😭",
    "Kalbim kırılıyor…",
    "Ama ben seni seviyorum… 💔",
    "Üzme beni… 😥",
    "Lütfen…",
];

hayirBtn.addEventListener("click", () => {
    clickCount++;

    // ✔ Her tıklamada metin değişsin
    if (clickCount < messages.length) {
        soru.innerHTML = messages[clickCount];
    } else {
        soru.innerHTML = "Artık çok kırıldım… 😔";
    }

    // ✔ Kaçış hareketi
    hayirBtn.style.left = (5 + Math.random() * 90) + "%";
    hayirBtn.style.top  = (30 + Math.random() * 60) + "%";

    // ✔ Evet butonu büyüsün
    let newScale = 1 + clickCount * 1.3;
    evetBtn.style.transform = `scale(${newScale})`;

    // ✔ Tüm ekranı kaplayan final
    if (newScale >= 6) {
        document.body.innerHTML = `
            <div style="
                font-size:60px;
                margin-top:200px;
                text-align:center;
                color:white;
                text-shadow:0 0 30px rgba(255,255,255,1);
                animation: pulseFinal 2s infinite;
            ">
                TAMAM ❤️ SENİ BEN DE ÇOK SEVİYORUM ❤️
            </div>
        `;
    }
});

// EVET'e basınca final ekranı
evetBtn.addEventListener("click", () => {
    document.body.innerHTML = `
        <div style="
            font-size:60px;
            margin-top:200px;
            text-align:center;
            color:white;
            text-shadow:0 0 30px rgba(255,255,255,1);
            animation: pulseFinal 2s infinite;
        ">
            BEN DE SENİ ÇOK SEVİYORUM ❤️❤️❤️
        </div>
    `;
});
