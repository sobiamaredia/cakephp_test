<?php


namespace App\Controller;


class ContactsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function index()
    {
        $this->request->allowMethod(['get']);
        $contacts = $this->Contacts->find('all')->all();
        $this->set('contacts', $contacts);
        $this->viewBuilder()->setOption('serialize', true);
    }

    public function indexExt()
    {
        $this->request->allowMethod(['get']);
        $contacts = $this->Contacts->find('all')->contain(['Companies']);
        $this->set('contacts', $contacts);
        $this->viewBuilder()->setOption('serialize', true);
    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $contact = $this->Contacts->newEntity($this->request->getData());
        if ($this->Contacts->save($contact)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'contact' => $contact,
        ]);
        $this->viewBuilder()->setOption('serialize', ['contact', 'message']);
    }
}
