<?php


namespace App\Helpers;


use GoodTech\AmoCRM\Model\Helpers\CustomFields;
use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\Notes\Note;
use GoodTech\AmoCRM\Model\WebHook;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Element;

class BP_2
{
    /**
     * @var Lead
     */
    private $lead;
    private $type;
    private $body;

    public function __invoke(WebHook $webHook){
        $this->lead = $webHook->getEntity();
        $this->body = $webHook->getBody();
        $this->statusProcessing();
    }

    private function statusProcessing(){
        if($this->lead->getStatusId() == '29884042'){
            if($this->lead->getSale() >= 10000){
                $upLead = (new Lead())->setId($this->lead->getId())
                    ->setStatusId(29884045)
                    ->save();
            }
            else{
                $addNote = (new Note())->setElementId($this->lead->getId())
                    ->setElementType(2)
                    ->setNoteType(4)
                    ->setText("Низкий бюджет сделки, предложить клиенту доп. продукты")
                    ->save();
            }
        }
    }
}
