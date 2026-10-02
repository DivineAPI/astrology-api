# Examples

Runnable samples for the Vedic basic astro details (moon sign, nakshatra, tithi) for a birth date, time and place.

Endpoint: `POST https://astroapi-3.divineapi.com/indian-api/v3/basic-astro-details` ([docs](https://developers.divineapi.com/indian-api/kundli-api/basic-astrological-details))

| File | Language | Needs |
|---|---|---|
| `curl.sh` | Bash + curl | curl (jq optional, for pretty output) |
| `quickstart.py` | Python | Python 3.8+, `pip install requests` |
| `quickstart.mjs` | Node.js | Node 18+ (built-in `fetch` and `FormData`) |
| `quickstart.php` | PHP | PHP 8.1+ with the curl extension |

## 1. Set your credentials

Start the [14-day free trial](https://divineapi.com/start-trial) (credit card required to activate the trial) and copy your **API key** and **auth token** from the dashboard. Every script reads them from two environment variables:

```bash
cp .env.example .env        # then fill in both values
set -a; source .env; set +a # load them into this shell (macOS, Linux, Git Bash)
```

On Windows PowerShell:

```powershell
$env:DIVINEAPI_API_KEY = "your api key"
$env:DIVINEAPI_AUTH_TOKEN = "your auth token"
```

Never commit `.env`; it holds your credentials.

## 2. Run a sample

```bash
bash curl.sh
python quickstart.py
node quickstart.mjs            # or: node --env-file=.env quickstart.mjs (Node 20.6+)
php quickstart.php
```

Each script sends a `POST` with `multipart/form-data`, the auth token as a `Bearer` header and the API key as the `api_key` form field, checks `success` in the body (`1` = OK; this host answers HTTP 200 even on errors, with the reason in `msg`) and prints a short result.

See the [main README](../README.md) for the full endpoint list, parameters and a real response.
