"""DivineAPI example: Vedic basic astro details (moon sign, nakshatra, tithi) for a birth date, time and place.

Docs: https://developers.divineapi.com/indian-api/kundli-api/basic-astrological-details
Run:  pip install requests
      export DIVINEAPI_API_KEY=... DIVINEAPI_AUTH_TOKEN=...
      python quickstart.py
"""
import os
import sys

import requests

URL = "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details"
API_KEY = os.environ.get("DIVINEAPI_API_KEY")
AUTH_TOKEN = os.environ.get("DIVINEAPI_AUTH_TOKEN")
if not API_KEY or not AUTH_TOKEN:
    sys.exit("Set DIVINEAPI_API_KEY and DIVINEAPI_AUTH_TOKEN (see .env.example)")

fields = {
    "api_key": API_KEY,
    "full_name": "Rahul Kumar",
    "gender": "male",
    "day": "24",
    "month": "05",
    "year": "1990",
    "hour": "14",
    "min": "40",
    "sec": "0",
    "place": "new delhi",
    "lat": "28.6139",
    "lon": "77.2090",
    "tzone": "5.5",
    "lan": "en",
}

# files= sends multipart/form-data, which every DivineAPI endpoint expects
resp = requests.post(
    URL,
    headers={"Authorization": f"Bearer {AUTH_TOKEN}"},
    files={k: (None, v) for k, v in fields.items()},
    timeout=60,
)
body = resp.json()
if body.get("success") != 1:  # legacy hosts return HTTP 200 even on errors
    sys.exit(f"API error: {body.get('msg', body)}")

d = body["data"]
print("Moon sign:", d["moonsign"])
print("Nakshatra:", d["nakshatra"])
print("Tithi:", d["paksha"], d["tithi"])
