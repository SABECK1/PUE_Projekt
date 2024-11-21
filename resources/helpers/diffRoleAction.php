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
