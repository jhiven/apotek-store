<x-app-layout>
   
<x-carousel
    
        data="[{
            imgSrc: '{{ asset('doctor.jpg')}}',
            imgAlt: '{{'doctor'}}',
            title: '{{ 'Rekomendasi Produk yang Dipersonalisasi' }}',
            description: '{{ ' Dapatkan rekomendasi produk yang dipersonalisasi berdasarkan riwayat kesehatan dan preferensi Anda. Kami akan membantu Anda menemukan obat-obatan dan produk-produk kesehatan yang sesuai dengan kebutuhan Anda secara individual.' }}',
            
        },
        {
            imgSrc: '{{ asset('medicine.jpg') }}',
            imgAlt: '{{ 'medicine.png' }}',
            title: '{{' Komitmen pada Keberlanjutan dan Kualitas' }}',
            description: '{{'Kami berkomitmen untuk menjaga keberlanjutan dan kualitas produk kami. Dengan memilih apotek online kami, Anda tidak hanya merawat kesehatan Anda sendiri, tetapi juga membantu menjaga kesehatan planet ini dengan mendukung praktik bisnis yang bertanggung jawab.' }}',
            
        },
        {
            imgSrc: '{{ asset('drug.jpg') }}',
            imgAlt: '{{'drug.png'}}',
            title: '{{'Pilihan Obat Lengkap dan Terpercaya'}}',
            description: '{{' Temukan beragam obat dari merek terkemuka dan produk-produk kesehatan berkualitas tinggi di apotek online kami. Kami menawarkan pilihan yang luas untuk memenuhi kebutuhan kesehatan Anda.'}}',
        },
    
    ]"></x-carousel>
    
    <p class="mt-8 text-2xl font-medium">Obat jenis tablet</p>
    <div class="mt-2 grid grid-cols-5 gap-3">
        @foreach ($drugs->where('jenis', 'Tablet')->take(5) as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>

    <p class="mt-8 text-2xl font-medium">Obat jenis sirup</p>
    <div class="mt-2 grid grid-cols-5 gap-3">
        @foreach ($drugs->where('jenis', 'Sirup')->take(5) as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>

    <p class="mt-8 text-2xl font-medium">Obat jenis serbuk</p>
    <div class="mt-2 grid grid-cols-5 gap-3">
        @foreach ($drugs->where('jenis', 'Serbuk')->take(5) as $drug)
            <x-card src="{{ $drug->image_url }}" href="{{ route('obat.show', $drug->id) }}">
                <x-slot:title>
                    {{ $drug->nama }}
                </x-slot>
                {{ $drug->deskripsi }}
            </x-card>
        @endforeach
    </div>

</x-app-layout>
