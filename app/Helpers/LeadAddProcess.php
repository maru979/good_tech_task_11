<?php

namespace App\Helpers;

use GoodTech\AmoCRM\Model\Helpers\CustomFields;
use Illuminate\Support\Facades\DB;
use GoodTech\AmoCRM\Model\Leads\Lead;

class LeadAddProcess extends LeadOperation
{
    private $budget;

    function processLeadChanges(){

        (new Lead())
            ->setId($this->lead->getId())
            ->setSale(intval(round($this->calculateBudget())))
            ->setCustomFields((new CustomFields())
                ->setDate(455193, time())
                ->setSelect( 455201, $this->getMeasurer()))
            ->save();
    }

    private function calculateBudget(){
        $this->calculateBasePrice();
        $this->priceApplyCellNumber();
        $this->priceApplyProfile();
        return $this->budget;
    }

    private function calculateBasePrice(){
        $width = $this->lead->getCustomFields()->getPretty(config('amo.cf.lead.width.id'));
        $height = $this->lead->getCustomFields()->getPretty(config('amo.cf.lead.height.id'));
        $this->budget = ($width && $height) ? $width * $height / 100 : null;
    }

    private function priceApplyCellNumber(){
        $cell_number = $this->lead->getCustomFields()->getSelectEnum(config('amo.cf.lead.cell_number.id'));
        $this->budget = ($cell_number == '615181') ? $this->budget * 1.5 : $this->budget;
    }

    private function priceApplyProfile(){
        $profile = $this->lead->getCustomFields()->getSelectEnum(config('amo.cf.lead.profile.id'));
        $this->budget = ($profile == '615171') ? $this->budget - 5000 : $this->budget;
    }

    private function getMeasurer(){
        $workers = explode(',', (DB::table('measurers')->get()->first()->workers));
        $measurer = (int)$workers[0];
        array_push($workers, array_shift($workers));
        $workers = implode(',', $workers);
        DB::table('measurers')->where('id', 1)->update(['workers' => $workers]);
        return $measurer;
    }
}
