<div>
    <button wire:click="$set('showModal', true)">ADD</button>

    <x-jet-dialog-modal wire:model="showModal">
        <form wire:submit.prevent="saveUrl" >
        <x-slot name="title">
            {{ __('New Project') }}
        </x-slot>

        <x-slot name="content">
            {{-- <div>
                {{ __('Please copy your new API token. For your security, it won\'t be shown again.') }}
            </div> --}}

            <div>
                
                    {{-- <input type="text" wire:model="url" placeholder="https://..."> --}}


                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Url</label>
                    <div class="mt-1">
                        <input type="text" wire:model.defer="url" placeholder="https://..." 
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" 
                             aria-describedby="url-description">
                    </div>
                    <p class="mt-2 text-sm text-gray-500" id="url-description">Enter the website you want to capture video from</p>
                </div>

                [{{ $resolution  }}]
                @if($resolution == '1920x1080')border border-pink-700 @endif
                <div class="flex flex-wrap">
                    <div class="p-4 m-2 w-1/3 rounded border-2 @if($resolution == '1920x1080') border-pink-600  shadow-lg @else border-gray-200 @endif ">
                        <img src="/images/720.png" wire:click="$set('resolution', '1920x1080')" alt="" class="cursor-pointer" >
                    </div>
                    <div class="p-4 m-2 w-1/3 rounded border-2 @if($resolution == '1280x720') border-pink-600 @else border-gray-200 @endif ">
                        <img src="/images/1080.png" wire:click="$set('resolution', '1280x720')" alt="" class="cursor-pointer" >
                    </div>
                    
                    <img src="/images/720.png" wire:click="$set('resolution', '1080x1920')" alt="">
                    <img src="/images/1080.png" wire:click="$set('resolution', '1280x2276')" alt="">
                </div>

               
            </div>
            {{-- <x-jet-input x-ref="plaintextToken" type="text" readonly :value="$plainTextToken"
                class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 w-full"
                autofocus autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"
                @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
            /> --}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>

            <x-jet-button wire:click="$set('showModal', false)" wire:loading.attr="disabled">
                {{ __('Next') }}
            </x-jet-button>
        </x-slot>
         </form>
    </x-jet-dialog-modal>
</div>
