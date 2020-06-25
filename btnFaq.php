<?php
function getFaq($opcao, $texto, $chat_id, $message)
{

    sendMessage("sendDocument",
        array(
            'chat_id' => $chat_id,
            'document' => 'https://www.casettec.com/bot/FAQ-PERGUNTAS_FREQUENTES.pdf',
            'filename' => 'FAQ-PERGUNTAS_FREQUENTES.pdf',
            'caption' => 'Este arquivo PDF contem as perguntas frequentes dos nossos alunos Embaixadores.',

            //Botões do Telegram
            'reply_markup' => array(
                'keyboard' => array(
                    array('Voltar ao início', 'Continuo com duvidas :('),
                ),
                'one_time_keyboard' => true,
            ),
        )
    );

}
