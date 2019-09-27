<?php

namespace App\Http\Controllers;

use App\Helpers\SendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class DataController extends  Controller{
    public function getData(Request $request){
        $data = $request->all();
        $req = new SendRequest($data['form_id']);
        $req->addNote('Форма захвата', $data['catchpoint'])
            ->addNote('Профиль', $req->getPost('profile'))
            ->addNote('Ширина, мм', $req->getPost('width'))
            ->addNote('Высота, мм', $req->getPost('height'))
            ->addNote('Механизм',$req->getPost('mechanism'))
            ->addNote('Кол-во камер', $req->getPost('number'))
            ->addNote('utm_source', $req->getCookie('utm_source'))
            ->addNote('utm_medium', $req->getCookie('utm_medium'))
            ->addNote('utm_campaign', $req->getCookie('utm_campaign'))
            ->addNote('utm_content', $req->getCookie('utm_content'))
            ->addNote('utm_term', $req->getCookie('utm_term'))
            ->setLeadTextField('435875', $req->getPost('height'))
            ->setLeadTextField('435877', $req->getPost('width'))
            ->setLeadSelectField('435879', $req->getPost('profile'))
            ->setLeadSelectField('435881', $req->getPost('number'))
            ->setLeadSelectField('435883', $req->getPost('mechanism'))
            ->sendForm('localhost/public/index.php', 'crm-okna.ru' ?? null);
    }
}
