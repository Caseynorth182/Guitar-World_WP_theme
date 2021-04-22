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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'guitar_base' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'Vka/`D%Z@e/6fUL3C9YRl%by4|d.|-PgX5mt;BYa.WHi`Z@t+#{GusA>]>.S=ZPf' );
define( 'SECURE_AUTH_KEY',  'n4yIBs-^&l_GIWO#ZIvKtp>%S5mQ&@VzC-DV5kGGq1;~T&?O&l_p9-5>rGDOueoI' );
define( 'LOGGED_IN_KEY',    '$LE$1gNXwlaSB<6,5_.9jp:d=nffv%GJfKk9mR& G(<@fAQ?1>06iGZDX2$iA@<Q' );
define( 'NONCE_KEY',        'a]o,G,~1EJjGiUo3Vy=jlq#psnvVC]F!(<C>Q)@ai/^<;%3zBE=xB?#I?qJ*<U,!' );
define( 'AUTH_SALT',        'q[x<hgRAg^r.NbXn+IpAl),%|g1aEq`=2z*2(-72JnaI8`l;z?iya>x2x}nt$Y],' );
define( 'SECURE_AUTH_SALT', '6>.U{<UW`vQTn.]@{BA&>9USSWWa)eZ7Ds,o0LVa!Co3g+mmUbW)s.pWJ!i0e@):' );
define( 'LOGGED_IN_SALT',   'K@$^?@{=YmB`4WDGg,F(-a+wLZ5fq:-h[6I<n_kQi)ER55ZOsmQ+@i]v*{VkI_!x' );
define( 'NONCE_SALT',       'sY6a*%B<F>QQ`?98.zOOYnWvshPJCoXmXV4.YuSInE-?mBM+2YMaG&#m8m9BxRz@' );

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
