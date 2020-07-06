<?php

function getCronograma($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendPhoto",
        array(
            'chat_id' => $chat_id,
            'photo' => 'https://www.casettec.com/bot/Cronograma.png',
            'caption' => 'Segue o cronograma!',
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
