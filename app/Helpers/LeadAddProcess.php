<?php


namespace App\Helpers;


use GoodTech\AmoCRM\Model\Helpers\CustomFields;
use GoodTech\AmoCRM\Model\WebHook;
use Illuminate\Support\Facades\DB;
use GoodTech\AmoCRM\Model\Leads\Lead;

class LeadAddProcess
{
    /**
     * @var Lead
     */
    private $lead;
    private $cf;

    public function __invoke(WebHook $webHook){
        $this->lead = $webHook->getEntity();
        $this->cf = $this->lead->getCustomFields();
        $this->processLeadOnAdd();
    }

    private function processLeadOnAdd(){
        (new Lead())
            ->setId($this->lead->getId())
            ->setSale(intval(round($this->calculateBudget())))
            ->setCustomFields((new CustomFields())
                ->setDate(455193, time())
                ->setSelect( 455201, $this->getMeasurer()))
            ->save();
    }

    private function calculateBudget(){
        $width = $this->getCFValue('435877');
        $height = $this->getCFValue('435875');
        $cell_number = $this->getCFEnum('435881');
        $profile = $this->getCFEnum('435879');

        if ($width && $height) {
            $budget = $width * $height / 100;
            $budget = ($cell_number == '615181') ? $budget * 1.5 : $budget;
            $budget = ($profile == '615171') ? $budget - 5000 : $budget;
        }
        return $budget;
    }

    private function getMeasurer(){
        $workers = explode(',', (DB::table('measurers')->get()->first()->workers));
        $measurer = (int)$workers[0];
        array_push($workers, array_shift($workers));
        $workers = implode(',', $workers);
        DB::table('measurers')->where('id', 1)->update(['workers' => $workers]);
        return $measurer;
    }

    private function getCFValue($id){
        return isset($this->cf[$id]['values'][0]['value']) ? $this->cf[$id]['values'][0]['value'] : $this->cf[$id]['values'][0];
    }

    private function getCFEnum($id){
        return $this->cf[$id]['values'][0]['enum'];
    }

}
