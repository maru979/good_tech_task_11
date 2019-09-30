<?php

use App\Helpers\BP_1;
use App\Helpers\BP_2;
use App\Helpers\LeadAdd;
use App\Helpers\LeadAddProcess;
use \GoodTech\AmoCRM\Model\Helpers\EntityTypes;

/*
 * array  'middleware' - будут применены к веб-хуку
 *
 * string 'queue'      - enter queue name for connection => database
 *                       enter 'webhook_action' for actions queue (add, status, update, responsible, etc...)
 *
 * array  'routes'     - Массив исполняемых процессов, выполняются последовательно.
 *                       [
 *                          string         'type'      => EntityTypes::(LEADS, COMPANIES, CONTACTS, TASKS, NOTES),
 *                          array | string 'actions'   => [Webhook actions],
 *                          array | string 'handler'   => ['Class@function', 'Class'] -
 *                                                        Если не указана фукнция, то запускается __invoke,
 *                                                        В функцию передается объект Webhook.
 *                       ]
 */

return
[
    'middleware' => ['logger'],
    'queue'      => 'default',
    'routes'     =>
    [
        [
            'type'    => EntityTypes::LEADS,
            'actions' => ['add', 'status'],
            'handler' => ['task_from_status', BP_1::class], BP_2::class
        ],
        [
            'type'    => EntityTypes::LEADS,
            'actions' => ['add', 'update'],
            'handler' => 'task_from_date'
        ],
        [
            'type'    => EntityTypes::LEADS,
            'actions' => ['add'],
            'handler' => [LeadAddProcess::class]
        ],
    ]
];
