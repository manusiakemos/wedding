<div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden rounded-none md:rounded-lg dark:bg-gray-700 dark:text-gray-400">
    <table {{ $attributes->except('wire:sortable') }} class="min-w-full divide-y divide-gray-200 dark:bg-gray-700 dark:text-gray-400">
        <thead>
            <tr>
                {{ $head }}
            </tr>
        </thead>

        <tbody {{ $attributes->only('wire:sortable') }} class="bg-white divide-y divide-gray-200 dark:bg-gray-700 dark:text-gray-400">
            {{ $body }}
        </tbody>
    </table>
</div>
