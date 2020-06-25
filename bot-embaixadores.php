<?php
//Produção: 1138844181:AAEVJFHtCqV8wgZjDecCl34ZF_ijcHNSLTo
//Homolog: 971060829:AAHg2nT-vf89WwX4m1jih1ijYpplfVeTlRM
define('BOT_TOKEN', '971060829:AAHg2nT-vf89WwX4m1jih1ijYpplfVeTlRM');
define('API_URL', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');

require 'btnCronograma.php';
require 'btnDatas.php';
require 'btnFaq.php';
require 'btnPodcast.php';

function processMessage($message)
{
    // processa a mensagem recebida
    $message_id = $message['message_id'];
    $chat_id = $message['chat']['id'];

    $fp = fopen('message.json', 'w');
    fwrite($fp, $message);
    fclose($fp);

    $fp = fopen('message_id.json', 'w');
    fwrite($fp, $message_id);
    fclose($fp);

    $fp = fopen('chat_id.json', 'w');
    fwrite($fp, $chat_id);
    fclose($fp);

    $fp = fopen('text.json', 'w');
    fwrite($fp, $message['text']);
    fclose($fp);

    if (isset($message['text'])) {

        $text = $message['text'];

        do {
            if ((strpos($text, "/start") === 0) || (strpos($text, "Voltar ao início") === 0) || (strpos($text, "oi") === 0)) {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Olá, ' . $message['from']['first_name'] .
                    '!' . PHP_EOL . 'Estou aqui para ajudar com o que for necessário para transformar sua jornada embaixadora incrível!',
                    //Botões do Telegram
                    'reply_markup' => array(
                        'keyboard' => array(
                            array('Cronograma', 'Datas Importantes'),
                            array('Podcasts', 'FAQ'),
                        ),
                        'one_time_keyboard' => true,
                    ),
                ));
            } else {
                switch ($text) {
                    case 'Cronograma':
                        getCronograma('cronograma', $text, $chat_id, $message);
                        break;
                    case 'Datas Importantes':
                        getDatas('datas', $text, $chat_id, $message);
                        break;
                    case 'FAQ':
                        getFaq('faq', $text, $chat_id, $message);
                        break;
                    case 'Podcasts':
                        getPodcasts('podcast', $text, $chat_id, $message);
                        break;
                    case 'Como funciona o podcast?':
                        getComoFuncionaPodcast('funcPodcast', $text, $chat_id, $message);
                        break;
                    case 'Continuo com duvidas :(':
                        sendMessage("sendMessage",
                            array(
                                'chat_id' => $chat_id,
                                "text" => $message['from']['first_name'] . ', nos escreva sua duvida',

                                //Botões do Telegram
                                'reply_markup' => array(
                                    'keyboard' => array(
                                        array('Voltar ao início'),
                                    ),
                                    'one_time_keyboard' => true,
                                ),
                            )
                        );
                        break;
                    default:
                        sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Desculpe, tente uma alternativa dos botões 1'));
                }
            }
        } while ($text != 0);

    } else {
        sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Clique nos botões para que eu possa te ajudar!!'));
    }
}

function sendMessage($method, $parameters)
{
    $options = array(
        'http' => array(
            'method' => 'POST',
            'content' => json_encode($parameters),
            'header' => "Content-Type: application/json\r\n" .
            "Accept: application/json\r\n",
        ),
    );

    $context = stream_context_create($options);
    file_get_contents(API_URL . $method, false, $context);
}

$update_response = file_get_contents("php://input");

$update = json_decode($update_response, true);

if (isset($update["message"])) {
    processMessage($update["message"]);
}
