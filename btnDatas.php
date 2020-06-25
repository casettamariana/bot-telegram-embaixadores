<?php
function getDatas($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendPhoto",
        array(
            'chat_id' => $chat_id,
            'photo' => 'https://www.casettec.com/bot/Cronograma.png',
            'caption' => 'Segue as datas importantes!',
            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('Voltar ao início'),
                ),
            ),
        )
    );

}
