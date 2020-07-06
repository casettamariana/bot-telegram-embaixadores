<?php
function getAgenda($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendPhoto",
        array(
            'chat_id' => $chat_id,
            'photo' => 'https://www.casettec.com/bot/AgendadaSemana3.jpeg',
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
