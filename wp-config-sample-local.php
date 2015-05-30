<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es
 * auf der {@link http://codex.wordpress.org/Editing_wp-config.php wp-config.php editieren}
 * Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt,
 * wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von
 * wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'dreamspa'); 

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'root'); 

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'Nicorina24'); 

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost'); 

/*
define('DB_NAME', 'db194217x2244861'); //dreamspa

define('DB_USER', 's194217_2244861'); //root 

define('DB_PASSWORD', 'Nicorina24'); //Nicorina24

define('DB_HOST', 'mysql15.1blu.de'); //localhost */

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase.
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern,
 * alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         'I$H-=sE9.2tu|JYcZAMkCRTQ8k0F57A<B#Fq}n0(, |J*&#9.=nQZ.C3|AXK=Dxt');
define('SECURE_AUTH_KEY',  '9A(XhSR+j=F.*FWOmJ#|0im3L(=r5:I#/4)TT vByS|v_0.XzGk<yR<$CoXDm. v');
define('LOGGED_IN_KEY',    'B$R?,2X`ph>#0^GGs]D.LD80x;^ag7m/<f`>-JB~LKD/>!gC,X%+LO)9{D&W(wj*');
define('NONCE_KEY',        '9r-ykjc8.bWxGAqi;P2@u--F4_Jdgu3[s32Y/k;)Z@lIv!DqDimPyQmdHb!]|0/e');
define('AUTH_SALT',        ']q NsKkSi?CZ,B*jNyXfS+MjuArh{:fsPBlUIl`V,0>,[~IIPS8382(P.JSD+na%');
define('SECURE_AUTH_SALT', '&F||jQ`R*^+wY`Crt.{]kb3Suc!:(}U{aGOfQ`|B1}6A~jYE/J.1<87!_*JUNw6=');
define('LOGGED_IN_SALT',   'T_jf;C2$0=,(H%oP)WeX+2oo^G,a&mVX>#J~$K[]xLUx+O5Y~.8ij-6-$(b5@4$@');
define('NONCE_SALT',       '*z,?-Tj1F7CE*Sm^KJo[6%3KkL-xh(+<,EG|Dt4#6`hXf_oo](q5#A7kJGs6}|CL');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('WP_CACHE', true); //Added by WP-Cache Manager
