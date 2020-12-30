<?php


namespace App\Model\Table;


use Cake\ORM\Table;

class ContactsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->belongsTo('Companies')
            ->setForeignKey('company_id')
            ->setJoinType('INNER');
    }
}
