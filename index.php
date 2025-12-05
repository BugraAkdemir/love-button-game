<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<title>Beni Seviyor musun?</title>

<style>
    body {
        margin: 0;
        height: 100vh;
        background: radial-gradient(circle at top, #ffb6c1, #ff6a88, #ff416c);
        overflow: hidden;
        font-family: "Poppins", sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        color: white;
        position: relative;
    }

    /* Arkaplan kalpleri */
    .heart {
        position: absolute;
        color: rgba(255, 255, 255, 0.5);
        animation: rise 8s linear infinite;
        pointer-events: none;
    }

    @keyframes rise {
        0% { transform: translateY(110vh) scale(0.6); opacity: 0; }
        50% { opacity: 1; }
        100% { transform: translateY(-20vh) scale(1.6); opacity: 0; }
    }

    /* Typewriter efektli yazı */
    #soru {
        font-size: 44px;
        font-weight: 800;
        margin-bottom: 50px;
        white-space: nowrap;
        border-right: 4px solid rgba(255,255,255,0.8);
        overflow: hidden;
        width: 420px;
        text-shadow: 0 0 20px rgba(255,255,255,0.7);
    }

    .btn {
        padding: 18px 50px;
        font-size: 28px;
        border-radius: 20px;
        border: none;
        cursor: pointer;
        font-weight: bold;
        margin: 12px;
        transition: 0.25s;
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }

    /* EVET BUTONU */
    #evetBtn {
        background: linear-gradient(135deg, #4caf50, #79ff79);
        color: white;
        animation: bounce 1.5s infinite;
        transition: transform 0.2s ease;
        z-index: 5;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    #evetBtn:hover {
        box-shadow: 0 0 50px rgba(76, 175, 80, 1);
        transform: scale(1.15);
    }

    /* HAYIR BUTONU */
    #hayirBtn {
        background: linear-gradient(135deg, #ff3b3b, #ff6b6b);
        color: white;
        position: absolute;
        top: 65%;
        left: 50%;
        transform: translate(-50%, -50%);
        transition: left 0.1s, top 0.1s;
        z-index: 4;
    }
</style>
</head>
<body>

<!-- Arkaplan kalpler -->
<script>
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
</script>

<div id="soru">Beni seviyor musun? ❤️</div>

<button id="evetBtn" class="btn">Evet</button>
<button id="hayirBtn" class="btn">Hayır</button>

<script>
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
</script>

</body>
</html>
