# php-json-bender

Simple library to convert json strings to php array declarations.

# Table of Contents

- [Installation](#installation)
- [Example](#Example)

## Installation

```sh
composer require kristijorgji/php-json-bender
```

## Example

Run in the console:
```sh
vendor/bin/phpJsonBender /srv/input/test.json /srv/output/test.php
```

First argument is the real path of the input json.

Second argument is the real path of the desired output.

In my example the content of the input file was as follows: 
```json
[{
  "created_at": "Thu Jun 22 21:00:00 +0000 2017",
  "id": 877994604561387500,
  "id_str": "877994604561387520",
  "text": "Creating a Grocery List Manager Using Angular, Part 1: Add &amp; Display Items https://t.co/xFox78juL1 #Angular",
  "truncated": false,
  "entities": {
    "hashtags": [{
      "text": "Angular",
      "indices": [103, 111]
    }],
    "symbols": [],
    "user_mentions": [],
    "urls": [{
      "url": "https://t.co/xFox78juL1",
      "expanded_url": "http://buff.ly/2sr60pf",
      "display_url": "buff.ly/2sr60pf",
      "indices": [79, 102]
    }]
  },
  "source": "<a href=\"http://bufferapp.com\" rel=\"nofollow\">Buffer</a>",
  "user": {
    "id": 772682964,
    "id_str": "772682964",
    "name": "SitePoint JavaScript",
    "screen_name": "SitePointJS",
    "location": "Melbourne, Australia",
    "description": "Keep up with JavaScript tutorials, tips, tricks and articles at SitePoint.",
    "url": "http://t.co/cCH13gqeUK",
    "entities": {
      "url": {
        "urls": [{
          "url": "http://t.co/cCH13gqeUK",
          "expanded_url": "http://sitepoint.com/javascript",
          "display_url": "sitepoint.com/javascript",
          "indices": [0, 22]
        }]
      },
      "description": {
        "urls": []
      }
    },
    "protected": false,
    "followers_count": 2145,
    "friends_count": 18,
    "listed_count": 328,
    "created_at": "Wed Aug 22 02:06:33 +0000 2012",
    "favourites_count": 57,
    "utc_offset": 43200,
    "time_zone": "Wellington"
  }
}]
```

The generated output php file at /srv/output/test.php is as follows:

```php
<?php
$array = [
    '0' => [
        'created_at' => 'Thu Jun 22 21:00:00 +0000 2017',
        'id' => 877994604561387500,
        'id_str' => '877994604561387520',
        'text' => 'Creating a Grocery List Manager Using Angular, Part 1: Add &amp; Display Items https://t.co/xFox78juL1 #Angular',
        'truncated' => false,
        'entities' => [
            'hashtags' => [
                '0' => [
                    'text' => 'Angular',
                    'indices' => [
                        '0' => 103,
                        '1' => 111,
                    ],
                ],
            ],
            'symbols' => [],
            'user_mentions' => [],
            'urls' => [
                '0' => [
                    'url' => 'https://t.co/xFox78juL1',
                    'expanded_url' => 'http://buff.ly/2sr60pf',
                    'display_url' => 'buff.ly/2sr60pf',
                    'indices' => [
                        '0' => 79,
                        '1' => 102,
                    ],
                ],
            ],
        ],
        'source' => '<a href="http://bufferapp.com" rel="nofollow">Buffer</a>',
        'user' => [
            'id' => 772682964,
            'id_str' => '772682964',
            'name' => 'SitePoint JavaScript',
            'screen_name' => 'SitePointJS',
            'location' => 'Melbourne, Australia',
            'description' => 'Keep up with JavaScript tutorials, tips, tricks and articles at SitePoint.',
            'url' => 'http://t.co/cCH13gqeUK',
            'entities' => [
                'url' => [
                    'urls' => [
                        '0' => [
                            'url' => 'http://t.co/cCH13gqeUK',
                            'expanded_url' => 'http://sitepoint.com/javascript',
                            'display_url' => 'sitepoint.com/javascript',
                            'indices' => [
                                '0' => 0,
                                '1' => 22,
                            ],
                        ],
                    ],
                ],
                'description' => [
                    'urls' => [],
                ],
            ],
            'protected' => false,
            'followers_count' => 2145,
            'friends_count' => 18,
            'listed_count' => 328,
            'created_at' => 'Wed Aug 22 02:06:33 +0000 2012',
            'favourites_count' => 57,
            'utc_offset' => 43200,
            'time_zone' => 'Wellington',
        ],
    ],
];
```

## License

php-json-bender is released under the MIT Licence. See the bundled LICENSE file for details.







