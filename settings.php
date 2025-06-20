<?php
// Настройки подключения к базе данных.
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));

// Ключ бота telegram
define('TOKEN_BOT', getenv('TOKEN_BOT'));

// Использовать Прокси tor, для обхода РКН?
define('PROXY_TOR', false);
