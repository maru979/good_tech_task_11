<?php

use GoodTech\Support\WorkTime;
use GoodTech\AmoCRM\Model\Helpers\EntityTypes;

/**
 *
 * field_id     int | string     - ID поля с типом дата из AmoCRM.
 *                                 Обязательный ключ для заполнения.
 *
 * entity_type  string           - ID типа сущности из AmoCRM, можно воспользоваться константами класса EntityTypes.
 *                                 Обязательный ключ для заполнения.
 *
 * type_id      int | string     - ID типа задачи из AmoCRM.
 *                                 Обязательный ключ для заполнения.
 *
 * text         string           - Текст задачи, где %s - дата в поле.
 *                                 Обязательный ключ для заполнения.
 *
 * need_update  boolean          - Обновлять время исполнения созданной задачи при смене значения в поле?
 *                                 Необязательный ключ, по-умолчанию true.
 *
 * create_on_update  boolean     - Создать новую задачу при изменении при смене значения в поле?
 *                                 Необязательный ключ, по-умолчанию false. При значении true параметр
 *                                 need_update игнорируется
 *
 * responsible  int | string     - Ответственный за задачу по дате.
 *                                 1111 - ID ответсвтенного из AmoCRM;
 *                                 'entityResponsible' - в случае выбора ответственного за сущность `entity` в которую дается задача
 *                                 Необязательный ключ, по-умолчанию 'entityResponsible'.
 *
 * time         array            - Все настройки по времени, где:
 *                              [
 *                                  (string/AbstractGTCarbon) handler => имя класса обработчика времени, по умолчанию WorkTime::class
 *                                  Необязательный ключ, по-умолчанию WorkTime::class
 *
 *                                  (array) create - массив с настройками времени создания (from) и исполнения задачи (till)
 *                                      [
 *                                          from|till => [ ..массив методов и их параметров которые необходимо
 *                                                      запустить для получения необходимого времени. Методы будут вызваны
 *                                                      в том порядке, в котором они указаны.
 *                                              handlerMethod => params, где null - запуск функции без параметров
 *                                                    ]
 *                                          Обязательные ключи для заполнения.
 *                                      ]
 *                                   Обязательный ключ для заполнения.
 *
 *                                  (array | boolean) instantly - массив с настройками времени моментальности. Начало (from) и конец (till) задачи
 *                                  Необязательный ключ, по-умолчанию true
 *                                      [
 *                                          from|till => [ ..массив методов и их параметров которые необходимо
 *                                                      запустить для получения необходимого времени. Методы будут вызваны
 *                                                      в том порядке, в котором они указаны.
 *                                              handlerMethod => params, где null - запуск функции без параметров
 *                                                    ]
 *                                          Необязательные ключи для заполнения.
 *                                      ]
 *
 *                                      true - Использовать время начала моментальности с времени создания задачи (create=>from);
 *                                      конец моментальности - время завершения (complete_till) задачи (create=>till).
 *
 *                                      false - Задача не будет создаваться моментально.
 *                              ]
 *
 * @see https://www.amocrm.ru/developers/console/
 */

return
    [
        0 =>
            [
                'field_id'    => 455197,
                'entity_type' => EntityTypes::LEADS,
                'type_id'     => 1644877,
                "text"        => "%s назначен замер, необходимо выехать к клиенту.",
                'need_update' => true,
                'create_on_update' => false,
                "responsible" => '3797932',
                'time'        =>
                    [
                        'handler'   => WorkTime::class,
                        'create'    =>
                            [
                                'from' =>
                                    [
                                        'workTimeStart' => null,
                                        'subWeekDay' => null,

                                    ],
                                'till' =>
                                    [
                                        'workTimeEnd' => null,
                                        'addWeekday' => null,
                                    ]
                            ],
                        'instantly' => true,
                    ],
            ]
    ];
