@props(['data'])


@php
@endphp
<div x-data="{
    // Sets the time between each slides in milliseconds
    autoplayIntervalTime: 4000,
    slides: {{ $data }},
    currentSlideIndex: 1,
    isPaused: false,
    autoplayInterval: null,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1
        } else {
            // If it's the first slide, go to the last slide           
            this.currentSlideIndex = this.slides.length
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1
        } else {
            // If it's the last slide, go to the first slide    
            this.currentSlideIndex = 1
        }
    },
    autoplay() {
        this.autoplayInterval = setInterval(() => {
            if (!this.isPaused) {
                this.next()
            }
        }, this.autoplayIntervalTime)
    },
    // Updates interval time   
    setAutoplayInterval(newIntervalTime) {
        clearInterval(this.autoplayInterval)
        this.autoplayIntervalTime = newIntervalTime
        this.autoplay()
    },
}" x-init="autoplay" class="relative w-full overflow-hidden">

    <!-- previous button -->
    <x-secondary-button type="button"
        class="absolute left-5 top-1/2 z-20 flex -translate-y-1/2 items-center justify-center rounded-full"
        aria-label="previous slide" x-on:click="previous(), setAutoplayInterval(autoplayIntervalTime)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
            class="size-5 md:size-6 pr-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
        </svg>
    </x-secondary-button>

    <!-- next button -->
    <x-secondary-button type="button"
        class="absolute right-5 top-1/2 z-20 flex -translate-y-1/2 items-center justify-center rounded-full"
        aria-label="next slide" x-on:click="next(), setAutoplayInterval(autoplayIntervalTime)">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none"
            stroke-width="3" class="size-5 md:size-6 pl-0.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
    </x-secondary-button>
    <!-- slides -->
    <!-- Change min-h-[50svh] to your preferred height size -->
    <div class="relative min-h-[50svh] w-full">
        <template x-for="(slide, index) in slides">
            <div x-cloak x-show="currentSlideIndex == index + 1" class="absolute inset-0"
                x-transition.opacity.duration.1000ms>

                <!-- Title and description -->
                <div
                    class="from-blue-300/85 absolute inset-0 z-10 flex flex-col items-center justify-end gap-2 rounded-xl bg-gradient-to-t to-transparent px-16 py-12 text-center lg:px-32 lg:py-14">
                    <h3 class="text-balance w-full text-2xl font-bold text-black lg:w-[80%] lg:text-3xl"
                        x-text="slide.title" x-bind:aria-describedby="'slide' + (index + 1) + 'Description'"></h3>
                    <p class="text-pretty line-clamp-3 w-full text-sm text-slate-700 lg:w-1/2"
                        x-text="slide.description" x-bind:id="'slide' + (index + 1) + 'Description'"></p>
                </div>

                <img class="absolute inset-0 h-full w-full rounded-xl object-cover" x-bind:src="slide.imgSrc"
                    x-bind:alt="slide.imgAlt" />
            </div>
        </template>
    </div>

    <!-- indicators -->
    <div class="absolute bottom-3 left-1/2 z-20 flex -translate-x-1/2 gap-4 rounded-xl px-1.5 py-1 md:bottom-5 md:gap-3 md:px-2"
        role="group" aria-label="slides">
        <template x-for="(slide, index) in slides">
            <button class="size-2 cursor-pointer rounded-full transition"
                x-on:click="(currentSlideIndex = index + 1), setAutoplayInterval(autoplayIntervalTime)"
                x-bind:class="[currentSlideIndex === index + 1 ? 'bg-slate-700' : 'bg-slate-700/50']"
                x-bind:aria-label="'slide ' + (index + 1)"></button>
        </template>
    </div>
</div>
