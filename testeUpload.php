<?php
//Produção: 1138844181:AAEVJFHtCqV8wgZjDecCl34ZF_ijcHNSLTo
//Homolog: 971060829:AAHg2nT-vf89WwX4m1jih1ijYpplfVeTlRM
define('BOT_TOKEN', '1182361757:AAFDN-EcOKgXsjHkcl-fMGg3pvQOzlxvuU4');
define('API_URL', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');

require 'btnCronograma.php';
require 'btnDatas.php';
require 'btnFaq.php';
require 'btnPodcast.php';

function processMessage($message)
{
    $dados_gravacao = array(
        'dados_chat' => array(
            'message_id' => $message['message_id'],
            'chat_id' => $message['chat']['id'],
        ),
        'dados_mensagem' => 
        'text_message' => $message['text']
    )
    // processa a mensagem recebida
    $message_id = $message['message_id'];
    $chat_id = $message['chat']['id'];
    $text_message = $message['text'];


    $fp = fopen('message.json', 'a');
    fwrite($fp, $message);
    fclose($fp);

    $fp = fopen('message_id.json', 'a');
    fwrite($fp, $message_id);
    fclose($fp);

    $fp = fopen('chat_id.json', 'a');
    fwrite($fp, $chat_id);
    fclose($fp);

    $fp = fopen('text.json', 'a');
    fwrite($fp, $message['text']);
    fclose($fp);

    if (isset($message['text'])) {

        $text = $message['text'];

        do {
            if ((strpos($text, "/start") === 0) || (strpos($text, "↩️ Voltar ao início") === 0) || (strpos($text, "oi") === 0) || (strpos($text, "Oi") === 0) || (strpos($text, "Olá") === 0) || (strpos($text, "ola") === 0) || (strpos($text, "Olá") === 0)) {
                sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Olá, ' . $message['from']['first_name'] .
                    '!' . PHP_EOL . 'Estou aqui para facilitar sua Experiência Embaixadora!'
                    . PHP_EOL . 'Por favor, selecione uma das opções abaixo:',
                    //Botões do Telegram
                    'reply_markup' => array(
                        'keyboard' => array(
                            array('📆 Cronograma do Programa', '📒 Agenda'),
                            array('🎧 Podcasts', '❓ FAQ'),
                            array('💊 Pílulas de Conhecimento', '👩🏽‍💻 Atividades'),
                        ),
                        // 'resize_keyboard' => true,
                        'one_time_keyboard' => true,
                    ),
                ));
            } else {
                switch ($text) {
                    case '📆 Cronograma do Programa':
                        getCronograma('cronograma', $text, $chat_id, $message);
                        break;
                    case '📒 Agenda':
                        getAgenda('datas', $text, $chat_id, $message);
                        break;
                    case '❓ FAQ':
                        getFaq('faq', $text, $chat_id, $message);
                        break;
                    case '🎧 Podcasts':
                        getPodcasts('podcast', $text, $chat_id, $message);
                        break;
                    case 'Como funciona o podcast?':
                        getComoFuncionaPodcast('funcPodcast', $text, $chat_id, $message);
                        break;
                    case '💊 Pílulas de Conhecimento':
                        // getPilulas('funcPilulas', $text, $chat_id, $message);
                        sendMessage("sendVideo",
                            array(
                                'chat_id' => $chat_id,
                                // 'text' => $message['from']['first_name'] . ', segue link das píluas:' . PHP_EOL . 'Pílula dia xx/xx: www.google.com' . PHP_EOL . 'Pílula dia xx/xx: www.google.com',
                                'video' => 'https://www.casettec.com/bot/Pílula1test-Full.mp4',
                                'thumb' => 'https://www.casettec.com/bot/video.png',
                                // 'capition' => 'Segue a pílula 1',
                                'supportsStreaming' => true,
                                // 'duration' => '222',
                                // 'mime_type' => 'MP4',
                                // 'width' => null,
                                // 'height' => null,
                                //Botões do Telegram
                                'reply_markup' => array(
                                    'keyboard' => array(
                                        array('O que são pílulas?', '↩️ Voltar ao início'),
                                    ),
                                    'resize_keyboard' => true,
                                    'one_time_keyboard' => true,
                                ),
                            )
                        );
                        break;
                    case 'O que são pílulas?':
                        sendMessage("sendMessage",
                            array(
                                'chat_id' => $chat_id,
                                "text" => $message['from']['first_name'] . ', as Pílulas são doses quinzenais de conhecimento extra, complementares ao conteúdo teórico :)',

                                //Botões do Telegram
                                'reply_markup' => array(
                                    'keyboard' => array(
                                        array('↩️ Voltar ao início'),
                                    ),
                                    'resize_keyboard' => true,
                                    'one_time_keyboard' => true,
                                ),
                            )
                        );
                        break;
                    case '👩🏽‍💻 Atividades':
                        sendMessage("sendDocument",
                            array(
                                'chat_id' => $chat_id,
                                'document' => 'https://www.casettec.com/bot/Atividade-Embaixadora-1.pdf',
                                'filename' => 'Atividade-Embaixadora-1.pdf',
                                'caption' => $message['from']['first_name'] . ', segue a atividade 1.',

                                //Botões do Telegram
                                'reply_markup' => array(
                                    'keyboard' => array(
                                        array('↩️ Voltar ao início'),
                                    ),
                                    'resize_keyboard' => true,
                                    'one_time_keyboard' => true,
                                ),
                            )

                        );
                        break;
                    case 'Continuo com duvidas :(':
                        sendMessage("sendMessage",
                            array(
                                'chat_id' => $chat_id,
                                "text" => $message['from']['first_name'] . ', calma, que vai dar tudo certo!' . PHP_EOL . 'Fale com o tutor de sua turma ou envie um e-mail para embaixadoresdacidadania@goias.gov.br',

                                //Botões do Telegram
                                'reply_markup' => array(
                                    'keyboard' => array(
                                        array('↩️ Voltar ao início'),
                                    ),
                                    'resize_keyboard' => true,
                                    'one_time_keyboard' => true,
                                ),
                            )
                        );
                        break;
                    default:
                        sendMessage("sendMessage",
                            array(
                                'chat_id' => $chat_id,
                                "text" => 'Ops... Essa dúvida não poderei te responder no momento.' . PHP_EOL .
                                'Fale com o tutor de sua turma ou envie um e-mail para:' . PHP_EOL .
                                'embaixadoresdacidadania@goias.gov.br' . PHP_EOL . PHP_EOL .
                                'Ou se preferir escolha uma opção dos botões!',
                                //Botões do Telegram
                                'reply_markup' => array(
                                    'keyboard' => array(
                                        array('📆 Cronograma do Programa', '📒 Agenda'),
                                        array('🎧 Podcasts', '❓ FAQ'),
                                        array('💊 Pílulas de Conhecimento', '👩🏽‍💻 Atividades'),
                                    ),
                                    // 'resize_keyboard' => true,
                                    'one_time_keyboard' => true,
                                ),
                            )
                        );
                }
            }
        } while ($text != 0);

    } else {
        sendMessage("sendMessage",
            array(
                'chat_id' => $chat_id,
                "text" => 'Ops... Essa dúvida não poderei te responder no momento.' . PHP_EOL .
                'Fale com o tutor de sua turma ou envie um e-mail para:' . PHP_EOL .
                'embaixadoresdacidadania@goias.gov.br' . PHP_EOL . PHP_EOL .
                'Ou se preferir escolha uma opção dos botões!',

                //Botões do Telegram
                'reply_markup' => array(
                    'keyboard' => array(
                        array('📆 Cronograma do Programa', '📒 Agenda'),
                        array('🎧 Podcasts', '❓ FAQ'),
                        array('💊 Pílulas de Conhecimento', '👩🏽‍💻 Atividades'),
                    ),
                    // 'resize_keyboard' => true,
                    'one_time_keyboard' => true,
                ),
            )
        );
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
