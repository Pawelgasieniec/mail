<?php

header('Content-type: text/html; charset=utf-8');
function send_mail($to, $subject, $message, $senderName)
{

// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: ' . $senderName . ' <pawelgasieniec@pawelgasieniec.cba.pl>' . "\r\n";
    $headers .= 'Bcc: Marek Cieciura <cieciura.marek@gmail.com>' . "\r\n";
    $formattedMessage = formatMail($message, $senderName);
    mail($to, $subject, $formattedMessage, $headers);
    return "Sukces";
}

function formatMail($message, $senderName)
{
    $newMessage = str_replace("\r\n", "<br/>", $message);
// Source - https://stackoverflow.com/a
// Posted by tormuto
// Retrieved 2026-01-21, License - CC BY-SA 3.0
    $newMessage = preg_replace('$(\s|^)(https?://[a-z0-9_./?=&-]+)(?![^<>]*>)$i', ' <a href="$2" target="_blank">$2</a> ', $newMessage." ");

    $newMessage = "<html lang='PL/pl'>" .
        "<body>" .
        $newMessage .
        "<br/>" .
        "<br/>" .
        "Pozdrawiam," .
        "<br/>" .
        $senderName .
        "</body>" .
        "</html>"
    ;
    return $newMessage;
}
$to = $_POST["adres-odbiorcy"];
$message = $_POST["tresc-maila"];
$subject = $_POST["temat-wiadomosci"];
$senderName = $_POST["nadawca"];

echo send_mail($to, $subject, $message, $senderName);
