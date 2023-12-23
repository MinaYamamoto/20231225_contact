<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Category;

class Modal extends Component
{
    public $showModal = false;

    public $contact;

    public $category;

    public function render()
    {
        return view('livewire.modal');
    }

    public function delete($id) {
        $contact = Contact::find($id);

        $contact->delete();
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

}
