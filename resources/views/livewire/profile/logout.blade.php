<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: false);
    }
}; ?>

<a class="dropdown-item" wire:click="logout"><i
    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
    class="align-middle" >Logout</span>
</a>