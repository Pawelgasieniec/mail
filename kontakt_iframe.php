<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Formularz kontaktowy</title>
    <link href="./css/contact/style.css" rel="stylesheet">
    <link href="./css/contact/white.css" rel="stylesheet">
</head>

<body>

<h1>Formularz kontaktowy</h1>
<form id="message_form">
    <div>
        <label for=nadawca>Imię</label>
        <input form="message_form" name="nadawca" id="nadawca"
               class="form-control"
               placeholder="Imię nadawcy"
               required>

        <label for=adres-nadawcy>Nadawca</label>
        <input form="message_form" name="adres-nadawcy" id="adres-nadawcy"
               placeholder="uzytkownik@domena.pl"
        >

        <label for=message>Treść</label>
        <textarea form="message_form" name="message" id="message"
                  required></textarea>

        <div hidden="hidden">
            <label for=message-type>Treść</label>
            <textarea form="message_form" name="message-type" id="message-type"
                      required>kontakt</textarea>
        </div>

        <div style="clear: both;"></div>
        <input type="submit" class="submit" value="Wyślij"
               id="sendMailButton">
    </div>
</form>

<div class="row" id="successSection"
     style="margin-top: 10px; display: none;">
    <div class="col-xs-12 col-md-4">
        <div class="alert alert-success">e-mail został wysłany.</div>
    </div>
</div>
<div class="row" id="errorSection"
     style="margin-top: 10px; display: none;">
    <div class="col-xs-12 col-md-4">
        <div class="alert alert-danger" id="errorSectionText"></div>
    </div>
</div>
<script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="./send_mail.js"></script>
</body>
