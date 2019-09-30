<?php

namespace App\Helpers;

use GoodTech\AmoCRM\Facades\AmoCRM;
use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\Leads\LeadsQuery;
use GoodTech\AmoCRM\Model\WebHook;

abstract class LeadOperation
{
    /**
     * @var Lead
     */
    protected $lead;

    public function __invoke(WebHook $webHook){
        $this->lead = $webHook->getEntity();
        if ($this->leadIsActive()) {
            $this->processLeadChanges();
        }
    }

    private function leadIsActive(){
        $query = (new LeadsQuery())->id($this->lead->getId());
        $leads = AmoCRM::getLeadsList($query)->leads();
        if (isset($leads[0])){
            return true;
        }
        else{
            return false;
        }
    }

    abstract protected function processLeadChanges();
}
