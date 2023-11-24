<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class user extends Component
{
    public $title;
    public $user;
    public $jumlahPesan;
    public $pesan;
    public ?string $files;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $jumlahPesan, $pesan, $files = null, $user = null)
    {
        $this->title = $title;
        $this->user = $user;
        $this->jumlahPesan = $jumlahPesan;
        $this->pesan = $pesan;
        $this->files = $files;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user');
    }
}
