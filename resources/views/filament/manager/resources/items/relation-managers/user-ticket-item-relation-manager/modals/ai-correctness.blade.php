<div class="fi-modal-content px-6 py-4">
    <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('AI Correctness') }}</h3>
    <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-sm mb-6">
        {!! $aiCorrectnessHtml !!}
    </div>

    <hr class="my-6 border-gray-200 dark:border-gray-700">

    @if (!empty(trim($aiRecommendationText)))
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('AI Recommendation') }}</h3>
        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-sm mb-6">
            {!! $aiRecommendationText !!}
        </div>
    @else
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('AI Recommendation') }}</h3>
        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-sm text-gray-500 dark:text-gray-400 mb-6">
            {{ __('No AI recommendation available.') }}
        </div>
    @endif

    <hr class="my-6 border-gray-200 dark:border-gray-700">

    @if (!empty(trim($itSpecialistComment)))
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('IT Specialist Comment') }}</h3>
        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-sm">
            {!! $itSpecialistComment !!}
        </div>
    @else
        <h3 class="text-xl font-bold mb-4 text-gray-900 dark:text-white">{{ __('IT Specialist Comment') }}</h3>
        <div class="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-sm text-gray-500 dark:text-gray-400">
            {{ __('No comment from IT specialist.') }}
        </div>
    @endif
</div>
