<div>
    <x-header title="{{ $survey->surveycode }}">
        <x-slot:actions>
            <x-button label="Als PDF drucken" wire:click="generateEvaluationPDF" class="btn-warning mx-10" icon="o-check"  />
        </x-slot:actions>
    </x-header>
</div>
