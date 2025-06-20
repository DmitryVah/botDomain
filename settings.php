<?php
// Настройки подключения к базе данных.
define('DB_HOST', 'localhost');
define('DB_NAME', 'domains');
define('DB_USER', 'root');
define('DB_PASS', '');

// Ключ бота telegram
define('TOKEN_BOT', getenv('TOKEN_BOT'));

// Использовать Прокси tor, для обхода РКН?
define('PROXY_TOR', false);
