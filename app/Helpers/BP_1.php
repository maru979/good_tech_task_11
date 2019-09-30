<?php


namespace App\Helpers;


use App\measurer;
use GoodTech\AmoCRM\Facades\AmoCRM;
use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\Leads\LeadsQuery;
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
        if($this->lead->getStatusId() == '29884039'){
            $query = (new LeadsQuery())->id($this->lead->getId());
            $leads = AmoCRM::getLeadsList($query)->all();
            if ($leads[0]->getMainContactId()){
                $mainContactId = $leads[0]->getMainContactId();
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
