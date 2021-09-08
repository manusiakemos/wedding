<div>
    <div x-data="{
                    selected : @entangle($attributes->wire('model')),
                    options : {{$options}}
        }">
        <template x-for="i in options">
            <div>
                <input type="radio" :id="i.key" :value="i.key" x-model="selected">
                <label :for="i.key" x-text="i.value"></label>
            </div>
        </template>

    </div>
</div>
