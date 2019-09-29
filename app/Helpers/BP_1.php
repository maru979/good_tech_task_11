<?php


namespace App\Helpers;


use App\measurer;
use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\Tasks\Task;
use GoodTech\AmoCRM\Model\WebHook;
use GoodTech\AmoRestAPI\Helpers\GetRequest;
use GoodTech\TaskFromStatus\Models\TaskFromStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use GoodTech\AmoCRM\Model\Contacts\Contact;

class BP_1
{
    /**
    * @var Lead
    */
    private $lead;

    public function __invoke(WebHook $webHook)
    {
        $this->lead = $webHook->getEntity();
        $this->statusProcessing();
    }

    private function statusProcessing()
    {
        //->setCustomFields((new CustomFields())->setDate('455197', strtotime(date('d.m.Y 23:59:59', $measurement_date))));
        //$measurement_date = $this->getCFValue('455197');
        if($this->lead->getStatusId() == '29884039'){
            $link = 'https://'.env('AMO_DOMAIN').'.amocrm.ru/api/v2/leads?id='.$this->lead->getId().'&entity=leads';
            $response = (new GetRequest())->setLink($link)->curlRequest();
            $mainContactId = $response['_embedded']['items'][0]['main_contact']['id'];

            if (isset($mainContactId)) {
                (new Contact())
                    ->setId($mainContactId)
                    ->setResponsibleUserId($this->lead->getResponsibleUserId())
                    ->save();
            }

            (new Lead())
                ->setId($this->lead->getId())
                ->setResponsibleUserId(env('ADMIN_ID'))
                ->setStatusId(29884042)
                ->save();

            //$task = (new TaskFromStatus())->save();
        }
    }
}
