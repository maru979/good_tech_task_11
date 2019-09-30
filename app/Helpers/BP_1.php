<?php

namespace App\Helpers;

use GoodTech\AmoCRM\Facades\AmoCRM;
use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\Leads\LeadsQuery;
use GoodTech\AmoCRM\Model\WebHook;
use GoodTech\AmoCRM\Model\Contacts\Contact;

class BP_1 extends LeadOperation
{
    function processLeadChanges(){
        if($this->lead->getStatusId() == config('amo.lead_status.BP_1.id')){
            $query = (new LeadsQuery())->id($this->lead->getId());
            $lead = AmoCRM::getLeadsList($query)->leads()[0];
            if ($lead->getMainContactId()){
                (new Contact())
                    ->setId($lead->getMainContactId())
                    ->setResponsibleUserId($this->lead->getResponsibleUserId())
                    ->save();
            }

            (new Lead())
                ->setId($this->lead->getId())
                ->setResponsibleUserId(env('ADMIN_ID'))
                ->setStatusId(config('amo.lead_status.BP_2.id'))
                ->save();
        }
    }
}
