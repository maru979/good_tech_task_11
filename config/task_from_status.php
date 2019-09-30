<?php
/**
 *
 * (int)    pipelineId      ID воронки сделки.
 *
 * (int)    statusId        ID статуса сделки.
 *
 *  (bool)   loop            Давать задачу еще раз через время `minutes` если
 *                           сделка все еще находится на этапе `statusId` и
 *                           воронке `pipelineId`?
 *
 * (bool)   onLeaveStatus Давать задачу в случае если сделка ушла с этапа `statusId` и
 *                                          воронки `pipelineId`?
 *
 * (int)    responsible     Ответственный за задачу по дате. 'leadResponsible' - в
 *                          случае выбора текущего ответственного. 'entityResponsible' - в
 *                          случае выбора ответственного за сущность `entity` в которую дается задача
 *
 * (array)  entity          Сущность в которую необходимо дать задачу по порядку (если не будет
 *                          первой, будет проверка следующей сущности). Есть следующие значения
 *                          которые можно включить в данный массив:
 *                          'company' - привязанная компания
 *                          'contact' - привязанный контакт
 *                          'lead' - текущая сделка
 *
 * (array|string)   time            [
 *                                      (string/AbstractGTCarbon)  handler    Обраюотчик времени
 *                                      (array)  from|till [ ..массив методов и их параметров которые необходимо
 *                                                  запустить для получения необходимого времени. Методы будут вызваны
 *                                                  в том порядке, в котором они указаны.
 *                                          handlerMethod => params
 *                                      ]
 *                                  ]
 *
 *                                  'currentDayEnd' - в случае если задачу давать до конца текущего дня.
 *
 * (int)            type            ID типа задачи по дате.
 *
 * (string)         text            Текст задачи. Для вставки в текст id сделки необходимо
 *                                  вставить %s.
 */

return [
    0 => [
        "pipelineId"    => 2043433,
        "statusId"      => 29884039,
        "time"          => [
            "handler"   => \GoodTech\Support\WorkTime::class,
            "from" => [
                "addMinutes"        => 5,
            ],
            "till" => [
                "addMinutes"        => 30,
            ]
        ],
        "loop"          => false,
        "onLeaveStatus" => true,
        "entity"        => ['lead'],
        "responsible"   => 'entityResponsible',
        "type"          => 1,
        "text"          => "Назначить время замера.",
    ]
];
