@extends('components.layouts.public')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">Calculator</h1>
            <p class="text-xl text-white/90 leading-relaxed max-w-2xl mx-auto">
                Estimate the nutrient requirements for your cultivation area.
            </p>
        </div>
    </div>
    
    <!-- Decorative elements -->
    <div class="absolute -bottom-1 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
            <path d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z" fill="#f9fafb"/>
        </svg>
    </div>
</section>

<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        {{-- Calculator Card --}}
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8">

                {{-- Input Form --}}
                <form id="calculatorForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Crop Selection --}}
                        <div>
                            <label for="crop" class="block text-sm font-medium text-gray-700">Select Crop</label>
                            <select id="crop" name="crop" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md border">
                                <option value="rice">Rice (Paddy)</option>
                                <option value="tea">Tea</option>
                                <option value="coconut">Coconut</option>
                            </select>
                        </div>

                        {{-- Land Area Input --}}
                        <div>
                            <label for="area" class="block text-sm font-medium text-gray-700">Land Area (Acres)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input type="number" name="area" id="area" class="focus:ring-green-500 focus:border-green-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-md py-2 border" placeholder="0.00" step="0.1" required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">Acres</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Calculate Button --}}
                    <div class="flex justify-end">
                        <button type="button" onclick="calculateFertilizer()" class="inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                            Calculate Requirements
                        </button>
                    </div>
                </form>

                {{-- Results Section (Hidden by default) --}}
                <div id="results" class="mt-10 hidden border-t border-gray-200 pt-8">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Estimated Fertilizer Requirements</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 text-center">
                            <span class="block text-sm font-medium text-blue-800 uppercase tracking-wide">Urea</span>
                            <span class="block mt-1 text-2xl font-bold text-blue-900" id="ureaResult">0 kg</span>
                            <span class="text-xs text-blue-600">Nitrogen Source</span>
                        </div>

                        <div class="bg-orange-50 p-4 rounded-lg border border-orange-100 text-center">
                            <span class="block text-sm font-medium text-orange-800 uppercase tracking-wide">TSP</span>
                            <span class="block mt-1 text-2xl font-bold text-orange-900" id="tspResult">0 kg</span>
                            <span class="text-xs text-orange-600">Phosphorus Source</span>
                        </div>

                        <div class="bg-red-50 p-4 rounded-lg border border-red-100 text-center">
                            <span class="block text-sm font-medium text-red-800 uppercase tracking-wide">MOP</span>
                            <span class="block mt-1 text-2xl font-bold text-red-900" id="mopResult">0 kg</span>
                            <span class="text-xs text-red-600">Potassium Source</span>
                        </div>
                    </div>

                    <p class="mt-4 text-xs text-gray-500 text-center">
                        *Disclaimer: These figures are approximate estimations based on general standards. Please consult an agricultural extension officer for precise recommendations based on your soil type.
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function calculateFertilizer() {
        // 1. Get Input Values
        const crop = document.getElementById('crop').value;
        const area = parseFloat(document.getElementById('area').value);
        const resultsDiv = document.getElementById('results');

        // Validation
        if (isNaN(area) || area <= 0) {
            alert("Please enter a valid land area.");
            return;
        }

        // 2. Define Standard Rates (Kg per Acre)
        // Note: These are example rates. You should update them with real Department of Agriculture data.
        const rates = {
            'rice':    { urea: 50, tsp: 15, mop: 20 },
            'tea':     { urea: 80, tsp: 20, mop: 30 },
            'coconut': { urea: 40, tsp: 10, mop: 50 }
        };

        // 3. Perform Calculation
        const selectedRate = rates[crop];
        const ureaNeeded = (selectedRate.urea * area).toFixed(1);
        const tspNeeded = (selectedRate.tsp * area).toFixed(1);
        const mopNeeded = (selectedRate.mop * area).toFixed(1);

        // 4. Update UI
        document.getElementById('ureaResult').innerText = ureaNeeded + ' kg';
        document.getElementById('tspResult').innerText = tspNeeded + ' kg';
        document.getElementById('mopResult').innerText = mopNeeded + ' kg';

        // Show results
        resultsDiv.classList.remove('hidden');
    }
</script>

@endsection
