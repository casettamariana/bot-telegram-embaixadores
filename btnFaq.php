<?php
function getFaq($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendDocument",
        array(
            'chat_id' => $chat_id,
            'document' => 'https://www.casettec.com/bot/FAQ-PERGUNTAS_FREQUENTES.pdf',
            'filename' => 'FAQ-PERGUNTAS_FREQUENTES.pdf',
            'caption' => $message['from']['first_name'] . ', preparamos um documento com as perguntas mais frequentes que apareceram por aqui!',

            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('Continuo com duvidas :(', '↩️ Voltar ao início'),
                ),
                'resize_keyboard' => true,
                'one_time_keyboard' => true,
            ),
        )
    );

}
