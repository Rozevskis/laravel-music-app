<x-app-layout>
    <x-slot name="header" >

{{-- Search bar --}}
    <form  action="{{route('dashboard')}}" method="GET" >
        <div class="flex justify-center align-middle relative ">
            <input name="search" class="rounded-3xl w-2/5 " id="search" placeholder="Search ...">
                <button >
                    <svg  xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 30 30" class="absolute right-96 top-2 stroke-gray-100"> 
                        <path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z"></path>
                    </svg>
                </button>
            </div>
        </form>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            {{-- @foreach ($songs as $song)
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-4">
                <div class="p-6 text-gray-900">
                    <p>{{ $song->title }}</p>
                </div>
                
            </div>
            @endforeach --}}

            {{-- Playlists --}}
            {{-- @foreach ($playlists as $playlist)
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg m-4">
                <div class="p-6 text-gray-900">
                    <p>{{ $playlist->name }}</p>
                </div>
                
            </div>
            @endforeach --}}

            
              @foreach ($playlists as $playlist)
                    <div class="flex justify-center m-4">
                        <div
                            x-data="{
                                open: false,
                                toggle() {
                                    if (this.open) {
                                        return this.close()
                                    }

                                    this.$refs.button.focus()

                                    this.open = true
                                },
                                close(focusAfter) {
                                    if (! this.open) return

                                    this.open = false

                                    focusAfter && focusAfter.focus()
                                }
                            }"
                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                            x-id="['dropdown-button']"
                            class="relative w-full"
                        >
                            <!-- Button -->
                            <button
                                x-ref="button"
                                x-on:click="toggle()"
                                :aria-expanded="open"
                                type="button"
                                class=" justify-between content-between text-xl h-20 w-full flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow transition ease-in duration-500"
                            >
                               <p class=""> {{$playlist->name}}</p>
                               

                                <!-- Heroicon: chevron-down -->
                                
                                <svg xmlns="http://www.w3.org/2000/svg" class=" h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Panel -->
                            <div
                                x-ref="panel"
                                x-show="open"
                                x-transition.origin.top.left
                                
                                style="display: none;"
                                class="  left-0 mt-2 w- rounded-md bg-white shadow-md"
                            >   
                            

                            @foreach ($playlist->songs as $song)
                                <a href="#" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-6 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                    {{ $song->title }}
                                    By:  {{$song->artist}}
                                </a>
                            @endforeach

                                
                                
                            </div>
                        </div>
                    </div>
                @endforeach 
        </div>
    </div>
    
</x-app-layout>

