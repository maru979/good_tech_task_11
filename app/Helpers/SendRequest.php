<?php

namespace App\Helpers;

class SendRequest
{
    private $data;

    public function __construct($formId)
    {
        $this->setFormId($formId);
        $this->setFormPage($this->getCookie('website_page'));

        $this->setUtmSource($this->getCookie('utm_source'));
        $this->setUtmMedium($this->getCookie('utm_medium'));
        $this->setUtmCampaign($this->getCookie('utm_campaign'));
        $this->setUtmTerm($this->getCookie('utm_term'));
        $this->setUtmContent($this->getCookie('utm_content'));
        $this->setReferrer($this->getCookie('referrer'));
        $this->setUserAgent($this->getUserAgent());
        $this->setCity($this->getCity());

        $this->setContactName($this->getPost('name'));
        $this->setContactEmail($this->getPost('email'));
        $this->setContactPhone($this->getPost('phone'));
    }

    public function getCookie($name, $default = null)
    {
        $name = "gt4u_$name";
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : $default;
    }

    public function getPost($name, $default = null)
    {
        return isset($_POST[$name]) ? $_POST[$name] : $default;
    }

    public function sendForm($domain, $website)
    {
        $myCurl = curl_init();

        curl_setopt_array($myCurl,
            [
                CURLOPT_URL => "http://$domain/api/website/form/$website",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($this->parseBody($this->data))
            ]
        );
        dump(curl_exec($myCurl));
        curl_close($myCurl);

    }

    public function setFormPage($value)
    {
        $this->setForm('page', $value);
        return $this;
    }

    public function setUtmSource($value)
    {
        $this->setUtm('utm_source', $value);
        return $this;
    }

    public function setUtmMedium($value)
    {
        $this->setUtm('utm_medium', $value);
        return $this;
    }

    public function setUtmCampaign($value)
    {
        $this->setUtm('utm_campaign', $value);
        return $this;
    }

    public function setUtmTerm($value)
    {
        $this->setUtm('utm_term', $value);
        return $this;
    }

    public function setUtmContent($value)
    {
        $this->setUtm('utm_content', $value);
        return $this;
    }

    public function setReferrer($value)
    {
        $this->setUtm('referrer', $value);
        return $this;
    }

    public function setUserAgent($value)
    {
        $this->setUtm('user_agent', $value);
        return $this;
    }

    public function setCity($value)
    {
        $this->setUtm('city', $value);
        return $this;
    }

    public function setContactName($value)
    {
        $this->setContact('name', $value);
        return $this;
    }

    public function setContactEmail($value)
    {
        $this->setContact('email', $value);
        return $this;
    }

    public function setContactPhone($value)
    {
        $this->setContact('phone', $value);
        return $this;
    }

    public function setContactTextField($id, $value)
    {
        $this->setContactFields($id, $this->fetchTextField($value));
        return $this;
    }

    public function setContactNumericField($id, $value)
    {
        $this->setContactFields($id, $this->fetchNumericField($value));
        return $this;
    }

    public function setContactCheckBoxField($id, $value)
    {
        $this->setContactFields($id, $this->fetchCheckBoxField($value));
        return $this;
    }

    public function setContactDateField($id, $value)
    {
        if (false === empty($value)) {
            $this->setContactFields($id, $this->fetchDateField($value));
        }

        return $this;
    }

    public function setContactUrlField($id, $value)
    {
        $this->setContactFields($id, $this->fetchUrlField($value));
        return $this;
    }

    public function setContactMultiTextField($id, $value)
    {
        $this->setContactFields($id, $this->fetchMultiTextField($value));
        return $this;
    }

    public function setContactTextAreaField($id, $value)
    {
        $this->setContactFields($id, $this->fetchTextAreaField($value));
        return $this;
    }

    public function setContactRadioButtonField($id, $value)
    {
        $this->setContactFields($id, $this->fetchRadioButtonField($value));
        return $this;
    }

    public function setContactStreetAddressField($id, $value)
    {
        $this->setContactFields($id, $this->fetchStreetAddressField($value));
        return $this;
    }

    public function setContactSmartAddressField($id, $value)
    {
        $this->setContactFields($id, $this->fetchSmartAddressField($value));
        return $this;
    }

    public function setContactBirthDayField($id, $value)
    {
        $this->setContactFields($id, $this->fetchBirthDayField($value));
        return $this;
    }

    public function setContactSelectField($id, $value)
    {
        $this->setContactFields($id, $this->fetchSelectField($value));
        return $this;
    }

    public function setContactMultiSelectField($id, $value)
    {
        $this->setContactFields($id, $this->fetchMultiSelectField($value));
        return $this;
    }

    public function setLeadTextField($id, $value)
    {
        $this->setLead($id, $this->fetchTextField($value));
        return $this;
    }

    public function setLeadNumericField($id, $value)
    {
        $this->setLead($id, $this->fetchNumericField($value));
        return $this;
    }

    public function setLeadCheckBoxField($id, $value)
    {
        $this->setLead($id, $this->fetchCheckBoxField($value));
        return $this;
    }

    public function setLeadDateField($id, $value)
    {
        if (false === empty($value)) {
            $this->setLead($id, $this->fetchDateField($value));
        }

        return $this;
    }

    public function setLeadUrlField($id, $value)
    {
        $this->setLead($id, $this->fetchUrlField($value));
        return $this;
    }

    public function setLeadMultiTextField($id, $value)
    {
        $this->setLead($id, $this->fetchMultiTextField($value));
        return $this;
    }

    public function setLeadTextAreaField($id, $value)
    {
        $this->setLead($id, $this->fetchTextAreaField($value));
        return $this;
    }

    public function setLeadRadioButtonField($id, $value)
    {
        $this->setLead($id, $this->fetchRadioButtonField($value));
        return $this;
    }

    public function setLeadStreetAddressField($id, $value)
    {
        $this->setLead($id, $this->fetchStreetAddressField($value));
        return $this;
    }

    public function setLeadSmartAddressField($id, $value)
    {
        $this->setLead($id, $this->fetchSmartAddressField($value));
        return $this;
    }

    public function setLeadBirthDayField($id, $value)
    {
        $this->setLead($id, $this->fetchBirthDayField($value));
        return $this;
    }

    public function setLeadSelectField($id, $value)
    {
        $this->setLead($id, $this->fetchSelectField($value));
        return $this;
    }

    public function setLeadMultiSelectField($id, $value)
    {
        $this->setLead($id, $this->fetchMultiSelectField($value));
        return $this;
    }

    public function setLeadSale($value)
    {
        $this->setLead('sale', $value);
        return $this;
    }

    private $notePosition = 0;

    public function addNote($key, $value)
    {
        $this->notePosition++;
        $this->setData('note', "{$this->notePosition}", compact('key', 'value'));
        return $this;
    }

    public function addNoteParagraph($value = null)
    {
        $this->addNote('paragraph', isset($value) ? $value : true);
        return $this;
    }

    private function setData($type, $key, $value)
    {
        $this->data[$type][$key] = $value;
    }

    private function setForm($key, $value)
    {
        $this->setData('form', $key, $value);
    }

    private function setUtm($key, $value)
    {
        $this->setData('utm', $key, $value);
    }

    private function setContact($key, $value)
    {
        $this->setData('contact', $key, $value);
    }

    private function setContactFields($key, $value)
    {
        $this->data['contact']['fields'][$key] = $value;
    }

    private function setLead($key, $value)
    {
        $this->setData('lead', $key, $value);
    }

    private function setFormId($value)
    {
        $this->setForm('id', $value);
        return $this;
    }

    private function fetchTextField($value)
    {
        return ['type' => 'text', 'value' => $value];
    }

    private function fetchNumericField($value)
    {
        return ['type' => 'numeric', 'value' => $value];
    }

    private function fetchCheckboxField($value)
    {
        return ['type' => 'checkBox', 'value' => $value];
    }

    private function fetchDateField($value)
    {
        return ['type' => 'date', 'value' => $value];
    }

    private function fetchUrlField($value)
    {
        return ['type' => 'url', 'value' => $value];
    }

    private function fetchMultiTextField($value)
    {
        return ['type' => 'multiText', 'value' => $value];
    }

    private function fetchTextAreaField($value)
    {
        return ['type' => 'textArea', 'value' => $value];
    }

    private function fetchRadioButtonField($value)
    {
        return ['type' => 'radioButton', 'value' => $value];
    }

    private function fetchStreetAddressField($value)
    {
        return ['type' => 'streetAddress', 'value' => $value];
    }

    private function fetchSmartAddressField($value)
    {
        return ['type' => 'smartAddress', 'value' => $value];
    }

    private function fetchBirthDayField($value)
    {
        return ['type' => 'birthDay', 'value' => $value];
    }

    private function fetchSelectField($value)
    {
        return ['type' => 'select', 'value' => $value];
    }

    private function fetchMultiSelectField($value)
    {
        return ['type' => 'multiSelect', 'value' => $value];
    }

    private function getCity()
    {
        return $this->getCookie('city', 'Не определен');
    }

    private function getUserAgent()
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    private function parseBody($body)
    {
        foreach ($body as $key => &$value) {
            if (is_null($value) || $value == "null") {
                unset($body[$key]);
            } else {
                $value = is_array($value) ? $this->parseBody($value) : $value;
            }
        }
        return $body;
    }
}
