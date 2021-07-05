
#################################
Astrology API - DivineAPI
#################################
Start your FREE Trial to get your API KEY,  `https://divineapi.com <https://divineapi.com>`_

|travis| |Docs| |Maintenance yes| |SayThanks| |Paypal|
    
    
.. image:: https://divineapi.com/assets/images/logo.svg
   :height: 412px
   :width: 898px
   :alt: divineapi logo
   :align: center

What is Astrology API?
==============
Divine API offers developers to integrate the features of Astrology API to their apps and give
their users an enthralling experience to peep into the insights of their present, past and
future.

..
  Feel free to contribute on `Github <http://github.com/divineapi/horoscope-api>`_.




Why Astrology API?
==========
Astrology API designed by the professional team of Divine API is a must have in any website
or app providing astrology services. It retrieves data related to horoscopes of all zodiac signs
and calculates the future predictions using astrology algorithms given by professional
astrologers.

Features
==========

- Astrology API gives user an option to view wide range of day-to-day predictions.
- It offers calculation of horoscopes based on astrology and its analysis.
- User will get to view the information and save it in pdf form for future reference.
- You can get genuine advice from professional astrologers.
- The results are generated through authentic astrology algorithms.


Benefits
==========

- With astrology API, a developer can increase the daily traffic with engaging content.
- It can reveal a person’s several daily life facets such as health profession and so on.
- You will be provided with insights into strengths and weaknesses you possess.


URL
===
.. code-block:: python

    POST: https://divineapi.com/api/1.0/get_daily_horoscope.php


Parameters
==========

api_key : 
   Your API  KEY.
   
   
sign : 
   Name of the sign.

   List of all signs - aries, taurus, gemini, cancer, leo, virgo, libra, scorpio, sagittarius, capricorn, aquarius and pisces.


date : 
   Current Date in Y-m-d Format (Ex: 2020-12-25)
   
   Date can be today,tomorrow or yesterday


Result Example:
=====
.. code-block:: text

    {
        "success": 1,
        "message": "Prediction data.",
        "data": {
            "sign": "ARIES",
            "prediction": {
                "personal": "Personal Life",
                "health": "Health",
                "profession": "Profession",
                "emotions": "Emotions",
                "travel": "Travel",
                "luck": [
                    "Colors of the day – Green, Pink",
                    "Lucky Numbers of the day – 5, 9",
                    "Lucky Alphabets you will be in sync with – B, D",
                    "Cosmic Tip – Opinions do not define you.",
                    "Tips for singles – Take pride in being perfectly imperfect. ",
                    "Tips for couples – It is already yours, try to maintain that."
                ]
            }
        }
    }


Example 
=======
The following example is for sun sign aries - 


cURL
^^^^
.. code-block:: curl

    curl -d "api_key=YOUR_API_KEY&date=YYYY-MM-DD&sign=aries" -X POST https://divineapi.com/api/1.0/get_daily_horoscope.php


Python
^^^^^^
.. code-block:: python

   import requests
   from requests.structures import CaseInsensitiveDict

   url = "https://divineapi.com/api/1.0/get_daily_horoscope.php"

   headers = CaseInsensitiveDict()
   headers["Content-Type"] = "application/x-www-form-urlencoded"

   data = "api_key=YOUR_API_KEY&date=YYYY-MM-DD&sign=aries"


   resp = requests.post(url, headers=headers, data=data)

   print(resp.status_code)


Javascript
^^^^^^^
.. code-block:: javascript

   var url = "https://divineapi.com/api/1.0/get_daily_horoscope.php";

   var xhr = new XMLHttpRequest();
   xhr.open("POST", url);

   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

   xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
         console.log(xhr.status);
         console.log(xhr.responseText);
      }};

   var data = "api_key=YOUR_API_KEY&date=YYYY-MM-DD&sign=aries";

   xhr.send(data);


PHP
^^^
.. code-block:: php

   <?php
    $url = "https://divineapi.com/api/1.0/get_daily_horoscope.php";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
       "Content-Type: application/x-www-form-urlencoded",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = "api_key=YOUR_API_KEY&date=YYYY-MM-DD&sign=aries";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $resp = curl_exec($curl);
    curl_close($curl);
    var_dump($resp);
   ?>
    
    
jQuery Ajax
^^^^^^
.. code-block:: javascript

    $.ajax({
   type:'POST',
   url:'https://divineapi.com/api/1.0/get_daily_horoscope.php',
   data: {api_key:'YOUR_API_KEY', date: 'YYYY-MM-DD', sign:'aries'},
   success:function(data){
   console.log(data);
   }
    });


ECMAScript (ES6)
^^^^^^
.. code-block:: javascript

    const URL = 'https://divineapi.com/api/1.0/get_daily_horoscope.php?api_key=YOUR_API_KEY&sign=aries&day=YYYY-MM-DD';
    fetch(URL, {
        method: 'POST'
    })
    .then(response => response.json())
    .then(json => {
        const date = json.current_date;
        console.log(date);
    });


License
=======

2021 Divine API

Licensed under the Apache License, Version 2.0 (the "License");

    http://www.apache.org/licenses/LICENSE-2.0



Contact
=======

Questions? Suggestions? Feel free to contact me at admin@divineapi.com


Credits
=======

"DivineAPI" was created by `Azhar <https://azhar-spiderdev.github.io/>`_

Source of horoscope updates - http://divineapi.com/horoscope-api/

Please feel free to use and adapt this awesome API.

    
.. |Docs| image:: https://readthedocs.org/projects/aztro/badge/?version=latest
    :target: https://azhar-spiderdev.github.io/
    
.. |Maintenance yes| image:: https://img.shields.io/badge/Maintained%3F-yes-green.svg
   :target: https://azhar-spiderdev.github.io/


.. |Travis| image:: https://travis-ci.org/sameerkumar18/aztro.svg?branch=master
    :target: https://azhar-spiderdev.github.io/

.. |SayThanks| image:: https://img.shields.io/badge/Say%20Thanks-!-1EAEDB.svg
    :target: https://azhar-spiderdev.github.io/

.. |Paypal| image:: https://img.shields.io/badge/Paypal-Donate-blue.svg
    :target: https://azhar-spiderdev.github.io/

.. Indices and tables
.. ==================

.. * :ref:`genindex`
.. * :ref:`modindex`
.. * :ref:`search`
