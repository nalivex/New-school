<x-filament::page>
  <x-filament::card>
    <h1>{{ $this->question->text }}</h1>
    <form wire:submit.prevent='submit'>
      <div class="flex flex-col">

        @foreach ($this->question->answers as $answer)
          <div>
            <input type="radio" wire:model.defer='answerId' name="answerId" value="{{ $answer->id }}">
            <label for="answer">{{ $answer->letter }}) {{ $answer->text }}</label>
          </div>
        @endforeach
      </div>

      <div class="flex justify-end">
        <x-filament::button type="submit">Salvar</x-filament::button>
      </div>
    </form>

  </x-filament::card>
</x-filament::page>
