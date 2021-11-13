<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository
{
    public function getAll()
    {
        $contact = Contact::orderBy('name')->where('number', 'LIKE', '%')->get()
            ->map(function ($data) {
                $this->format($data);
            });

        return $contact;
    }

    public function findById($id)
    {
        $contact = Contact::where('id', $id)->firstOrFail();

        return $this->format($contact);
    }

    public function format($contact)
    {
        return [
            'contact_id' => $contact->id,
            'name' => $contact->name,
            'phone' => $contact->number,
            'status' => $contact->active ? 'active' : 'inactive',
        ];
    }
}
