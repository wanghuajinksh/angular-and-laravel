<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];
    
    protected $guard = 'manager';

    public function setNombreAttribute($value){
        $nombre = ucwords($value);
        $this->attributes['nombre'] = $nombre;

        if(empty($this->attributes['slug'])){
            $this->attributes['slug'] = str_slug($nombre). '-' . str_random(4);
        }
    }  
        
    public function isAdmin(){
        return $this->nivel > 9;
    }

    public function isReclutador(){
        return $this->nivel < 5;
    }

    public function isAgente(){
        return $this->nivel > 5 && $this->nivel < 10 ;
    }

    public function getUserType(){
        if($this->isAdmin()){
           return 'Admin';
        }elseif ($this->isReclutador()){
            return 'Reclutador';
        }elseif($this->isAgente()){
            return 'Manager';
        }
    }

    public function getTipoUsuarioAttribute(){
        if($this->nivel == 1){
            return 'Recluatador';
        }elseif($this->nivel ==  2){
            return 'Agente / Club';
        }else{
            return 'Admin';
        }
    }
    public function getNameFormatedAttribute(){
        return $this->nombre;
    }
}
