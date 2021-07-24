<?php

namespace App\Http\Livewire;

use App\Models\usuario;
use Livewire\Component;


class gestionar_usuario extends Component
{
    public $usuario;
    public $password;
    public $user;
    public $mensaje;
    public function render()
    {
        return view('livewire.gestionar_usuario');
    }

    public function logear(){
        $this->validate(['usuario' => 'required','password' => 'required']);
        $this->user = usuario::where('usuario','=',$this->usuario) ->
        where('contraseña','=',$this->password) -> get();
        $this->user = $this->user[0];
        if($this->user->docente_cod != null){
            $this->mensaje = "Es docente";
        } else{
            $this->mensaje = "No es docente";
        }
    }
}
