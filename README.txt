Wie funktioniert es?
***************
1. XAMPP von https://www.apachefriends.org/de/index.html herunterladen und installieren.
2. Apache und MySQL über das Control Panel starten
3. Im Webbrowser über localhost/xampp XAMPP aufrufen
4. Unter Tools nach PHPMyAdmin wechseln
5. Unter D:\xamp\phpMyAdmin\config.inc diese unter verändern:
	$cfg['Servers'][$i]['user'] = 'root';
	$cfg['Servers'][$i]['password'] = 'vthblumen';
6. SQL-Datei in "storescripts" Dateiordner zum PHPMyAdmin importieren.
7. Die ganze Website in C:/xampp/htdocs hinlegen
8. Geht zum http://localhost/index.php



ACHTUNG: ERROR "Port 80 in use by "Unable to open process" with PID 4!"
1. Control Panel => Config => Service and Port Settings
2. In "Apache", setzen Sie "Main Port" zum 81



Admin Site:
*******
http://localhost/storeadmin/admin_login.php

oder http://localhost:81/storeadmin/admin_login.php		(81: Nummer der Port von Apache)

Benutzername: vth
Passwort: vthblumen

Author:
*******

Vu Thu Huong <vuthuhuonghanoi@gmail.com>


ENJOY YOUR STAY~