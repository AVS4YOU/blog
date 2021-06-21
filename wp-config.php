<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'D:\sites\blog.avs4you.com\avs4youBlog\wp-content\plugins\wp-super-cache/' );
define( 'DB_NAME', 'avs4you_blog' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'avs4youblog' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'G08D8IT6LC' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*~YMk#)1Z|-tF8qkk7^b?Zxh6cTcqNv`CCDFEAoe)~N*`egZP4oj4^SnIMEt,%jJ' );
define( 'SECURE_AUTH_KEY',  '/=(-8;#Jkt(:9Bk*fA<TkxQ{oCVo)MNyr*On]k~8&C=+JN!] L!/;[x8ho nbQF&' );
define( 'LOGGED_IN_KEY',    'vTxsLHb Br-PO>W_tH+SD^L|jIps;b GTm_{s4kQ69;3p,bkGo+3j#svDr)J0ES4' );
define( 'NONCE_KEY',        'T6T_TVzimt/ad8enC&=N/cQ$Sz/KZ>BC%ie]2Ye]:r9U]E69Jr+W,-#o; g6IrTp' );
define( 'AUTH_SALT',        'PUFuZn1vA0-E%Qab]=?i4pPor[R`onCb%e^di.tb&zPW>1(%2~e_ix@<%I3i@Bfr' );
define( 'SECURE_AUTH_SALT', 'RlK6,p}7I!lK,FGo Me</o`h$+KmO]s}|-h3mF<|T}P]1PRW*#l&rN Ocv=bue`C' );
define( 'LOGGED_IN_SALT',   'w>SB3cSw9,i #6)_egZ*;O*_#_}Uk1V}-_H3Gw;bkQlHf)o`WvM}R~gss=Dmdw0U' );
define( 'NONCE_SALT',       'T@UitE?^E<JlF~j?b5(vpG1D[<PwRX{-.+F-x[93,b9~ICTU:M#~,`-[K8.q0^X~' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false);
define('WP_DEBUG_LOG', false);

define( 'WP_DEBUG_DISPLAY', false);
define('CONCATENATE_SCRIPTS', false);

/*define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );*/

/*
define('FORCE_SSL_LOGIN', true);
define('FORCE_SSL_ADMIN', true);
define( 'CONCATENATE_SCRIPTS', false );
define( 'SCRIPT_DEBUG', true );*/

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
