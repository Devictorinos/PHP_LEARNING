<?php


function myMail($subj, $body, $extra = "")
{
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "Content-Transfer-Encoding:base64 \r\n";
    $headers .= "From: no-reply@yad2.co.il\r\n";
    $headers .= "Reply-To: no-reply@yad2.co.il\r\n";

    mail(
        "gvily@coral-tell.co.il".(!empty($extra) ? ','.$extra : ''),
        '=?UTF-8?B?'.base64_encode(iconv("windows-1255", "utf-8", $subj)).'?=',
        rtrim(chunk_split(base64_encode(iconv("windows-1255", "utf-8", '<!DOCTYPE html>
<html>
    <head>
        <title>ArchiveAllYad2 (jobs/archive_backup_all_yad2.php) Job</title>
        <style>
            * {font-family: arial;}
            span.none {color: #61838B;}
            span.redSpan {font-weight: bold; color: red;}
            span.greenSpan {font-weight: bold; color: green;}
        </style>
    </head>
    <body>
        <table cellspacing="0" cellpadding="0" width="800" style="width: 800px; border: 2px solid #ff6600; border-radius: 10px; font-falimy: arial;">
            <tr>
                <td style="padding: 20px;">
                    '.$body.'
                </td>
                <td valign="top" align="right" style="vertical-align: top; padding: 20px; text-align: right;">
                    <img src="http://images.yad2.co.il/Pic/yad2new/page/yad2_logo.jpg">
                </td>
            </tr>
        </table>
    </body>
</html>')))),
        $headers
    );
} 
