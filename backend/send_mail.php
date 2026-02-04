<?php

header("Content-type: text/html; charset=utf-8");
function send_mail($from, $to, $bccHeader, $subject, $message, $senderName, $replyTo)
{

// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";

// More headers
    $headers .= "From: " . $senderName . " <" . $from . ">\r\n";
    if ($bccHeader != null) {
        $headers .= "Bcc: Marek Cieciura <cieciura.marek@gmail.com>\r\n";
    }
    $headers .= "Reply-TO: " . $replyTo;
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
    $newMessage = preg_replace('$(\s|^)(https?://[a-z0-9_./?=&-]+)(?![^<>]*>)$i', ' <a href="$2" target="_blank">$2</a> ', $newMessage . " ");

    $newMessage = "<html lang='PL/pl'>" .
        "<body>" .
        $newMessage .
        "<br/>" .
        "<br/>" .
        "Pozdrawiam," .
        "<br/>" .
        $senderName .
        "</body>" .
        "</html>";
    return $newMessage;
}

//$adminEmail = "cieciura.marek@gmail.com";
$adminEmail = "pawel.gasieniec@interia.pl";
$adminName = "Marek Cieciura";
$serverEmail = "pawel.gasieniec@interia.pl";
$from = $serverEmail;

$messageType = $_POST["message-type"];
$message = $_POST["message"];

$adminPrettyAddress = $adminName . "<" . $adminEmail . ">";
if ($messageType == "zacheta") {
    $replyTo = $serverEmail;
    $to = $_POST["adres-odbiorcy"];
    $bccHeader = "Bcc: " . $adminPrettyAddress . "\r\n";
    $senderName = $_POST["nadawca"];
    $subject = $_POST["temat-wiadomosci"];
    $senderEmail = null;
} else if ($messageType == "kontakt") {
    $replyTo = $_POST["adres-nadawcy"];
    $to = $adminPrettyAddress;
    $bccHeader = null;
    $senderName = $_POST["nadawca"];
    $subject = "Wiadomość z formularza kontaktowego";
    $message = "Wiadomość od " . $_POST["adres-nadawcy"] . "<br/>" . $message;
    $senderEmail = $_POST["adres-nadawcy"];
} else {
    throw new Exception("Nieznany typ wiadomości: " . $messageType);
}

echo send_mail($from, $to, $bccHeader, $subject, $message, $senderName, $replyTo);
