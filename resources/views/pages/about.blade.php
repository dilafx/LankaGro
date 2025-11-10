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
                Empowering Sri Lankan farmers through innovation, sustainability, and smart technology.
            </p>
        </div>
        <div class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 w-48 h-48 bg-lime-400 rounded-full blur-3xl opacity-30 animate-pulse"></div>
    </section>

    {{-- 🌿 WHO WE ARE --}}
    <section class="py-24 px-6 bg-gradient-to-r from-lime-100 via-green-50 to-amber-100">
        <div class="max-w-5xl mx-auto text-center" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-8 text-green-800">Who We Are</h2>
            <p class="text-green-700 text-lg leading-relaxed mb-6">
                <strong>LankaGro</strong> is a student-led digital transformation initiative focused on elevating Sri Lanka’s agricultural sector through innovative, data-driven web technologies.
                Developed by a team of final-year software engineering students from <strong>The Open University of Sri Lanka</strong>, this project is part of the
                <strong>EEY4189 Software Design in Group</strong> module and represents a fusion of academic rigor, technical excellence, and social responsibility.
            </p>
            <p class="text-green-700 text-lg leading-relaxed">
                Our mission is to empower farmers—especially those in rural and underserved regions—with centralized access to agricultural knowledge, practical tools, and decision-making support.
                By integrating modern software practices with localized content delivery, <strong>LankaGro</strong> aims to bridge the digital divide and promote sustainable agricultural development.
            </p>
        </div>
    </section>

    {{-- 🌱 MISSION & VISION --}}
    <section class="py-24 px-6 bg-gradient-to-br from-green-100 via-amber-50 to-lime-100">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <img src="{{ asset('images/farmer.png') }}" alt="Farmers"
                     class="rounded-3xl shadow-2xl ring-4 ring-green-300/40">
            </div>
            <div data-aos="fade-left">
                <h2 class="text-4xl font-bold mb-6 text-green-800">Our Mission</h2>
                <p class="text-green-700 mb-8 leading-relaxed">
                    To centralize agricultural resources and tools into a single digital platform that supports Sri Lankan farmers
                    in making informed decisions, adopting modern techniques, and connecting with the wider farming community.
                </p>

                <h2 class="text-4xl font-bold mb-6 text-green-800">Our Vision</h2>
                <p class="text-green-700 leading-relaxed">
                    A digitally connected agricultural ecosystem where every farmer in Sri Lanka has the knowledge, tools,
                    and support to thrive.
                </p>
            </div>
        </div>
    </section>

    {{-- 🌾 NEW FEATURES SECTION --}}
    <section class="py-24 px-6 bg-gradient-to-r from-lime-50 via-amber-50 to-green-50 text-center">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold mb-12 text-green-800">Our New Features</h2>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach([
                    ['🤖 AI Crop Advisor','Receive personalized recommendations for crop selection and planting schedules using AI-driven insights.'],
                    ['🌦️ Weather & Soil Dashboard','Track live weather, rainfall, and soil health metrics tailored for your region.'],
                    ['💬 Community Forum','Join an interactive forum to discuss, learn, and share agricultural experiences with peers.'],
                    ['💹 Market Price Tracker','Monitor real-time market prices to make informed selling and trading decisions.'],
                    ['🌟 Success Stories','Explore inspiring stories from local farmers who grew their yields through LankaGro tools.'],
                    ['📱 Mobile-Friendly Access','Use the platform easily on smartphones, even with low internet connectivity.']
                ] as $feature)
                <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}"
                     class="bg-white p-10 rounded-3xl shadow-xl border border-green-200 hover:scale-[1.03] transition duration-300">
                    <div class="text-4xl mb-4">{{ $feature[0] }}</div>
                    <p class="text-green-700 text-lg">{{ $feature[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 💧 WHY IT MATTERS --}}
    <section class="py-24 px-6 bg-gradient-to-br from-green-200 via-lime-100 to-amber-100 text-center">
        <div class="max-w-5xl mx-auto" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-8 text-green-800">Why It Matters</h2>
            <p class="text-green-700 text-lg leading-relaxed">
                Sri Lanka’s farmers face ongoing challenges in accessing reliable information, adopting new technologies,
                and managing resources efficiently. <strong>LankaGro</strong> bridges this gap by offering a unified, responsive,
                and farmer-friendly platform that supports smarter farming, sustainable practices, and community growth.
            </p>
        </div>
    </section>

    {{-- 👥 OUR TEAM --}}
    <section class="py-24 px-6 bg-gradient-to-br from-lime-100 via-amber-50 to-green-100">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-12 text-green-800">Our Team</h2>
            <div class="flex gap-6 overflow-x-auto py-4 px-2 scrollbar-thin scrollbar-thumb-green-400 scrollbar-track-green-100">
                @foreach([
                    ['H.M.D.R Heenkenda ','Team Leader','https://randomuser.me/api/portraits/men/32.jpg'],
                    ['H.C Nawodani  ','UI/UX Designer','https://randomuser.me/api/portraits/women/68.jpg'],
                    ['W.D.K.I Senavirathna','Backend Developer','https://randomuser.me/api/portraits/men/75.jpg'],
                    ['Imalka Ireshan','Frontend Developer','https://randomuser.me/api/portraits/men/9.jpg']
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

    {{-- 📊 IMPACT COUNTERS --}}
    <section class="py-24 bg-green-50 text-center">
        <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-5xl font-bold text-green-800 counter" data-target="5000">0</h3>
                <p class="text-green-700">Farmers Empowered</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold text-green-800 counter" data-target="120">0</h3>
                <p class="text-green-700">Smart Tools Integrated</p>
            </div>
            <div>
                <h3 class="text-5xl font-bold text-green-800 counter" data-target="85">0</h3>
                <p class="text-green-700">Sustainable Projects</p>
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

// Dark Mode Toggle
const toggle = document.getElementById('darkModeToggle');
toggle.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    toggle.innerText = document.body.classList.contains('dark') ? '☀️' : '🌙';
});
</script>

{{-- 🌿 STYLE --}}
<style>
.scrollbar-thin::-webkit-scrollbar { height: 8px; }
.scrollbar-thin::-webkit-scrollbar-track { background: #d9f99d; border-radius: 10px; }
.scrollbar-thin::-webkit-scrollbar-thumb { background-color: #4ade80; border-radius: 10px; }
.scrollbar-thin { scrollbar-width: thin; scrollbar-color: #4ade80 #d9f99d; }

body.dark { background-color: #1a202c; color: #c6f6d5; }
body.dark a { color: #9ae6b4; }
body.dark .bg-white { background-color: #2d3748; color: #e2e8f0; }
</style>

@endsection
