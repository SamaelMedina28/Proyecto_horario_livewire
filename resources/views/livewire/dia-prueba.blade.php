<div>
    <h1>Día actual: {{ ucfirst($diaActual) }}</h1>
    
    @if($mostrarTerminar)
        <button wire:click="siguienteDia" class="btn btn-danger mt-3">
            Terminar
        </button>
    @else
        <button wire:click="siguienteDia" class="btn btn-primary mt-3">
            Ir a {{ ucfirst($diaSiguiente) }}
        </button>
    @endif
</div>