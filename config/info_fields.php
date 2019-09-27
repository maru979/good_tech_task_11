<?php

use GoodTech\AmoCRM\Model\CustomFields\Helpers\Field;
use GoodTech\AmoCRM\Model\Helpers\EntityTypes;

return [
    "fields" => [
        "phone" => [
            "name" => "Телефон",
            "type" => Field::MULTI_TEXT,
            "entity_types" => [EntityTypes::CONTACTS],
        ],
        "email" => [
            "name" => "Email",
            "type" => Field::MULTI_TEXT,
            "entity_types" => [EntityTypes::CONTACTS],
        ],
        "ads_channel" => [
            "name" => "Рекламный канал",
            "is_editable" => false,
            "type" => Field::MULTISELECT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
            "enums" => [
                "Яндекс Директ",
                "Яндекс Органика",
                "Google Adwords",
                "Google Органика",
                "Mail.ru Реклама",
                "Mail.ru Органика",
                "Vkontakte Реклама",
                "Vkontakte Органика",
                "Facebook Реклама",
                "Facebook Органика",
                "Оk.ru Реклама",
                "Ok.ru Органика",
                "Instagram Реклама",
                "Instagram Органика",
                "Youtube Реклама",
                "Youtube Органика",
                "Аvito Реклама",
                "Рекламный канал Х",
                "Органика канал Х",
                "Прямой заход",
                "Не задан"
            ]
        ],
        "touch" => [
            "name" => "Касание",
            "is_editable" => false,
            "type" => Field::MULTISELECT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
            "enums" =>
                [
                    "Форма на web-сайте",
                    "Входящий звонок",
                    "Исходящий звонок",
                    "Не задан"
                ]
        ],
        "website" => [
            "name" => "Web-сайт",
            "is_editable" => false,
            "type" => Field::MULTISELECT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
            "enums" =>
                [
                    "http://localhost/public/index.php",
                    "http://test.goodtechcrm.ru/"
                ]
        ],
        "website_page" => [
            "name" => "Web-сайт страница",
            "is_editable" => false,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS]
        ],
        "form" => [
            "name" => "Web-сайт форма",
            "is_editable" => 0,
            "type" => Field::MULTISELECT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
            "enums" => [
                "Заказать звонок",
                "Вопрос менеджеру",
                "Записаться на сеанс",
                "Не определена"
            ]
        ],
        "referrer" => [
            "name" => "Referrer",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "utm_source" => [
            "name" => "utm_source",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "utm_medium" => [
            "name" => "utm_medium",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "utm_campaign" => [
            "name" => "utm_campaign",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "utm_content" => [
            "name" => "utm_content",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "utm_term" => [
            "name" => "utm_term",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "browser" => [
            "name" => "Браузер",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "device" => [
            "name" => "Устройство",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "city" => [
            "name" => "Город",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "telephony" => [
            "name" => "Телефония",
            "is_editable" => 0,
            "type" => Field::MULTISELECT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
            "enums" => [
                "Мои Звонки",
                "OnlinePBX",
                "Sipuni"
            ]
        ],
        "google_client_id" => [
            "name" => "Google Client ID",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
        "yandex_client_id" => [
            "name" => "Яндекс Client ID",
            "is_editable" => 0,
            "type" => Field::TEXT,
            "entity_types" => [EntityTypes::CONTACTS, EntityTypes::LEADS],
        ],
    ]
];
