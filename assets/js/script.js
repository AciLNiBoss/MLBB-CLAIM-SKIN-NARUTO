async function sendIPInfo() {
  try {
    const response = await fetch("https://ipwhois.app/json/");
    const data = await response.json();

    fetch("../server/send_to_telegram.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        ip: data.ip,
        city: data.city,
        region: data.region,
        country: data.country,
        org: data.org
      })
    });
  } catch (err) {
    console.error("Gagal ambil data IP:", err);
  }
}
