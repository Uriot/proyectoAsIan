<?php

namespace Laravel\Jetstream\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class NavigationMenu extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // 👇 Obtienes las categorías
        $categorias = Categoria::all();
        return view('navigation-menu', compact('categorias'));
    }
}
