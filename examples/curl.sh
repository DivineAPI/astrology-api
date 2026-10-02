#!/usr/bin/env bash
# DivineAPI example: Vedic basic astro details (moon sign, nakshatra, tithi) for a birth date, time and place.
# Docs: https://developers.divineapi.com/indian-api/kundli-api/basic-astrological-details
# Run:  export DIVINEAPI_API_KEY=... DIVINEAPI_AUTH_TOKEN=...   then   bash curl.sh
set -euo pipefail

API_KEY="${DIVINEAPI_API_KEY:?Set DIVINEAPI_API_KEY (see .env.example)}"
AUTH_TOKEN="${DIVINEAPI_AUTH_TOKEN:?Set DIVINEAPI_AUTH_TOKEN (see .env.example)}"

response=$(curl -s -X POST "https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details" \
  -H "Authorization: Bearer ${AUTH_TOKEN}" \
  -F "api_key=${API_KEY}" \
  -F "full_name=Rahul Kumar" \
  -F "gender=male" \
  -F "day=24" \
  -F "month=05" \
  -F "year=1990" \
  -F "hour=14" \
  -F "min=40" \
  -F "sec=0" \
  -F "place=new delhi" \
  -F "lat=28.6139" \
  -F "lon=77.2090" \
  -F "tzone=5.5" \
  -F "lan=en")

# Legacy hosts answer HTTP 200 even on errors: check "success" in the body (1 = OK).
if ! printf '%s' "$response" | grep -Eq '"success": ?1[,}]'; then
  echo "API error: $response" >&2
  exit 1
fi

if command -v jq >/dev/null 2>&1; then
  printf '%s' "$response" | jq .
else
  printf '%s\n' "$response"
fi
