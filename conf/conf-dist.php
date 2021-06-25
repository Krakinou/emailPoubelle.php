<?php

//-----------------------------------------------------------
// emailPoubelle config
// Licence : GNU GPL v3 : http://www.gnu.org/licenses/gpl.html
// Créateur : David Mercereau - david [aro] mercereau [.] info
// Home : http://poubelle.zici.fr
//----------------------------------------------------------- 

// writable for script
define('DATA', '../var');
// include directory
define('INC', '../lib');
define('URLINC', './lib'); // or http://mondomaine.tld/lib
define('LANG', '../lang');

// include function
include_once(INC.'/ep_function.php');
include_once(INC.'/ep_header.php');

define('DEBUG', false);

// Domain email (separe with ; exemple : exemple.com;zici.fr;exemple.fr)
define('DOMAIN', '__DOMAIN__');
//define('DOMAIN', 'exemple.com;zici.fr;exemple.fr');
// Nombre d'alias poubelle limite par email
// define('ALIASLIMITBYMAIL', 30);

// PDO stucture
// Exemple pour MYSQL : 
//      define('DB', 'mysql:host=127.0.0.1;dbname=baseMysql');
//      define('DBUSER', 'utilisateurMysql');
//      define('DBPASS', 'motdepassedefou');
// Exemple pour Sqlite : 
//      define('DB', 'sqlite:./data/emailPoubelle.sqlite');
//      define('DB', 'sqlite:'.DATA.'/database.sdb');
define('DB', 'mysql:host=127.0.0.1;dbname=__DB_NAME__');
define('DBUSER', '__DB_NAME__');
define('DBPASS', '__DB_PWD__');
// table prefix
define('DBTABLEPREFIX', 'ep_');

// Use cron (true/false) for life expire email (recomanded)
// 	If use true add in crontab : 
//	0 */2 * * * /usr/bin/wget -q -t 1 -T 7200 -O /dev/null 'http://exemple.com/page.php?act=cron' >/dev/null 2>&1
define('CRON', false);

// Fichier d'alias postfix
define('FICHIERALIAS', DATA.'/virtual');
define('BIN_POSTMAP', '/usr/sbin/postmap');

define('URLPAGE', 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["SCRIPT_NAME"]);

// Email 
define('EMAILTAGSUJET', '[EmailPoubelle]');
// From de l'email
define('EMAILFROM', '"NO REPLAY emailPoubelle" <emailpoubelle@__DOMAIN__>');
define('EMAILEND', 'emailPoubelle.zici.fr');

// Alisas interdit : (regex ligne par ligne) - commenter pour désactiver
define('ALIASDENY', DATA.'/aliasdeny.txt');

// Blackliste d'email : (regex ligne par ligne) - commenter pour désactiver
define('BLACKLIST', DATA.'/blacklist.txt');

// Depend pear Net/DNS2
define('CHECKMX', false);
if (CHECKMX) {
    require_once('Net/DNS2.php');
    // Serveur DNS pour la résolution/vérification du nom de domaine
    define('NS1', 'ns1.fdn.org');
    define('NS2', '8.8.8.8');
}

// A indiquer si vous utiliser les URL's rewriting
// Exemple avec un htaccess
// 		RewriteRule ^ep-([a-z]+)-([a-zA-Z0-9+/=]+)\.html$  switch.php?page=emailPoubelle&act=$1&value=$2  [L]
//define('URLREWRITE_START', 'http://poubelle.zici.fr/ep-');
//define('URLREWRITE_MIDDLE', '-');
//define('URLREWRITE_END', '.html');
// Désactiver
define('URLREWRITE_START', false);
define('URLREWRITE_MIDDLE', false);
define('URLREWRITE_END', false);

// check update :
// 		enable : in seconds
//		disable : false
define('CHECKUPDATE', 86400);

// Maintenance mode 
define('MAINTENANCE_MODE', false);
// No maintenance for this ip (admin ip)
define('MAINTENANCE_IP', '10.0.0.1');


// Mot de passe par défaut "admin" : 
define('ADMIN_PASSWORD', '__PASSWORD__');


?>
