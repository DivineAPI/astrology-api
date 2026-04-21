# Astrology API, DivineAPI

> The most comprehensive **Astrology API** for developers, 200+ REST endpoints covering Vedic astrology, Western astrology, horoscopes, kundli, tarot and numerology. One API key, global coverage, 25 languages.

[![Get API Key](https://img.shields.io/badge/Get%20API%20Key-cb22e6?style=for-the-badge&logoColor=white)](https://divineapi.com/register)
[![Live Docs](https://img.shields.io/badge/Live%20Docs-4F46E5?style=for-the-badge&logoColor=white)](https://developers.divineapi.com)
[![API Status](https://img.shields.io/badge/API%20Status-10b981?style=for-the-badge&logoColor=white)](https://status.divineapi.com)
[![14-Day Free Trial](https://img.shields.io/badge/14--Day%20Free%20Trial-039BE5?style=for-the-badge&logoColor=white)](https://divineapi.com/register)
[![Postman](https://img.shields.io/badge/Run%20in%20Postman-FF6C37?style=for-the-badge&logoColor=white)](https://documenter.getpostman.com/view/26759678/2sBXitCnDX)

<p align="center">
  <img src="https://developers.divineapi.com/public/assets/web/images/divineIcon.svg" alt="DivineAPI, Astrology API for developers" width="120" />
</p>

---

## What is the Astrology API?

The **Astrology API** by DivineAPI lets developers integrate astrology, horoscope, tarot and numerology features into any web or mobile application through a simple REST interface. One API key unlocks **200+ endpoints** spanning Vedic, Western, KP and Jaimini systems, with global city/lat-long support and 25-language output.

Built for developers who need a **production-grade astrology api** without maintaining ephemeris tables, astronomical libraries, or translation pipelines themselves.

## Why choose DivineAPI's Astrology API?

- **200+ REST endpoints** covering Vedic astrology, Western astrology, KP system, Jaimini, numerology, tarot, matching, and PDF reports
- **Global coverage**: any city, any latitude/longitude, any timezone
- **25-language output**: English, Hindi, Spanish, French, Arabic, Chinese, and more
- **No SDK lock-in**: plain JSON over HTTPS, works with every language
- **Live status page**: 99.9% uptime monitored at [status.divineapi.com](https://status.divineapi.com)
- **Postman collection** included: import and run in seconds

## Features

- Daily, weekly, monthly and yearly horoscopes for all 12 zodiac signs
- Kundli generation and full birth-chart analysis
- Planetary positions, transits and retrograde tracking
- Match-making (Ashtakoot, Manglik, Dashakoot, composite friendship)
- Tarot, numerology, palmistry and Chinese astrology
- Panchang, festivals, auspicious timings (muhurat) and choghadiya
- PDF report generation (Kundali, Match-making, Natal, Vedic 5/10/15-year)
- Synastry, transits, progressions and lunar events

## API categories

| Category | Endpoints | Docs |
|---|---|---|
| Horoscope & Tarot API | 29 endpoints | [/horoscope-and-tarot-api](https://developers.divineapi.com/horoscope-and-tarot-api) |
| Indian (Vedic) Astrology API | 60+ endpoints | [/indian-astrology-api](https://developers.divineapi.com/indian-astrology-api) |
| Western Astrology API | 50+ endpoints | [/western-astrology-api](https://developers.divineapi.com/western-astrology-api) |
| Numerology API | 25 endpoints | [/numerology-api](https://developers.divineapi.com/numerology-api) |
| Match-making & Compatibility | 15+ endpoints | [/indian-astrology-api](https://developers.divineapi.com/indian-astrology-api) |
| PDF Reports | 15 endpoints | [/pdf-reports](https://developers.divineapi.com/pdf-reports) |

Full reference, request/response samples, and live "try-it" console → **[developers.divineapi.com](https://developers.divineapi.com)**

---

## Quick start

1. **Get your API key** → [divineapi.com/register](https://divineapi.com/register) (14-day free trial, no credit card)
2. **Make your first call** - see the flagship endpoint below
3. **Browse the full catalog** → [developers.divineapi.com](https://developers.divineapi.com)

---

## Flagship endpoint: Planetary Positions

```http
POST https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions
```

Authenticate with a Bearer token in the `Authorization` header **and** pass `api_key` in the request body (both required).

### Request body

| Parameter | Type | Required | Description | Example |
|---|---|:---:|---|---|
| `api_key` | string | ✓ | Your DivineAPI key | `YOUR_API_KEY` |
| `full_name` | string | ✓ | Person's full name | `Rahul Kumar` |
| `day` | integer | ✓ | Date of birth (day) | `24` |
| `month` | integer | ✓ | Month of birth | `5` |
| `year` | integer | ✓ | Year of birth | `2023` |
| `hour` | integer | ✓ | Birth hour (24-h clock) | `14` |
| `min` | integer | ✓ | Birth minute | `40` |
| `sec` | integer | ✓ | Birth second | `43` |
| `gender` | string | ✓ | Gender | `male` |
| `place` | string | ✓ | Place of birth | `New Delhi` |
| `lat` | float | ✓ | Latitude | `28.7041` |
| `lon` | float | ✓ | Longitude | `77.1025` |
| `tzone` | float | ✓ | Timezone offset from UTC | `5.5` |
| `lan` | string |, | Language code (default `en`) | `en` |
| `node_type` | string |, | `truenode` or `meannode` (default) | `meannode` |

Full docs → **[developers.divineapi.com/indian-astrology-api/planetary-positions-kundli](https://developers.divineapi.com/indian-astrology-api/planetary-positions-kundli)**

### Sample response

```json
{
  "success": 1,
  "data": {
    "date": "2025-07-23",
    "time": "03:45:00",
    "latitude": "43.083714",
    "longitude": "-79.065147",
    "timezone": "-4",
    "planets": [
      {
        "name": "Sun",
        "full_degree": "96.5115748",
        "speed": "0.9552920",
        "is_retro": "false",
        "is_combusted": "false",
        "longitude": "6:30:41",
        "sign": "Cancer",
        "sign_no": 4,
        "rashi_lord": "Moon",
        "nakshatra": "Pushya",
        "nakshatra_pada": 1,
        "nakshatra_no": 8,
        "nakshatra_lord": "Saturn",
        "sub_lord": "Mercury",
        "awastha": "Vriddha",
        "karakamsha": "Dara",
        "house": 2,
        "type": "malefic",
        "lord_of": "Third House",
        "image": "https://divineapi.com/public/api-assets/assets/images/planets/Sun.png"
      }
      // ... Moon, Mercury, Venus, Mars, Jupiter, Saturn, Rahu, Ketu (same shape)
    ],
    "ascendant": { "/* ascendant details, sign, degree, nakshatra, etc. */": "" }
  }
}
```

---

## Code examples

### cURL

```bash
curl -X POST "https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions" \
  -H "Authorization: Bearer YOUR_API_KEY" \
  -H "Content-Type: application/x-www-form-urlencoded" \
  --data-urlencode "api_key=YOUR_API_KEY" \
  --data-urlencode "full_name=Rahul Kumar" \
  --data-urlencode "day=24" \
  --data-urlencode "month=5" \
  --data-urlencode "year=2023" \
  --data-urlencode "hour=14" \
  --data-urlencode "min=40" \
  --data-urlencode "sec=43" \
  --data-urlencode "gender=male" \
  --data-urlencode "place=New Delhi" \
  --data-urlencode "lat=28.7041" \
  --data-urlencode "lon=77.1025" \
  --data-urlencode "tzone=5.5"
```

### Python (requests)

```python
import requests

url = "https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions"

headers = {
    "Authorization": "Bearer YOUR_API_KEY",
    "Content-Type": "application/x-www-form-urlencoded",
}

payload = {
    "api_key":   "YOUR_API_KEY",
    "full_name": "Rahul Kumar",
    "day":       24,
    "month":     5,
    "year":      2023,
    "hour":      14,
    "min":       40,
    "sec":       43,
    "gender":    "male",
    "place":     "New Delhi",
    "lat":       28.7041,
    "lon":       77.1025,
    "tzone":     5.5,
}

response = requests.post(url, headers=headers, data=payload)
print(response.json())
```

### JavaScript (browser, fetch)

```javascript
const url = "https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions";

const body = new URLSearchParams({
  api_key:   "YOUR_API_KEY",
  full_name: "Rahul Kumar",
  day:   24, month: 5,  year:  2023,
  hour:  14, min:   40, sec:   43,
  gender: "male", place: "New Delhi",
  lat:  28.7041, lon: 77.1025, tzone: 5.5,
});

const response = await fetch(url, {
  method: "POST",
  headers: {
    "Authorization": "Bearer YOUR_API_KEY",
    "Content-Type":  "application/x-www-form-urlencoded",
  },
  body,
});

const data = await response.json();
console.log(data);
```

### Node.js (fetch, Node 18+)

```javascript
// Node.js 18+ ships with fetch built-in, no dependencies needed.

async function getPlanetaryPositions() {
  const url = "https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions";

  const body = new URLSearchParams({
    api_key:   "YOUR_API_KEY",
    full_name: "Rahul Kumar",
    day:   24, month: 5,  year:  2023,
    hour:  14, min:   40, sec:   43,
    gender: "male", place: "New Delhi",
    lat:  28.7041, lon: 77.1025, tzone: 5.5,
  });

  const res = await fetch(url, {
    method: "POST",
    headers: {
      "Authorization": "Bearer YOUR_API_KEY",
      "Content-Type":  "application/x-www-form-urlencoded",
    },
    body,
  });

  const data = await res.json();
  console.log(data);
}

getPlanetaryPositions();
```

### PHP (curl)

```php
<?php
$url = "https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions";

$payload = http_build_query([
    "api_key"   => "YOUR_API_KEY",
    "full_name" => "Rahul Kumar",
    "day"       => 24,
    "month"     => 5,
    "year"      => 2023,
    "hour"      => 14,
    "min"       => 40,
    "sec"       => 43,
    "gender"    => "male",
    "place"     => "New Delhi",
    "lat"       => 28.7041,
    "lon"       => 77.1025,
    "tzone"     => 5.5,
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer YOUR_API_KEY",
    "Content-Type: application/x-www-form-urlencoded",
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
```

### Go (net/http)

```go
package main

import (
    "fmt"
    "io"
    "net/http"
    "net/url"
    "strings"
)

func main() {
    endpoint := "https://astroapi-3.divineapi.com/indian-api/v2/planetary-positions"

    form := url.Values{}
    form.Set("api_key",   "YOUR_API_KEY")
    form.Set("full_name", "Rahul Kumar")
    form.Set("day",       "24")
    form.Set("month",     "5")
    form.Set("year",      "2023")
    form.Set("hour",      "14")
    form.Set("min",       "40")
    form.Set("sec",       "43")
    form.Set("gender",    "male")
    form.Set("place",     "New Delhi")
    form.Set("lat",       "28.7041")
    form.Set("lon",       "77.1025")
    form.Set("tzone",     "5.5")

    req, _ := http.NewRequest("POST", endpoint, strings.NewReader(form.Encode()))
    req.Header.Set("Authorization", "Bearer YOUR_API_KEY")
    req.Header.Set("Content-Type",  "application/x-www-form-urlencoded")

    resp, err := http.DefaultClient.Do(req)
    if err != nil {
        panic(err)
    }
    defer resp.Body.Close()

    body, _ := io.ReadAll(resp.Body)
    fmt.Println(string(body))
}
```

---

## Other APIs by DivineAPI

[![Horoscope API](https://img.shields.io/badge/Horoscope%20API-cb22e6?style=for-the-badge&logoColor=white)](https://github.com/DivineAPI/horoscope-api)
[![Daily Tarot](https://img.shields.io/badge/Daily%20Tarot-cb22e6?style=for-the-badge&logoColor=white)](https://github.com/DivineAPI/daily-tarot)
[![Yes or No Tarot](https://img.shields.io/badge/Yes%20or%20No%20Tarot-cb22e6?style=for-the-badge&logoColor=white)](https://github.com/DivineAPI/yes-or-no-tarot)
[![Fortune Cookie](https://img.shields.io/badge/Fortune%20Cookie-cb22e6?style=for-the-badge&logoColor=white)](https://github.com/DivineAPI/fortune-cookie)
[![Coffee Cup Reading](https://img.shields.io/badge/Coffee%20Cup%20Reading-cb22e6?style=for-the-badge&logoColor=white)](https://github.com/DivineAPI/coffee-cup-reading)

---

## Resources

- **Full documentation** → [developers.divineapi.com](https://developers.divineapi.com)
- **API status** → [status.divineapi.com](https://status.divineapi.com)
- **Postman collection** → [Run in Postman](https://documenter.getpostman.com/view/26759678/2sBXitCnDX)
- **Changelog** → [developers.divineapi.com/changelog](https://developers.divineapi.com/changelog)
- **Support** → [admin@divineapi.com](mailto:admin@divineapi.com)

---

## License & Usage

Code samples on this page are free to copy into your own projects, no attribution required. Marketing copy, logos, and the **DivineAPI** name are © 2026 DivineAPI, all rights reserved.

For the terms that govern the API service itself, see [divineapi.com/terms](https://divineapi.com/terms).

## Contact

Questions, feature requests or partnership enquiries → **[admin@divineapi.com](mailto:admin@divineapi.com)**
