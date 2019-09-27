<?php

use GoodTech\Support\WorkTime;
use GoodTech\Website\Helpers\PrepareRequest;
use GoodTech\Website\Helpers\InfoCustomFields;
use GoodTech\Website\Helpers\Responsible;

return [
    "middleware" => [
        'logger'
    ],
    "sites" => [
        [
            "site" => ["crm-okna.ru"],
            "touch" => "Форма на web-сайте",
            "prepare" => PrepareRequest::class,
            "fields" => InfoCustomFields::class,
            "responsible" => 3797932, //Responsible::class
            "lead" => [
                "create" => true,
                "name" => "Заявка с сайта #{lead.id} от {date}",
                "status_id" => 29805766,
                "tags" => ["Заявка с сайта", "{site}"],
                "telegram" => [
                    "send" => true,
                    "bot_token" => '946947253:AAGPQLwCWeP7Qw74jGwBPjjVRRSyped4VB0',
                    "chat_id" => '-1001200754702',
                    "message" => "Заявка с сайта {site}.\nhttps://" . env('AMO_DOMAIN') . ".amocrm.ru/leads/detail/{lead.id}",
                ],
            ],
            "contact" => [
                "name" => "{contact.name}",
                "tags" => ["Лид с сайта", "{site}"],
            ],
            "task" => [
                "create" => true,
                "entity" => 2,
                "type" => 1,
                "text" => "Заявка с сайта {site} от {date}\n1) Необходимо связаться с Клиентом.\n2) Далее перевести Сделку на следующий этап.",
                "time" => [
                    "work" => true,
                    "minutes" => 30,
                    "time_handler" => WorkTime::class,
                ],
            ],
            "notification_if_form_not_exists" => true,
            "forms" => [
                "call" => "Обратный звонок/{site}",
                "calc" => "Калькулятор/{site}",
            ],
        ],
    ],
];
