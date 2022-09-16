<div>
    @if($responce)
        <p>{{ $responce }}</p>
    @endif
    <p>Токен: {{ $token }}</p>
    <div class="form-floating mb-3">
        <input wire:model="rate_per_hour" name="rate_per_hour" type="number" min="0"
               class="form-control @isset($rate_per_hour) @if($rate_per_hour != '') is-valid @else is-invalid @endif @endisset
               @error('rate_per_hour') is-invalid @enderror"
               id="floatingInput">
        <label for="floatingInput">Ставка в час</label>
        @error('post')
        <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        <button wire:click="newToken()" type="button" class="btn btn-primary">
            Новый токен
        </button>
        <button wire:click="activateToken()" type="button" class="btn btn-primary">
            Активировать токен
        </button>
    </div>
</div>
