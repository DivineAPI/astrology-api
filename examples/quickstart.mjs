// DivineAPI example: Vedic basic astro details (moon sign, nakshatra, tithi) for a birth date, time and place.
// Docs: https://developers.divineapi.com/indian-api/kundli-api/basic-astrological-details
// Run (Node 18+):  export DIVINEAPI_API_KEY=... DIVINEAPI_AUTH_TOKEN=...   then   node quickstart.mjs
// Node 20.6+ can also read the .env file:   node --env-file=.env quickstart.mjs

const URL = "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details";
const API_KEY = process.env.DIVINEAPI_API_KEY;
const AUTH_TOKEN = process.env.DIVINEAPI_AUTH_TOKEN;
if (!API_KEY || !AUTH_TOKEN) {
  console.error("Set DIVINEAPI_API_KEY and DIVINEAPI_AUTH_TOKEN (see .env.example)");
  process.exit(1);
}

const fields = {
  api_key: API_KEY,
  full_name: "Rahul Kumar",
  gender: "male",
  day: "24",
  month: "05",
  year: "1990",
  hour: "14",
  min: "40",
  sec: "0",
  place: "new delhi",
  lat: "28.6139",
  lon: "77.2090",
  tzone: "5.5",
  lan: "en",
};
const form = new FormData(); // multipart/form-data, which every DivineAPI endpoint expects
for (const [k, v] of Object.entries(fields)) form.append(k, v);

const res = await fetch(URL, {
  method: "POST",
  headers: { Authorization: `Bearer ${AUTH_TOKEN}` },
  body: form,
});
const body = await res.json();
// legacy hosts return HTTP 200 even on errors: check "success" in the body
if (body.success !== 1) {
  console.error("API error:", JSON.stringify(body.msg ?? body));
  process.exitCode = 1;
} else {
  printResult(body);
}

function printResult(body) {
  const d = body.data;
  console.log("Moon sign:", d.moonsign);
  console.log("Nakshatra:", d.nakshatra);
  console.log("Tithi:", d.paksha, d.tithi);
}
