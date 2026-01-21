<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Zaproszenie</title>
    <link
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
            rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!--    <link rel="icon" type="image/png" href="favicon.png" />-->
</head>

<body>
<div class="half">
    <h1>Wysyłanie zachęty</h1>
    <form id="sendMailForm">

        <label for=nadawca>Nadawca</label>
        <textarea form="sendMailForm" name="nadawca" id="nadawca"
                  class="form-control"
                  placeholder="Imię nadawcy"
                  cols="40" rows="1"
                  required></textarea>

        <label for=adres-odbiorcy>Adres odbiorcy</label>
        <textarea form="sendMailForm" name="adres-odbiorcy" id="adres-odbiorcy"
                  class="form-control"
                  placeholder="uzytkownik@domena.pl"
                  cols="40" rows="1"></textarea>


        <label for=temat-wiadomosci>Temat wiadomości</label>
        <textarea form="sendMailForm" name="temat-wiadomosci" id="temat-wiadomosci"
                  class="form-control"
                  cols="40" rows="1"
                  required></textarea>


        <label for=tresc-maila>Treść wiadomości</label>
        <textarea form="sendMailForm" name="tresc-maila" id="tresc-maila"
                  class="form-control"
                  cols="40" rows="15"
                  required
        ></textarea>

        <input type="submit" class="btn btn-primary" value="WYŚLIJ"
               id="sendMailButton">
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
</div>
</body>
