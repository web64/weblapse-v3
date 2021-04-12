<div>
    <button wire:click="$set('showModal', true)">ADD</button>

    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ __('New Project') }}
        </x-slot>

        @if ($step === 1)
        <form wire:submit.prevent="saveUrl" >
        

        <x-slot name="content">
            {{-- <div>
                {{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}
            </div> --}}

            <div>
                
                    {{-- <input type="text" wire:model="url" placeholder="https://..."> --}}


                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Url</label>
                    <div class="mt-1">
                        <input type="text" wire:model="url" placeholder="https://..." 
                            autofocus
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" 
                             aria-describedby="url-description">
                    </div>
                    <p class="mt-2 text-sm text-gray-500" id="url-description">Enter the website you want to capture video from</p>
                    @error('url') <span class="error text-red-700">{{ $message }}</span> @enderror

                </div>

                [{{ $selectedResolution  }}]


                <p class="block text-sm font-medium text-gray-700">Video resolution</p>
                <p class="mt-2 text-sm text-gray-500" id="url-description">Select the website captire orientation and resolution.</p>
                @error('selectedResolution') <span class="error text-red-700">{{ $message }}</span> @enderror

                <div class="flex flex-wrap justify-center">
                    @foreach ($resolutions as $resolution)
                        <div class="p-4 m-2 w-1/3 rounded border-2 @if($selectedResolution == $resolution->dimensions ) border-pink-600  shadow-lg @else border-gray-200 @endif ">
                            <img src="{{ $resolution->image  }}" wire:click="$set('selectedResolution', '{{ $resolution->dimensions }}')" alt="" class="cursor-pointer" >
                            <p>{{ $resolution->dimensions }}</p>
                            <p>{{ $resolution->orientation }}</p>
                        </div>
                    @endforeach
                </div>

                

               
            </div>
            {{-- <x-jet-input x-ref="plaintextToken" type="text" readonly :value="$plainTextToken"
                class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 w-full"
                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
            /> --}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="step1()" wire:loading.attr="disabled">
                {{ __('Next') }}
            </x-jet-button>
        </x-slot>
        </form>
        @elseif ($step === 2)
            <x-slot name="content">
                <p> sdf sdf sdf Step 2</p>
                <select wire:model="selectedInterval">
                    @foreach($intervals as $interval)
                        <option value="{{ $interval->slug }}" @if($interval->id < 3) disabled @endif >{{ $interval->name }}</option>
                    @endforeach
                </select>
                <pre>{{ print_r($interval->toArray(), true) }}</pre>
            </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal()" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="$set('step', 2)" wire:loading.attr="disabled">
                {{ __('Next') }}
            </x-jet-button>
        </x-slot>
        @endif
    </x-jet-dialog-modal>
</div>
