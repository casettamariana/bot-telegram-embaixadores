<?php
function getPilulas($opcao, $texto, $chat_id, $message)
{
    sendMessage("sendMessage",
        array(
            'chat_id' => $chat_id,
            "text" => $message['from']['first_name'] . ', segue link das píluas:' . PHP_EOL . 'Pílula dia xx/xx: www.google.com' . PHP_EOL . 'Pílula dia xx/xx: www.google.com',
            // 'video' => 'https://www.casettec.com/bot/Pílula1-Reduzida.mp4',
            // 'file_name' => 'Pílula 1 - Full',
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
}
function getOqPilulas($opcao, $texto, $chat_id, $message)
{
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
}
function getAgenda($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendPhoto",
        array(
            'chat_id' => $chat_id,
            'photo' => 'https://www.casettec.com/bot/Cronograma.png',
            'caption' => $message['from']['first_name'] . ', atenção para não perder nenhum evento!',
            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('↩️ Voltar ao início'),
                ),
                'resize_keyboard' => true,
            ),
            'one_time_keyboard' => true,

        )
    );

}

function getAtividades($opcao, $texto, $chat_id, $message)
{
    sendMessage("sendMessage",
        array(
            'chat_id' => $chat_id,
            'document' => 'https://www.casettec.com/bot/atividade1.pdf',
            'filename' => 'Atividade-1-EmbaixadoresDaCidadania.pdf',
            'caption' => $message['from']['first_name'] . ', segue a atividade 1',
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
}
