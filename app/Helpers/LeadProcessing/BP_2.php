<?php

namespace App\Helpers;

use GoodTech\AmoCRM\Model\Helpers\CustomFields;
use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\Notes\Note;
use GoodTech\AmoCRM\Model\WebHook;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Element;

class BP_2 extends LeadOperation
{
    function processLeadChanges(){
        if($this->lead->getStatusId() == config('amo.lead_status.BP_2.id')){
            if($this->lead->getSale() >= 10000){
                (new Lead())->setId($this->lead->getId())
                    ->setStatusId(config('amo.lead_status.BP_3.id'))
                    ->save();
            }
            else{
                (new Note())->setElementId($this->lead->getId())
                    ->setElementType(config('amo.element_type.lead'))
                    ->setNoteType(config('amo.note_type.default'))
                    ->setText("Низкий бюджет сделки, предложить клиенту доп. продукты")
                    ->save();
            }
        }
    }
}
