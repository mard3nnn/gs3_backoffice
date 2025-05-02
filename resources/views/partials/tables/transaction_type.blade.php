@if($value == 0)
    <i class="fas fa-arrow-down text-success"></i>
    Entrada
@elseif($value == 1)
    <i class="fas fa-arrow-up text-danger"></i>
    Saída
@else
    <i class="fas fa-sync-alt text-info"></i>
    Estorno
@endif
