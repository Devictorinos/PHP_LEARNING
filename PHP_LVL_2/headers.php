<?php

/*header('Location: http://site.com');// STATUS 302 - resours Temporary moved to another location
exit();

header('HTTP/1.1 301 Moved Permanently'); // STATUS 301 - resours moved Forever to another location
header('Location: http://site.com'); // STATUS 301
exit();

header('Location: http://site.com', true, 301);// STATUS 301 -  same as to header - resours moved Forever to another location
exit();

header('Refresh: 3');// refresh page after 3 seconds

header('Refresh: 3;url=http://site.com');//redirect to website after 3 sec

header('Content-Type: text/html;charset=utf-8');

//header('Content-Type: text/plain');
/* mean that file is text and onclick on him it will be opened with text editor to read  */
/*header('Content-type: file/octet-stream');
header('Content-Disposition: attachment; file="myfile.txt"');


/* cacheng page to specific time */
/*header('Expires: '.date("r", time() + 3600).'');*/



if (!isset($_SERVER['PHP_AUTH_USER'])) {

    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HHTP/1.0 401 Unauthorized');
    echo 'wrong';
    exit();
} else {
    echo 'hello' . $_SERVER['PHP_AUTH_USER'];
    echo 'you entered PASSWORD ' . $_SERVER['PHP_AUTH_PW'];
}



function movePage($num,$url){
   static $http = array (
       100 => "HTTP/1.1 100 Continue",
       101 => "HTTP/1.1 101 Switching Protocols",
       200 => "HTTP/1.1 200 OK",
       201 => "HTTP/1.1 201 Created",
       202 => "HTTP/1.1 202 Accepted",
       203 => "HTTP/1.1 203 Non-Authoritative Information",
       204 => "HTTP/1.1 204 No Content",
       205 => "HTTP/1.1 205 Reset Content",
       206 => "HTTP/1.1 206 Partial Content",
       300 => "HTTP/1.1 300 Multiple Choices",
       301 => "HTTP/1.1 301 Moved Permanently",
       302 => "HTTP/1.1 302 Found",
       303 => "HTTP/1.1 303 See Other",
       304 => "HTTP/1.1 304 Not Modified",
       305 => "HTTP/1.1 305 Use Proxy",
       307 => "HTTP/1.1 307 Temporary Redirect",
       400 => "HTTP/1.1 400 Bad Request",
       401 => "HTTP/1.1 401 Unauthorized",
       402 => "HTTP/1.1 402 Payment Required",
       403 => "HTTP/1.1 403 Forbidden",
       404 => "HTTP/1.1 404 Not Found",
       405 => "HTTP/1.1 405 Method Not Allowed",
       406 => "HTTP/1.1 406 Not Acceptable",
       407 => "HTTP/1.1 407 Proxy Authentication Required",
       408 => "HTTP/1.1 408 Request Time-out",
       409 => "HTTP/1.1 409 Conflict",
       410 => "HTTP/1.1 410 Gone",
       411 => "HTTP/1.1 411 Length Required",
       412 => "HTTP/1.1 412 Precondition Failed",
       413 => "HTTP/1.1 413 Request Entity Too Large",
       414 => "HTTP/1.1 414 Request-URI Too Large",
       415 => "HTTP/1.1 415 Unsupported Media Type",
       416 => "HTTP/1.1 416 Requested range not satisfiable",
       417 => "HTTP/1.1 417 Expectation Failed",
       500 => "HTTP/1.1 500 Internal Server Error",
       501 => "HTTP/1.1 501 Not Implemented",
       502 => "HTTP/1.1 502 Bad Gateway",
       503 => "HTTP/1.1 503 Service Unavailable",
       504 => "HTTP/1.1 504 Gateway Time-out"
   );
   header($http[$num]);
   header ("Location: $url");
}
}
