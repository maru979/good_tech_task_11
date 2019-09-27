<?php


namespace App\Helpers;


use GoodTech\AmoCRM\Model\Leads\Lead;
use GoodTech\AmoCRM\Model\WebHook;
use Illuminate\Support\Facades\Log;

class BP_1
{
    /**
     * @var Lead
     */
    private $lead;
  public function __invoke(WebHook $webHook)
  {
      $this->lead = $webHook->getEntity();
      $this->test();
  }

  private function test()
  {
      $leadId = $this->lead->getId();
      Log::info($leadId);
  }
}
