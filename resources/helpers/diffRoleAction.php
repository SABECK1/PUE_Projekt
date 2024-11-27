<?php
// gibt anhand der Rolle des Aktuellen Nutzers den Namen der Route die Verwedet werden soll. Dient dazu, gewisse Routen von Buttons dynamisch anzupassen

function getLinkByUserRole($userRole) {
    switch ($userRole) {
        case '1':
            return 'LehrerMain';
        case '2':
            return 'Personaler';
        case '3':
            return 'Admin';
        default:
            return null;
    }
}

function calculateBewertungColour($value)//Übergabe der zur berechnung benötigten parameter. evnt. Survey mit den fragen und dazugehörigen antworten
{         
    

    //berechnung des Durchschnit wertes jeder frage. Pro frage jeden antwort wert addieren und durch die anzahl gegebener antworten teilen.


    // Farbbedingungen basierend auf dem Ergebnis wert der Antworten
    if (0 <= $value && $value < 33) {
        return 'progress-error';
    } elseif (33 <= $value && $value < 66) {
        return 'progress-warning';
    } else {
        return 'progress-success';
    }
}
