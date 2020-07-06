<?php
function getPodcasts($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendMessage",
        array(
            'chat_id' => $chat_id,
            "text" => $message['from']['first_name'] . ', segue link dos podcasts:' . PHP_EOL .
            '#01' . PHP_EOL .
            'https://open.spotify.com/episode/5UnRYtIpIkZpitCUtYeUFE' . PHP_EOL .
            '#02' . PHP_EOL .
            'https://open.spotify.com/episode/1445FLqnS1UfO8NXF9ucgs',

            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('Como funciona o podcast?', '↩️ Voltar ao início'),
                ),
                'resize_keyboard' => true,
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
            "text" => $message['from']['first_name'] . ', o podcast é um material complementar que é relacionado ao curso teórico da semana, aperte o play e aproveite!',
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
