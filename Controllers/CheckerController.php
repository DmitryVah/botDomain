<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Запуск проверки доменов<br>";


require_once './Models/CheckerModel.php';
require_once './Controllers/TelegramController.php';

class CheckDomain extends Bot
{
    public function __construct()
    {

        $checker = new Checker();
        $domains = $checker->checkDomains();
        $ssl =  $checker->checkSsl();

        if(empty($domains) && empty($ssl)){
           return false;
        }

        $option=[];

        if (!empty($domains)) {
            foreach ($domains as $row) {
                $option['text'] = $row['user_name'].", Срок действия домена ".$row['domain_name'].", подходит к концу.\nДомен действителен до ".date('d-m-Y',strtotime($row['date_end']));
                $option['chat_id'] = $row['chat_id'];
                parent::sendRequest($option);
            }
        }

        if (!empty($ssl)) {
            foreach ($ssl as $row) {
                $option['text'] = $row['user_name'].", Срок действия ssl сертификата для домена ".$row['domain_name'].", подходит к концу.\nСертификата действителен до ".date('d-m-Y',strtotime($row['date_end_ssl']));
                $option['chat_id'] = $row['chat_id'];
                parent::sendRequest($option);
            }
        }





        return true;
    }


}

$pdo = new PDO(...);  // как у тебя в коде
$stmt = $pdo->query("SELECT domain_name FROM domains");
$domains = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo "Доступные домены: <br>";
foreach ($domains as $domain) {
    echo htmlspecialchars($domain) . "<br>";
}
