<?php

namespace App\Http\Livewire;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Denuncia extends Component
{
    use WithFileUploads;

    public $message = '';
    public $usuario;

    public function resetImputFiels()
    {
        $this->message = '';
    }

    public function denunciar(){
        $this->validate([
            'message' => 'required'
        ]);
     
        $acusar = new Complaint;
        $acusar->date=now()->format('Y-m-d');
        $acusar->message=$this->message;
        $acusar->accuser=Auth::user();
        $acusar->denounced=$this->usuario;
        $acusar->save();

        $this->resetImputFiels();

        return redirect()->to('adverts/show/f?');
    }

    public function render()
    {
        return view('livewire.denuncia');
    }
}
