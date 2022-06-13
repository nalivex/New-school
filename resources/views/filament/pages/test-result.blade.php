<x-filament::page>
  <x-filament::card>
    <h1 class="">Total de Questões: {{ $this->testeResult->test->questions->count() }} </h1>
  </x-filament::card>
  <x-filament::card>
    <h1 class="">Resutado: {{ $this->resultEnd }} </h1>
  </x-filament::card>
</x-filament::page>
