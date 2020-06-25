<?php
function getPodcasts($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendMessage",
        array(
            'chat_id' => $chat_id,
            "text" => $message['from']['first_name'] . ', segue link dos podcast' . PHP_EOL . 'Link 1',
            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('Como funciona o podcast?', 'Voltar ao início'),
                ),
                'one_time_keyboard' => true,
            ),
        )
    );

}

function getComoFuncionaPodcast($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendMessage",
        array(
            'chat_id' => $chat_id,
            "text" => $message['from']['first_name'] . PHP_EOL . 'Os Podcasts são para ...',
            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('Voltar ao início'),
                ),
                'one_time_keyboard' => true,
            ),
        )
    );

}
