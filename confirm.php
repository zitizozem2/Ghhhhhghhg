<?php

$botToken = '7285951498:AAFLIxGKudTbK-B3DD4NCN2Q0q--wTy_GHA';
$chatId = '6245535196';

// Получаем данные из формы
$name = $_POST['name'];
$telegram = $_POST['telegram_username'];
$server_type = $_POST['hyper_v_version'];
$location = $_POST['server_location'];
$server_usage = $_POST['server_usage'];

// Формируем текст сообщения с данными из формы
$message .= "👔 Имя: $name" . PHP_EOL;
$message .= "📱 Telegram: @$telegram" . PHP_EOL;
$message .= "💻 Тип сервера: $server_type" . PHP_EOL;
$message .= "📍 Локация: $location" . PHP_EOL;
$message .= "👨🏻‍💻 Предполагаемое использование сервера: $server_usage" . PHP_EOL;

// Кнопки для сообщения Telegram
$keyboard = [
    [
        [
            'text' => 'Принять',
            'url' => 'полный адрес вашего сайта'
        ],
        [
            'text' => 'Отклонить',
            'url' => 'полный адрес вашего сайта'
        ]
    ]
];

// Конвертируем кнопки в JSON-формат
$replyMarkup = json_encode([
    'inline_keyboard' => $keyboard
]);

// Отправляем сообщение с кнопками в Telegram
$response = file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=".urlencode($message)."&reply_markup=".$replyMarkup);

// Если сообщение отправлено успешно, выводим уведомление о принятой заявке
if ($response) {
    echo '<div class="alert alert-success" role="alert">Спасибо за заявку, '.$name.'! /div>';
} else {
    echo '<div class="alert alert-danger" role="alert">Возникла ошибка при отправке заявки. Попробуйте еще раз позже.</div>';
}
?>