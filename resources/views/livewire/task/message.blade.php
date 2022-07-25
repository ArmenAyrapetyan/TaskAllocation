<div>
    <div class="form-floating mb-3 mt-2">
        <textarea wire:model="message" name="message"
                  class="form-control @isset($message) @if($message != '') is-valid @else is-invalid @endif @endisset
                  @error('description') is-invalid @enderror"
                  id="floatingInput"></textarea>
        <label for="floatingInput">Сообщение</label>
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn" wire:click="createMessage">Отправить сообщение</button>
    </div>
</div>
