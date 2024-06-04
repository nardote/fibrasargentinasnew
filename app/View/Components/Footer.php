<?php

namespace App\View\Components;

use App\Models\Contacto;
use App\Models\Idioma;
use App\Models\Logo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $logo = Logo::all();
        $contacto = Contacto::all();
        $numeroWsp = preg_replace('/[^\d]/', '', $contacto[0]['telefono']);

        $idioma = Idioma::where('activo', 1)->first();

        if($idioma['idioma'] == 'ES'){
            

            $opcionesNavegador = [
                ['name' => 'Nosotros', 'url' => route('nosotros')],
                ['name' => 'Productos', 'url' => route('productos')],
                ['name' => 'Aplicaciones', 'url' => '#'],  
                ['name' => 'Novedades', 'url' => '#'], 
                ['name' => 'Solicitud de presupuesto', 'url' => '#'],  
                ['name' => 'Contacto', 'url' => route('contacto')],
            ];
        }else{
            $opcionesNavegador = [
                ['name' => 'Sobre nós', 'url' => route('nosotros')],
                ['name' => 'Produtos', 'url' => route('productos')],
                ['name' => 'Aplicações', 'url' => '#'],  
                ['name' => 'Novidades', 'url' => '#'], 
                ['name' => 'Solicitação de orçamento', 'url' => '#'], 
                ['name' => 'Contato', 'url' => route('contacto')],
        
            ];
        }

        return view('components.footer', ['logo' => $logo, 'contacto' => $contacto, 'numeroWsp' => $numeroWsp, 'opcionesNavegador' => $opcionesNavegador, 'idioma' => $idioma]);
    }
}
