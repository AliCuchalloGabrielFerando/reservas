<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Software;

class SoftwareC extends Component
{
    protected $software;
    public function render()
    {
        return view('livewire.software', ['software' => Software::where('id','=','1')->get()]);
    }
}
