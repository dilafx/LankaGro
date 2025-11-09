@extends('components.layouts.public')

@section('content')

<main class="overflow-hidden bg-gradient-to-br from-amber-50 via-lime-50 to-green-50 text-green-900">

    {{-- 🌾 HERO SECTION --}}
    <section class="relative py-28 text-center overflow-hidden hero-section">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1920&q=80"
                 class="w-full h-full object-cover opacity-25">
        </div>
        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-green-700 via-amber-600 to-lime-700 drop-shadow-md">
                About LankaGro
            </h1>
            <p class="text-lg text-green-800 leading-relaxed">
                Transforming Sri Lankan agriculture with innovation, sustainability, and technology.
            </p>
        </div>
        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 w-48 h-48 bg-amber-400 rounded-full blur-3xl opacity-30 animate-pulse"></div>
    </section>

    {{-- 🌱 MISSION SECTION --}}
    <section class="py-24 px-6 bg-gradient-to-r from-lime-100 via-green-50 to-amber-100">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            <div class="relative group">
                <div class="absolute -inset-2 bg-gradient-to-r from-lime-400 to-green-500 rounded-3xl blur-xl opacity-30 group-hover:opacity-60 transition"></div>
                <img src="{{ asset('images/farmer.png') }}" alt="Farmers"
                     class="relative rounded-3xl shadow-2xl ring-4 ring-green-300/40 group-hover:scale-[1.02] transition duration-500">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-4xl font-bold mb-6 text-green-800">
                    Our Mission & Vision
                </h2>
                <p class="text-green-700 mb-6 leading-relaxed">
                    At LankaGro, our mission is to modernize agriculture through smart digital tools and education.
                    We empower farmers to make data-informed decisions while staying rooted in sustainable traditions.
                </p>
                <p class="text-green-700 leading-relaxed">
                    Our vision is to cultivate a connected, self-sustaining agricultural ecosystem across Sri Lanka — one that grows together with the land.
                </p>
            </div>
        </div>
    </section>

    {{-- 🌾 FEATURE SECTION --}}
    <section class="py-24 px-6 bg-gradient-to-br from-green-100 via-amber-50 to-lime-100 text-center">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold mb-12 text-green-800">
                What We Offer
            </h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach([
                    ['AI Crop Assistant','Use intelligent predictions to enhance productivity and reduce risks.','images/Rice.png','from-green-400 to-lime-300'],
                    ['Smart Market Insights','Find fair prices, buyer trends, and community market analysis.','images/Tea.png','from-amber-400 to-yellow-300'],
                    ['Eco Farming Tools','Monitor soil health, irrigation levels, and eco-footprints easily.','images/coconut.png','from-lime-400 to-green-300']
                ] as $feature)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}" class="relative p-[2px] rounded-3xl shadow-xl bg-gradient-to-br {{ $feature[3] }} hover:scale-[1.02] transition">
                    <div class="bg-white rounded-3xl p-10 h-full flex flex-col items-center justify-between text-green-900">
                        <img src="{{ asset($feature[2]) }}" class="w-24 h-24 object-contain mb-6 crop-preview" data-info="{{ $feature[0] }}: {{ $feature[1] }}">
                        <h3 class="text-2xl font-semibold mb-3">{{ $feature[0] }}</h3>
                        <p class="text-sm text-green-700">{{ $feature[1] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <p id="crop-info" class="text-green-700 mt-4 text-center text-lg"></p>
        </div>
    </section>

    {{-- 🌍 SMART FARMING SOLUTIONS --}}
    <section class="py-24 bg-gradient-to-r from-green-200 via-lime-100 to-amber-100 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1505731132164-cca7b54b94a6?auto=format&fit=crop&w=1920&q=80')] opacity-10 bg-cover"></div>
        <div class="max-w-6xl mx-auto relative text-center px-6">
            <h2 class="text-4xl font-bold mb-10 text-green-800">
                Smart Farming Solutions
            </h2>
            <p class="text-green-700 mb-12 max-w-3xl mx-auto">
                LankaGro brings the power of technology directly to the field — integrating IoT, automation,
                and cloud data for precision farming that saves time, water, and resources.
            </p>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['IoT Sensors','Real-time monitoring of soil moisture, humidity, and temperature.','🌤️'],
                    ['Drone Analytics','Aerial mapping for efficient land management and pest control.','🚁'],
                    ['Smart Irrigation','AI-based water scheduling to optimize irrigation and save water.','💧']
                ] as $solution)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}" class="bg-white rounded-3xl p-8 shadow-xl hover:scale-[1.03] transition border border-green-200">
                    <div class="text-5xl mb-4">{{ $solution[2] }}</div>
                    <h3 class="text-2xl font-bold mb-3 text-green-800">{{ $solution[0] }}</h3>
                    <p class="text-green-700">{{ $solution[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

  {{-- 👥 TEAM SECTION --}}
<section class="py-24 px-6 bg-gradient-to-br from-lime-100 via-amber-50 to-green-100">
    <div class="max-w-7xl mx-auto text-center">
        <h2 class="text-4xl font-bold mb-12 text-green-800">
            Meet Our Team
        </h2>

        {{-- Horizontal Scroll Container --}}
        <div class="flex gap-6 overflow-x-auto py-4 px-2 scrollbar-thin scrollbar-thumb-green-400 scrollbar-track-green-100">
            @foreach([
                ['Sahan Perera','CEO & Founder','https://randomuser.me/api/portraits/men/32.jpg'],
                ['Nadeesha Silva','CTO','https://randomuser.me/api/portraits/women/68.jpg'],
                ['Ravindu Fernando','Head of Operations','https://randomuser.me/api/portraits/men/75.jpg'],
                ['Imalka Ireshan','Head of Operations','https://randomuser.me/api/portraits/men/9.jpg']
            ] as $member)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 150 }}"
                 class="flex-shrink-0 w-72 bg-white p-8 rounded-3xl shadow-lg border border-green-200 hover:scale-[1.05] transition duration-300">
                <img src="{{ $member[2] }}" class="w-32 h-32 rounded-full mx-auto mb-4 ring-4 ring-green-400/50 object-cover">
                <h3 class="text-xl font-semibold text-green-800">{{ $member[0] }}</h3>
                <p class="text-green-700 font-medium">{{ $member[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Optional: Custom Scrollbar Styling --}}
<style>
/* Thin Scrollbar for horizontal scroll */
.scrollbar-thin::-webkit-scrollbar {
    height: 8px;
}
.scrollbar-thin::-webkit-scrollbar-track {
    background: #d9f99d; /* green-100 */
    border-radius: 10px;
}
.scrollbar-thin::-webkit-scrollbar-thumb {
    background-color: #4ade80; /* green-400 */
    border-radius: 10px;
}
.scrollbar-thin {
    scrollbar-width: thin;
    scrollbar-color: #4ade80 #d9f99d;
}
</style>


    {{-- 📊 IMPACT COUNTERS --}}
    <section class="py-24 bg-green-50 text-center">
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-5xl font-bold text-green-800 counter" data-target="5000">0</h3>
                <p class="text-green-700">Farmers Empowered</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold text-green-800 counter" data-target="120">0</h3>
                <p class="text-green-700">Smart Sensors Deployed</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold text-green-800 counter" data-target="85">0</h3>
                <p class="text-green-700">Sustainable Farms</p>
            </div>
        </div>
    </section>

    {{-- 🌈 CALL TO ACTION --}}
    <section class="py-24 text-center bg-gradient-to-r from-green-700 via-lime-600 to-amber-500 text-white">
        <h2 class="text-4xl font-bold mb-6">Join the Future of Farming</h2>
        <p class="max-w-2xl mx-auto mb-8 text-lg text-emerald-100">
            Connect with LankaGro — where technology, nature, and community grow together.
        </p>
        <a href="{{ route('contact') }}" class="bg-white text-green-800 px-8 py-3 rounded-full font-semibold hover:bg-lime-100 transition transform hover:scale-[1.05] shadow-xl">
            Contact Us
        </a>
    </section>

    {{-- 🌙 DARK MODE TOGGLE --}}
    <button id="darkModeToggle" class="fixed bottom-6 right-6 p-3 rounded-full bg-green-700 text-white shadow-lg z-50">🌙</button>

</main>

{{-- 💡 JAVASCRIPT --}}
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
AOS.init({ duration: 1000, offset: 150 });

// Hero Parallax Effect
const hero = document.querySelector('.hero-section');
window.addEventListener('scroll', () => {
    const offset = window.scrollY * 0.3;
    hero.style.backgroundPositionY = `${offset}px`;
});

// Counters
const counters = document.querySelectorAll(".counter");
counters.forEach(counter => {
    const updateCount = () => {
        const target = +counter.getAttribute("data-target");
        const count = +counter.innerText;
        const increment = target / 200;
        if(count < target){
            counter.innerText = Math.ceil(count + increment);
            requestAnimationFrame(updateCount);
        } else {
            counter.innerText = target;
        }
    };
    updateCount();
});

// Crop Preview Info
document.querySelectorAll('.crop-preview').forEach(img => {
    img.addEventListener('mouseover', () => {
        document.getElementById('crop-info').innerText = img.getAttribute('data-info');
    });
    img.addEventListener('mouseout', () => {
        document.getElementById('crop-info').innerText = '';
    });
});

// Dark Mode Toggle
const toggle = document.getElementById('darkModeToggle');
toggle.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    toggle.innerText = document.body.classList.contains('dark') ? '☀️' : '🌙';
});
</script>

<style>
/* Dark Mode Styles */
body.dark {
    background-color: #1a202c;
    color: #c6f6d5;
}
body.dark a { color: #9ae6b4; }
body.dark .bg-white { background-color: #2d3748; }
</style>

@endsection
