$(document).ready(function() {
    $('#sendMailForm').submit(function(event) {
        event.preventDefault();
        console.log("Wysyłanie maila");
        setElementVisibility('successSection', false);
        setElementVisibility('errorSection', false);

        var $form = $(this);
        var serializedData = $form.serialize();
        // console.log(serializedData);
        $.ajax({
            type: 'POST',
            url: 'backend/send_mail.php',
            data: serializedData,
        })
            .done(function(data) {
                console.log(data);
                if (data.success) {

                }
                setElementVisibility('successSection', true);

            })
            .fail(function(data) {
                showError("Próba wysłania wiadomości zakończyła się błędem! Błąd:" + data);
            });
        return false;

    });
});

function toggleElementVisibility(elementId) {
    var x = document.getElementById(elementId);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function setElementVisibility(elementId, visible) {
    document.getElementById(elementId).style.display = visible ? 'block' : 'none';
}

function showError($message){
    console.log($message);
    alert($message);
    setElementVisibility('errorSection', true);
    $('#errorSection').text($message);
}

function error(err) {
    console.error(`ERROR(${err.code}): ${err.message}`);
}

let $trescMaila = `Zachęcam do odwiedzenia strony https://cieciura.net/to.html oraz proponuję obejrzenie lub wykorzystanie widżetów:
▪︎ Licznik odsłon
▪︎ Trasa do grobu
▪︎ Formularz kontaktowy
▪︎ Krzyżówka
▪︎ Księga gości
▪︎ Sonda
▪︎ Powiadom znajomego
dostępnych w zakładce DODATKI.
Proponuję też zachęcenie swoich znajomych z wykorzystaniem ostatniego widżeta. `

$tematWiadomosci = 'Zachęcam do odwiedzenia strony https://cieciura.net/to.html';
$('#tresc-maila').text($trescMaila);
$('#temat-wiadomosci').text($tematWiadomosci);