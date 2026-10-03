# Astrology API by DivineAPI

![Astrology API by DivineAPI](.github/social-preview.png)

**Astrology API that returns Vedic (kundli, panchang), Western (natal chart), horoscope, tarot and numerology data as JSON. 300+ endpoints, 125+ white-label PDF report types and hosted MCP servers, for developers building astrology apps, sites and AI assistants.**

[![Docs](https://img.shields.io/badge/Docs-developers.divineapi.com-4F46E5)](https://developers.divineapi.com)
[![Trial](https://img.shields.io/badge/14--day%20free%20trial-start-039BE5)](https://divineapi.com/start-trial)
[![Postman](https://img.shields.io/badge/Postman-collection-FF6C37)](https://documenter.getpostman.com/view/26759678/2sBYAysU8Y)
[![Status](https://img.shields.io/badge/Status-status.divineapi.com-10B981)](https://status.divineapi.com)
[![MCP](https://img.shields.io/badge/MCP-hosted%20servers-6B7280)](https://divineapi.com/mcp)
[![Ask DeepWiki](https://deepwiki.com/badge.svg)](https://deepwiki.com/DivineAPI/astrology-api)

Verified live against the DivineAPI API on 2 October 2026.

This repo is the hub for DivineAPI on GitHub: what the platform covers, one quickstart per language, and which repo to open next.

## What the API covers

300+ endpoints across 8 domains. Calculations use Swiss Ephemeris under a commercial licence; Vedic endpoints are sidereal (Lahiri ayanamsa, fixed), Western endpoints are tropical.

| Domain | Size | Examples | Languages | Docs |
|---|---|---|---|---|
| Vedic (Indian) astrology | 140+ endpoints | Kundli, planetary positions, divisional charts, dashas, doshas, yogas, matching, Lal Kitab, panchang, festivals | 8 Indian languages | [Indian API](https://developers.divineapi.com/indian-api) |
| Western astrology | 60+ endpoints | Planetary positions, house cusps, aspects, natal wheel chart, synastry, transits | 12 languages (text reports) | [Western API](https://developers.divineapi.com/western-api) |
| Horoscope and tarot | 40+ endpoints | Daily, weekly, monthly and yearly horoscopes, daily tarot, yes or no tarot | 25 languages (translator host) | [Horoscope and Tarot API](https://developers.divineapi.com/horoscope-and-tarot-api) |
| Numerology | 15+ endpoints | Core numbers, Lo Shu grid, name number, mobile number analysis | English only | [Numerology API](https://developers.divineapi.com/numerology-apis) |
| PDF reports | 125+ white-label report types | Kundli, matching, natal, numerology reports with your logo and company details | See docs | [PDF Report API](https://developers.divineapi.com/pdf-report-api) · [samples](https://reports.divineapi.com/reports) |

## Quickstart (60 seconds)

**1. Get credentials.** [Start the 14-day free trial](https://divineapi.com/start-trial) (credit card required to activate the trial), then copy your **API key** and **auth token** from the dashboard.

**2. Make a call.** Every endpoint is a `POST` with a `multipart/form-data` body. Send the auth token as a Bearer header and the API key as the `api_key` form field. The example below returns Vedic basic details (moon sign, nakshatra, tithi and more) for a birth date, time and place.

Runnable files: [`examples/`](examples) (curl, Python, Node.js, PHP).

### curl

```bash
curl -s -X POST https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details \
  -H "Authorization: Bearer YOUR_AUTH_TOKEN" \
  -F api_key=YOUR_API_KEY \
  -F full_name="Rahul Kumar" -F gender=male \
  -F day=24 -F month=05 -F year=1990 \
  -F hour=14 -F min=40 -F sec=0 \
  -F place="new delhi" -F lat=28.6139 -F lon=77.2090 -F tzone=5.5
```

### Python (requests)

```python
import requests

url = "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details"
headers = {"Authorization": "Bearer YOUR_AUTH_TOKEN"}
fields = {
    "api_key": "YOUR_API_KEY",
    "full_name": "Rahul Kumar", "gender": "male",
    "day": "24", "month": "05", "year": "1990",
    "hour": "14", "min": "40", "sec": "0",
    "place": "new delhi", "lat": "28.6139", "lon": "77.2090", "tzone": "5.5",
}

# files= sends multipart/form-data, which every DivineAPI endpoint expects
r = requests.post(url, headers=headers, files={k: (None, v) for k, v in fields.items()}, timeout=60)
data = r.json()
if data.get("success") != 1:
    raise SystemExit(data)
print(data["data"]["moonsign"], data["data"]["nakshatra"], data["data"]["tithi"])
# Taurus Krittika Amavasya
```

### Node.js (fetch, Node 18+)

Save as `basic-astro.mjs` (top-level `await` needs an ES module) and run `node basic-astro.mjs`.

```javascript
const url = "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details";

const form = new FormData();
const fields = {
  api_key: "YOUR_API_KEY",
  full_name: "Rahul Kumar", gender: "male",
  day: "24", month: "05", year: "1990",
  hour: "14", min: "40", sec: "0",
  place: "new delhi", lat: "28.6139", lon: "77.2090", tzone: "5.5",
};
for (const [k, v] of Object.entries(fields)) form.append(k, v);

const res = await fetch(url, {
  method: "POST",
  headers: { Authorization: "Bearer YOUR_AUTH_TOKEN" },
  body: form,
});
const data = await res.json();
if (data.success !== 1) throw new Error(JSON.stringify(data));
console.log(data.data.moonsign, data.data.nakshatra, data.data.tithi);
// Taurus Krittika Amavasya
```

### PHP (cURL)

```php
<?php
$url = "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details";

$fields = [
    "api_key"   => "YOUR_API_KEY",
    "full_name" => "Rahul Kumar", "gender" => "male",
    "day"  => "24", "month" => "05", "year" => "1990",
    "hour" => "14", "min"   => "40", "sec"  => "0",
    "place" => "new delhi", "lat" => "28.6139", "lon" => "77.2090", "tzone" => "5.5",
];

$ch = curl_init($url);
curl_setopt_array($ch, [
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $fields, // an array makes cURL send multipart/form-data
    CURLOPT_HTTPHEADER     => ["Authorization: Bearer YOUR_AUTH_TOKEN"],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT        => 60,
]);
$data = json_decode(curl_exec($ch), true);
curl_close($ch);

if (($data["success"] ?? 0) !== 1) {
    exit(print_r($data, true));
}
echo $data["data"]["moonsign"], " ", $data["data"]["nakshatra"], " ", $data["data"]["tithi"], PHP_EOL;
```

### Example response (trimmed)

```json
{
  "success": 1,
  "data": {
    "full_name": "Rahul Kumar",
    "place": "new delhi",
    "timezone": "5.5",
    "sunrise": "1990-05-24 05:25:52",
    "sunset": "1990-05-24 19:09:50",
    "tithi": "Amavasya",
    "paksha": "Krishna",
    "sunsign": "Taurus",
    "moonsign": "Taurus",
    "chandramasa": "Vaishakh",
    "nakshatra": "Krittika",
    "vaar": "Thursday",
    "varna": "Vaishya",
    "yoni": "Mesha",
    "gana": "Rakshasa",
    "nadi": "Anta",
    "yoga": "Atiganda",
    "karana": "Naga",
    "...": "..."
  }
}
```

## Choose your repo

| You want to build | Open |
|---|---|
| Kundli (kundali) app: birth chart, dashas, doshas | [kundli-api](https://github.com/DivineAPI/kundli-api) |
| Kundli matching (gun milan) for a matrimony or wedding app | [kundli-matching-api](https://github.com/DivineAPI/kundli-matching-api) |
| Lal Kitab charts, teva, debts and varshphal | [lal-kitab-api](https://github.com/DivineAPI/lal-kitab-api) |
| Hindu calendar: panchang, muhurat, choghadiya | [panchang-api](https://github.com/DivineAPI/panchang-api) |
| Festival calendar: festival dates by month, sankranti, Tamil and Malayalam calendars | [hindu-festival-api](https://github.com/DivineAPI/hindu-festival-api) |
| Western natal chart: planets, houses, aspects, wheel | [birth-chart-api](https://github.com/DivineAPI/birth-chart-api) |
| Daily, weekly, monthly, yearly horoscopes in 25 languages | [horoscope-api](https://github.com/DivineAPI/horoscope-api) |
| Tarot readings with card images | [tarot-api](https://github.com/DivineAPI/tarot-api) |
| Numerology: core numbers, Lo Shu grid, name and mobile number | [numerology-api](https://github.com/DivineAPI/numerology-api) |
| Typed client instead of raw HTTP | [divineapi-python](https://github.com/DivineAPI/divineapi-python) · [divineapi-node](https://github.com/DivineAPI/divineapi-node) · [divineapi-php](https://github.com/DivineAPI/divineapi-php) |
| Astrology tools inside Claude, Cursor or another AI assistant | [mcp-indian-astrology](https://github.com/DivineAPI/mcp-indian-astrology) · [mcp-western-astrology](https://github.com/DivineAPI/mcp-western-astrology) · [mcp-horoscope-numerology](https://github.com/DivineAPI/mcp-horoscope-numerology) |

## One call per domain

Same auth and body format everywhere. Each of these calls was run live; the repo linked in the last column has full samples and real responses.

| Domain | Endpoint | Host | Key params | Docs | Repo |
|---|---|---|---|---|---|
| Vedic | `/indian-api/v3/basic-astro-details` | `astroapi-3` | birth details (13 fields) | [docs](https://developers.divineapi.com/indian-api/kundli-api/basic-astrological-details) | [kundli-api](https://github.com/DivineAPI/kundli-api) |
| Panchang | `/indian-api/v2/find-panchang` | `astroapi-1` | `day`, `month`, `year`, `lat`, `lon`, `tzone` | [docs](https://developers.divineapi.com/indian-api/daily-panchang-api/find-panchang) | [panchang-api](https://github.com/DivineAPI/panchang-api) |
| Western | `/western-api/v1/planetary-positions` | `astroapi-4` | birth details + `house_system` (`P` = Placidus) | [docs](https://developers.divineapi.com/western-api/natal-astrology/planetary-positions) | [birth-chart-api](https://github.com/DivineAPI/birth-chart-api) |
| Horoscope | `/api/v5/daily-horoscope` | `astroapi-5` | `sign`, `h_day=today`, `day`, `month`, `year`, `tzone` | [docs](https://developers.divineapi.com/horoscope-and-tarot-api/daily-horoscope-prediction) | [horoscope-api](https://github.com/DivineAPI/horoscope-api) |
| Tarot | `/api/v2/daily-tarot` | `astroapi-5` | `api_key` only | [docs](https://developers.divineapi.com/horoscope-and-tarot-api/daily-tarot) | [tarot-api](https://github.com/DivineAPI/tarot-api) |
| Numerology | `/numerology/v1/core-numbers` | `astroapi-4` | `full_name`, `day`, `month`, `year`, `gender`, `method` | [docs](https://developers.divineapi.com/numerology-apis/core-numbers) | [numerology-api](https://github.com/DivineAPI/numerology-api) |

Hosts are `https://<host>.divineapi.com`. Use the host shown for each endpoint in the docs; endpoints are not interchangeable between hosts.

## SDKs

| Language | Install | Repo |
|---|---|---|
| Python | `pip install divineapi` | [divineapi-python](https://github.com/DivineAPI/divineapi-python) |
| Node.js / TypeScript | `npm install divineapi` | [divineapi-node](https://github.com/DivineAPI/divineapi-node) |
| PHP | `composer require divineapi/divineapi` | [divineapi-php](https://github.com/DivineAPI/divineapi-php) |

More in the docs: [SDKs and libraries](https://developers.divineapi.com/sdks-and-libraries).

## MCP servers

Hosted Model Context Protocol servers (streamable HTTP). Authenticate with the `X-Divine-Api-Key` and `X-Divine-Auth-Token` headers.

| Server | URL | Repo |
|---|---|---|
| Indian / Vedic astrology | `https://mcp.divineapi.com/indian/mcp` | [mcp-indian-astrology](https://github.com/DivineAPI/mcp-indian-astrology) |
| Western astrology | `https://mcp.divineapi.com/western/mcp` | [mcp-western-astrology](https://github.com/DivineAPI/mcp-western-astrology) |
| Horoscope, tarot and numerology | `https://mcp.divineapi.com/horoscope/mcp` | [mcp-horoscope-numerology](https://github.com/DivineAPI/mcp-horoscope-numerology) |

Example for Cursor (`.cursor/mcp.json`):

```json
{
  "mcpServers": {
    "divineapi-indian": {
      "url": "https://mcp.divineapi.com/indian/mcp",
      "headers": {
        "X-Divine-Api-Key": "YOUR_API_KEY",
        "X-Divine-Auth-Token": "YOUR_AUTH_TOKEN"
      }
    }
  }
}
```

Setup for Claude Desktop and VS Code: [developers.divineapi.com/mcp](https://developers.divineapi.com/mcp).

## Languages

Set the language with the `lan` form field (default `en`). DivineAPI uses its own language codes, not ISO 639-1: send `ma` for Marathi, `tm` for Tamil and `tl` for Telugu (the ISO codes `mr` and `te` are rejected, and `ta` means Filipino, not Tamil).

| Product | Languages | Codes |
|---|---|---|
| Vedic | 8 Indian languages | `en` English, `hi` Hindi, `bn` Bengali, `ma` Marathi, `tm` Tamil, `tl` Telugu, `ml` Malayalam, `kn` Kannada |
| Western (text reports) | 12 | `en`, `hi`, `ja`, `ru`, `pt`, `es`, `fr`, `de`, `it`, `nl`, `pl`, `tr` |
| Horoscope and tarot | 25, through the translator host `astroapi-5-translator.divineapi.com` | `en`, `hi`, `zh`, `ja`, `ar`, `ru`, `pt`, `es`, `fr`, `de`, `it`, `nl`, `pl`, `tr`, `uk`, `hu`, `gr` Greek, `bn`, `ma`, `tm`, `tl`, `ml`, `kn`, `ta` Filipino, `bah` Indonesian |
| Numerology | English only | `en` |

Translator replies can take 25 to 35 seconds, so set your HTTP timeout to at least 60 seconds for those calls.

## Gotchas

- **Check the body, not only the status.** Hosts `astroapi-1` to `astroapi-5` return HTTP 200 even on errors: `success: 1` is OK, `2` is a validation error, `3` is an auth error (`{"success":3,"msg":"Invalid authorization token!"}`). Hosts `astroapi-7`, `astroapi-8` and `pdf` return real 4xx codes with `status: "error"` and an `error_code`.
- **`tzone` is a decimal offset** (`5.5` for India, `-4` for New York in summer), not `+5:30` and not a zone name. It is not adjusted for daylight saving, so send the offset that applied at the birth moment.
- **`sec` is required** on birth endpoints. Send `0` if the second is unknown.
- **`place` in lowercase** (`new delhi`). `lat` and `lon` drive the calculation.
- **Dates are three fields**: `day`, `month`, `year`.
- **Horoscope periods are keywords**: `h_day=today|tomorrow|yesterday`, and `current|prev|next` for week, month and year.

## Which plan includes this

Each product has its own plans on divineapi.com: **Vedic** (Vedic Sampoorna, Vedic Ananta, Vedic Prakash), **Western** (Western Nova, Western Atlas, Western Lumen), **Horoscope** (Horoscope Starter, Horoscope Pro), **Tarot** (Tarot Basic, Tarot Essentials, Tarot Gold) and **Numerology** (Numerology API), plus single-tool plans and white-label PDF reports. Compare what each plan includes at [divineapi.com/pricing](https://divineapi.com/pricing).

## FAQ

**Is there a free trial?**
Yes, a 14-day free trial (credit card required to activate the trial): [divineapi.com/start-trial](https://divineapi.com/start-trial). Plans and prices are at [divineapi.com/pricing](https://divineapi.com/pricing).

**Which ayanamsa do the Vedic endpoints use?**
Lahiri, fixed. Western endpoints are tropical.

**Which house systems are available for Western charts?**
25 house systems through the `house_system` field; Placidus (`P`) is the default.

**Can I get the chart as an image?**
Yes, as SVG and base64. Western has a natal wheel chart endpoint and Vedic has divisional chart endpoints (D1, D9, D10 and more, north or south style); see the [Western](https://developers.divineapi.com/western-api) and [Indian](https://developers.divineapi.com/indian-api) docs.

**Can I generate branded PDF reports?**
Yes, 125+ white-label PDF report types with your company name, logo and footer. See [real samples](https://reports.divineapi.com/reports) and the [PDF Report API docs](https://developers.divineapi.com/pdf-report-api).

**Is there a Postman collection or OpenAPI spec?**
Postman: [documenter.getpostman.com/view/26759678/2sBYAysU8Y](https://documenter.getpostman.com/view/26759678/2sBYAysU8Y). OpenAPI and the full reference: [developers.divineapi.com](https://developers.divineapi.com).

## Support

- Docs: [developers.divineapi.com](https://developers.divineapi.com)
- Changelog: [developers.divineapi.com/changelog](https://developers.divineapi.com/changelog)
- Status: [status.divineapi.com](https://status.divineapi.com)
- Help center: [support.divineapi.com](https://support.divineapi.com)
- Website: [divineapi.com](https://divineapi.com)

Terms of the API service: [divineapi.com/terms-service](https://divineapi.com/terms-service).

## License

Code samples in this repository are released under the MIT License (see [LICENSE](LICENSE)). The DivineAPI name and logo are trademarks of DivineAPI.
