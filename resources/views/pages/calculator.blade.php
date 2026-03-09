@extends('components.layouts.public')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <section class="relative bg-linear-to-br from-lime-600 via-lime-500 to-emerald-500 text-white py-24 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_80%,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">Calculators</h1>
                <p class="text-xl text-white/90 leading-relaxed max-w-2xl mx-auto">
                    Estimate nutrient requirements and forecast profits for your cultivation area.
                </p>
            </div>
        </div>

        <div class="absolute -bottom-1 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path
                    d="M0 0L60 10C120 20 240 40 360 46.7C480 53 600 47 720 43.3C840 40 960 40 1080 46.7C1200 53 1320 67 1380 73.3L1440 80V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0V0Z"
                    fill="#f9fafb" />
            </svg>
        </div>
    </section>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-12">


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-8">
                    <div class="mb-8 border-b border-gray-100 pb-4">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Fertilizer Requirement Calculator
                        </h2>
                        <p class="text-gray-500 mt-1">Calculate the approximate amount of Urea, TSP, and MOP needed for your
                            land.</p>
                    </div>

                    <form id="fertilizerForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="crop" class="block text-sm font-medium text-gray-700">Select Crop</label>
                                <select id="crop" name="crop"
                                    class="mt-1 block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-xl border bg-gray-50">
                                    <option value="rice">Rice (Paddy)</option>
                                    <option value="tea">Tea</option>
                                    <option value="coconut">Coconut</option>
                                </select>
                            </div>
                            <div>
                                <label for="area" class="block text-sm font-medium text-gray-700">Land Area
                                    (Acres)</label>
                                <div class="mt-1 relative rounded-xl shadow-sm">
                                    <input type="number" name="area" id="area"
                                        class="focus:ring-green-500 bg-gray-50 focus:border-green-500 block w-full pl-3 pr-16 sm:text-sm border-gray-300 rounded-xl py-2.5 border"
                                        placeholder="0.00" step="0.1" required>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm font-medium">Acres</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="calculateFertilizer()"
                                class="inline-flex justify-center py-2.5 px-6 border border-transparent shadow-sm text-sm font-semibold rounded-xl text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors">
                                Calculate Requirements
                            </button>
                        </div>
                    </form>

                    {{-- Results Section --}}
                    <div id="fertResults"
                        class="mt-10 hidden border-t border-gray-100 pt-8 bg-gray-50/50 -mx-8 -mb-8 p-8 rounded-b-2xl">

                        {{-- PDF Content Area --}}
                        <div id="fertPrintArea" class="p-6 rounded-xl" style="background-color: #ffffff;">
                            <div class="mb-6 text-center">
                                <h3 class="text-xl font-bold text-gray-900">Fertilizer Requirements Report</h3>
                                <p class="text-sm text-gray-500 mt-1" id="fertReportInfo"></p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div
                                    class="bg-white p-6 rounded-2xl shadow-sm border border-blue-100 text-center relative overflow-hidden">
                                    <div class="absolute top-0 left-0 w-full h-1 bg-blue-500"></div>
                                    <span class="block text-sm font-bold text-blue-800 uppercase tracking-wide">Urea</span>
                                    <span class="block mt-2 text-3xl font-black text-blue-900" id="ureaResult">0 kg</span>
                                    <span class="text-xs text-blue-500 mt-1 block font-medium">Nitrogen Source</span>
                                </div>
                                <div
                                    class="bg-white p-6 rounded-2xl shadow-sm border border-orange-100 text-center relative overflow-hidden">
                                    <div class="absolute top-0 left-0 w-full h-1 bg-orange-500"></div>
                                    <span class="block text-sm font-bold text-orange-800 uppercase tracking-wide">TSP</span>
                                    <span class="block mt-2 text-3xl font-black text-orange-900" id="tspResult">0 kg</span>
                                    <span class="text-xs text-orange-500 mt-1 block font-medium">Phosphorus Source</span>
                                </div>
                                <div
                                    class="bg-white p-6 rounded-2xl shadow-sm border border-red-100 text-center relative overflow-hidden">
                                    <div class="absolute top-0 left-0 w-full h-1 bg-red-500"></div>
                                    <span class="block text-sm font-bold text-red-800 uppercase tracking-wide">MOP</span>
                                    <span class="block mt-2 text-3xl font-black text-red-900" id="mopResult">0 kg</span>
                                    <span class="text-xs text-red-500 mt-1 block font-medium">Potassium Source</span>
                                </div>
                            </div>
                            <p class="mt-6 text-xs text-gray-400 text-center max-w-2xl mx-auto">
                                *Disclaimer: These figures are approximate estimations based on general standards. Please
                                consult an agricultural extension officer for precise recommendations. Generated on
                                {{ now()->format('Y-m-d') }}.
                            </p>
                        </div>

                        {{-- Download Button --}}
                        <div class="mt-6 flex justify-center">
                            <button type="button" onclick="downloadFertilizerPDF()"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-900 text-white rounded-xl hover:bg-gray-800 transition-colors text-sm font-semibold shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download Report PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-8">
                    <div class="mb-8 border-b border-gray-100 pb-4">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                            Profit Estimator
                        </h2>
                        <p class="text-gray-500 mt-1">Forecast your revenue and deduct your farming costs to estimate net
                            profit.</p>
                    </div>

                    <form id="profitForm" class="space-y-8">
                        <div>
                            <h3 class="text-sm font-bold text-emerald-600 uppercase tracking-wider mb-4">1. Expected
                                Revenue</h3>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Land Area (Acres)</label>
                                    <div class="mt-1 relative rounded-xl shadow-sm">
                                        <input type="number" id="profitArea"
                                            class="focus:ring-emerald-500 bg-gray-50 focus:border-emerald-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                            placeholder="e.g. 2.5" step="0.1" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Expected Yield <span
                                            class="text-gray-400 font-normal">(Per Acre)</span></label>
                                    <div class="mt-1 relative rounded-xl shadow-sm">
                                        <input type="number" id="yield"
                                            class="focus:ring-emerald-500 bg-gray-50 focus:border-emerald-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                            placeholder="e.g. 1500" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Est. Selling Price <span
                                            class="text-gray-400 font-normal">(Per kg)</span></label>
                                    <div class="mt-1 relative rounded-xl shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm">Rs</span>
                                        </div>
                                        <input type="number" id="price"
                                            class="focus:ring-emerald-500 bg-gray-50 focus:border-emerald-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                            placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3
                                class="text-sm font-bold text-red-500 uppercase tracking-wider mb-4 border-t border-gray-100 pt-6">
                                2. Estimated Costs</h3>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Seeds / Plants</label>
                                    <input type="number" id="seedCost"
                                        class="mt-1 focus:ring-red-500 bg-gray-50 focus:border-red-500 block w-full px-3 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                        placeholder="Rs 0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Fertilizer & Chem</label>
                                    <input type="number" id="fertCost"
                                        class="mt-1 focus:ring-red-500 bg-gray-50 focus:border-red-500 block w-full px-3 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                        placeholder="Rs 0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Labor & Machinery</label>
                                    <input type="number" id="laborCost"
                                        class="mt-1 focus:ring-red-500 bg-gray-50 focus:border-red-500 block w-full px-3 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                        placeholder="Rs 0.00">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Transport / Other</label>
                                    <input type="number" id="transportCost"
                                        class="mt-1 focus:ring-red-500 bg-gray-50 focus:border-red-500 block w-full px-3 sm:text-sm border-gray-300 rounded-xl py-2 border"
                                        placeholder="Rs 0.00">
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="button" onclick="calculateProfit()"
                                class="inline-flex justify-center py-2.5 px-6 border border-transparent shadow-sm text-sm font-semibold rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-colors">
                                Calculate Profit
                            </button>
                        </div>
                    </form>

                    {{-- Profit Results Section --}}
                    <div id="profitResults"
                        class="mt-10 hidden border-t border-gray-100 pt-8 bg-gray-900 text-white -mx-8 -mb-8 p-8 rounded-b-2xl shadow-inner">

                        {{-- PDF Content Area --}}
                        <div id="profitPrintArea" class="p-6 rounded-xl" style="background-color: #111827;">
                            <h3 class="text-xl font-bold text-gray-100 mb-2 border-b border-gray-700 pb-2 text-center">
                                Financial Summary Report</h3>
                            <p class="text-gray-400 text-sm text-center mb-6" id="profitReportInfo"></p>

                            <div class="flex flex-col md:flex-row justify-between items-center gap-8">
                                <div class="w-full md:w-1/2 space-y-4">
                                    <div
                                        class="flex justify-between items-center bg-gray-800 p-4 rounded-xl border border-gray-700">
                                        <span class="text-gray-400 font-medium text-sm">Total Revenue</span>
                                        <span class="text-lg font-bold text-emerald-400" id="totalRevenueResult">Rs
                                            0.00</span>
                                    </div>
                                    <div
                                        class="flex justify-between items-center bg-gray-800 p-4 rounded-xl border border-gray-700">
                                        <span class="text-gray-400 font-medium text-sm">Total Costs</span>
                                        <span class="text-lg font-bold text-red-400" id="totalCostResult">- Rs 0.00</span>
                                    </div>
                                </div>

                                <div
                                    class="w-full md:w-1/2 flex flex-col items-center justify-center p-6 bg-gray-800 rounded-2xl border border-gray-700 text-center">
                                    <span
                                        class="text-gray-400 font-medium uppercase tracking-widest text-sm mb-2">Projected
                                        Net Profit</span>
                                    <span id="netProfitResult" class="block mt-1 text-3xl font-black text-white">Rs
                                        0.00</span>
                                    <span id="profitMessage" class="text-sm mt-3 font-medium"></span>
                                </div>
                            </div>
                        </div>

                        {{-- Download Button --}}
                        <div class="mt-6 flex justify-center">
                            <button type="button" onclick="downloadProfitPDF()"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-emerald-600 text-white rounded-xl hover:bg-emerald-500 transition-colors text-sm font-semibold shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download Financial PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function downloadFertilizerPDF() {
            // Initialize jsPDF
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Fetch current values from the DOM
            const cropSelect = document.getElementById('crop');
            const cropName = cropSelect.options[cropSelect.selectedIndex].text;
            const area = document.getElementById('area').value;
            const urea = document.getElementById('ureaResult').innerText;
            const tsp = document.getElementById('tspResult').innerText;
            const mop = document.getElementById('mopResult').innerText;
            const date = new Date().toLocaleDateString();

            // Draw PDF Content
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(20);
            doc.text('Fertilizer Requirements Report', 20, 20);

            doc.setFontSize(12);
            doc.setFont('helvetica', 'normal');
            doc.setTextColor(100, 100, 100); // Gray text
            doc.text(`Generated on: ${date}`, 20, 30);

            // Add a line separator
            doc.setDrawColor(200, 200, 200);
            doc.line(20, 35, 190, 35);

            // Details
            doc.setTextColor(0, 0, 0); // Black text
            doc.setFont('helvetica', 'bold');
            doc.text('Cultivation Details:', 20, 45);

            doc.setFont('helvetica', 'normal');
            doc.text(`Selected Crop: ${cropName}`, 20, 55);
            doc.text(`Land Area: ${area} Acres`, 20, 65);

            // Fertilizer Results
            doc.setFont('helvetica', 'bold');
            doc.text('Recommended Fertilizers:', 20, 85);

            doc.setFont('helvetica', 'normal');
            doc.text(`Urea (Nitrogen Source): ${urea}`, 20, 95);
            doc.text(`TSP (Phosphorus Source): ${tsp}`, 20, 105);
            doc.text(`MOP (Potassium Source): ${mop}`, 20, 115);

            // Disclaimer Footer
            doc.setFontSize(10);
            doc.setTextColor(150, 150, 150);
            doc.text('*Disclaimer: These figures are approximate estimations based on general standards.', 20, 140);
            doc.text('Please consult an agricultural extension officer for precise recommendations.', 20, 145);

            // Save the PDF
            doc.save('Fertilizer_Report.pdf');
        }

        function downloadProfitPDF() {
            // Initialize jsPDF
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Fetch current values from the DOM
            const area = document.getElementById('profitArea').value || '0';
            const yieldPerAcre = document.getElementById('yield').value || '0';
            const price = document.getElementById('price').value || '0';
            const revenue = document.getElementById('totalRevenueResult').innerText;
            const cost = document.getElementById('totalCostResult').innerText;
            const profit = document.getElementById('netProfitResult').innerText;
            const message = document.getElementById('profitMessage').innerText;
            const date = new Date().toLocaleDateString();

            // Draw PDF Content
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(20);
            doc.text('Financial Summary Report', 20, 20);

            doc.setFontSize(12);
            doc.setFont('helvetica', 'normal');
            doc.setTextColor(100, 100, 100);
            doc.text(`Generated on: ${date}`, 20, 30);

            // Line separator
            doc.setDrawColor(200, 200, 200);
            doc.line(20, 35, 190, 35);

            // Input Data
            doc.setTextColor(0, 0, 0);
            doc.setFont('helvetica', 'bold');
            doc.text('Estimation Inputs:', 20, 45);

            doc.setFont('helvetica', 'normal');
            doc.text(`Land Area: ${area} Acres`, 20, 55);
            doc.text(`Expected Yield: ${yieldPerAcre} kg / Acre`, 20, 65);
            doc.text(`Est. Selling Price: Rs ${price} / kg`, 20, 75);

            // Line separator
            doc.line(20, 85, 190, 85);

            // Financial Results
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(14);
            doc.text('Financial Breakdown:', 20, 95);

            doc.setFontSize(12);
            doc.setFont('helvetica', 'normal');
            doc.text('Total Estimated Revenue:', 20, 110);
            doc.text(`${revenue}`, 120, 110);

            doc.text('Total Estimated Costs:', 20, 120);
            doc.setTextColor(220, 38, 38); // Red color for costs
            doc.text(`${cost}`, 120, 120);

            // Net Profit Background & Text
            doc.setDrawColor(0, 0, 0);
            doc.line(20, 130, 190, 130);

            doc.setTextColor(0, 0, 0);
            doc.setFont('helvetica', 'bold');
            doc.text('Projected Net Profit:', 20, 145);

            // Check if profit is negative or positive to set color
            if (message.includes('profitable') || profit.includes('Rs') && !profit.includes('-')) {
                doc.setTextColor(16, 185, 129); // Emerald Green
            } else {
                doc.setTextColor(220, 38, 38); // Red
            }
            doc.setFontSize(16);
            doc.text(`${profit}`, 120, 145);

            // Status message
            doc.setFontSize(11);
            doc.setFont('helvetica', 'italic');
            doc.text(`Status: ${message}`, 20, 160);

            // Save the PDF
            doc.save('Financial_Summary.pdf');
        }


        function calculateFertilizer() {
            const cropSelect = document.getElementById('crop');
            const cropName = cropSelect.options[cropSelect.selectedIndex].text;
            const area = parseFloat(document.getElementById('area').value);
            const resultsDiv = document.getElementById('fertResults');

            if (isNaN(area) || area <= 0) {
                alert("Please enter a valid land area for fertilizer calculation.");
                return;
            }

            const rates = {
                'rice': {
                    urea: 50,
                    tsp: 15,
                    mop: 20
                },
                'tea': {
                    urea: 80,
                    tsp: 20,
                    mop: 30
                },
                'coconut': {
                    urea: 40,
                    tsp: 10,
                    mop: 50
                }
            };

            const selectedRate = rates[cropSelect.value];
            const ureaNeeded = (selectedRate.urea * area).toFixed(1);
            const tspNeeded = (selectedRate.tsp * area).toFixed(1);
            const mopNeeded = (selectedRate.mop * area).toFixed(1);

            document.getElementById('ureaResult').innerText = ureaNeeded + ' kg';
            document.getElementById('tspResult').innerText = tspNeeded + ' kg';
            document.getElementById('mopResult').innerText = mopNeeded + ' kg';

            // Add Info for the PDF Report
            document.getElementById('fertReportInfo').innerText = `Crop: ${cropName} | Land Area: ${area} Acres`;

            resultsDiv.classList.remove('hidden');
        }



        function calculateProfit() {
            const area = parseFloat(document.getElementById('profitArea').value) || 0;
            const yieldPerAcre = parseFloat(document.getElementById('yield').value) || 0;
            const price = parseFloat(document.getElementById('price').value) || 0;

            const seedCost = parseFloat(document.getElementById('seedCost').value) || 0;
            const fertCost = parseFloat(document.getElementById('fertCost').value) || 0;
            const laborCost = parseFloat(document.getElementById('laborCost').value) || 0;
            const transportCost = parseFloat(document.getElementById('transportCost').value) || 0;

            if (area <= 0 || yieldPerAcre <= 0 || price <= 0) {
                alert("Please ensure Area, Expected Yield, and Selling Price are greater than 0.");
                return;
            }

            const totalRevenue = area * yieldPerAcre * price;
            const totalCosts = seedCost + fertCost + laborCost + transportCost;
            const netProfit = totalRevenue - totalCosts;

            const formatRs = (num) => 'Rs ' + num.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

            document.getElementById('totalRevenueResult').innerText = formatRs(totalRevenue);
            document.getElementById('totalCostResult').innerText = '- ' + formatRs(totalCosts);

            const profitEl = document.getElementById('netProfitResult');
            const messageEl = document.getElementById('profitMessage');

            profitEl.innerText = formatRs(netProfit);

            if (netProfit > 0) {
                profitEl.className = "block mt-1 text-3xl font-black text-emerald-400";
                messageEl.innerText = "Looks profitable! Keep a close eye on your actual costs.";
                messageEl.className = "text-sm mt-3 font-medium text-emerald-400/80";
            } else if (netProfit < 0) {
                profitEl.className = "block mt-1 text-3xl font-black text-red-400";
                messageEl.innerText = "Warning: Estimated costs exceed potential revenue.";
                messageEl.className = "text-sm mt-3 font-medium text-red-400/80";
            } else {
                profitEl.className = "block mt-1 text-3xl font-black text-gray-300";
                messageEl.innerText = "Break-even point. Revenue exactly matches costs.";
                messageEl.className = "text-sm mt-3 font-medium text-gray-400";
            }

            // Add Info for the PDF Report
            document.getElementById('profitReportInfo').innerText =
                `Based on ${area} Acres | Yield: ${yieldPerAcre} kg/Acre | Price: Rs ${price}/kg`;

            document.getElementById('profitResults').classList.remove('hidden');
        }
    </script>
@endsection
