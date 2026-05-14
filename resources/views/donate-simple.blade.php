<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - Awaken ClimAlliance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .payment-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .payment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .payment-card.selected {
            border: 2px solid #22c55e;
            background-color: #f0fdf4;
        }
        .amount-btn {
            transition: all 0.3s ease;
        }
        .amount-btn.active {
            background-color: #15803d;
            color: white;
            border-color: #15803d;
        }
    </style>
</head>
<body class="bg-gray-50">

@include('components.navbar')

<!-- Donate Header -->
<section class="relative bg-gradient-to-r from-green-900 via-green-800 to-green-700 text-white pt-24 md:pt-32 pb-16 md:pb-20 overflow-hidden">
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <span class="inline-block px-4 py-1 bg-yellow-500 text-green-900 rounded-full text-sm font-semibold mb-6">🤝 Support Our Work</span>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-4">Make a <span class="text-yellow-300">Donation</span></h1>
        <div class="w-24 h-1 bg-yellow-500 mx-auto rounded-full mb-6"></div>
        <p class="text-lg md:text-xl max-w-3xl mx-auto">Your support helps us empower youth and protect our planet for future generations.</p>
    </div>
</section>

<!-- Donation Section -->
<section class="py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-4">
        
        <!-- Payment Methods Cards -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-8">Choose <span class="gradient-text">Payment Method</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Easypaisa Card -->
                <div class="payment-card bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition" data-payment="easypaisa">
                    <div class="w-20 h-20 mx-auto bg-orange-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-3xl text-orange-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Easypaisa</h3>
                    <p class="text-gray-500 text-sm mb-3">Scan QR code or send to</p>
                    <p class="text-lg font-semibold text-green-600">03466835267</p>
                    <p class="text-xs text-gray-400 mt-2">Account Holder: Asif Ali</p>
                </div>
                
                <!-- JazzCash Card -->
                <div class="payment-card bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition" data-payment="jazzcash">
                    <div class="w-20 h-20 mx-auto bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-3xl text-red-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">JazzCash</h3>
                    <p class="text-gray-500 text-sm mb-3">Scan QR code or send to</p>
                    <p class="text-lg font-semibold text-green-600">03466835267</p>
                    <p class="text-xs text-gray-400 mt-2">Account Holder: Asif Ali</p>
                </div>
                
                <!-- Bank Account Card -->
                <div class="payment-card bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-xl transition" data-payment="bank">
                    <div class="w-20 h-20 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-university text-3xl text-blue-500"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Bank Account</h3>
                    <p class="text-gray-500 text-sm mb-3">Direct bank transfer</p>
                    <p class="text-md font-semibold text-gray-700">Bank: ALFALAH </p>
                    <p class="text-sm text-gray-600">Account: 055-810107937-73</p>
                    <p class="text-xs text-gray-400 mt-2">IBAN: PK07ALFH0558001010793773</p>
                </div>
            </div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Left Column - Impact Info -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-seedling text-2xl text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Your Impact</h3>
                            <p class="text-gray-600">See how your donation helps</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$10 / Rs. 2,800</span>
                            <span class="text-gray-600">Plants 50 trees</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$50 / Rs. 14,000</span>
                            <span class="text-gray-600">Supports 5 youth workshops</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$100 / Rs. 28,000</span>
                            <span class="text-gray-600">Funds 1 awareness campaign</span>
                        </div>
                        <div class="flex justify-between items-center pb-2 border-b">
                            <span class="text-gray-700">$500 / Rs. 140,000</span>
                            <span class="text-gray-600">Sponsors 1 community project</span>
                        </div>
                    </div>
                </div>
                
                <!-- QR Code Section (Hidden initially, shows when payment method selected) -->
                <div id="qr-section" class="bg-white rounded-2xl shadow-lg p-6 text-center hidden">
                    <h3 class="text-lg font-bold text-gray-800 mb-3">Scan to Pay</h3>
                    <div class="bg-gray-100 w-48 h-48 mx-auto rounded-xl flex items-center justify-center">
                        <i class="fas fa-qrcode text-6xl text-gray-400"></i>
                    </div>
                    <p class="text-sm text-gray-500 mt-3">Scan QR code with your mobile banking app</p>
                </div>
            </div>
            
            <!-- Right Column - Donation Form -->
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Make a Donation</h2>
                
                @if(session('donation_success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded-lg mb-6">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-500"></i>
                            <span>{{ session('donation_success') }}</span>
                        </div>
                    </div>
                @endif
                
                <form action="{{ route('donate.submit') }}" method="POST">
                    @csrf
                    
                    <!-- Selected Payment Method Field -->
                    <input type="hidden" name="payment_method" id="payment_method" value="">
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-3">Select Amount</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="10">$10</button>
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="25">$25</button>
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="50">$50</button>
                            <button type="button" class="amount-btn border-2 border-gray-300 rounded-lg py-2 px-4 text-gray-700 font-semibold hover:bg-green-600 hover:text-white hover:border-green-600 transition" data-amount="100">$100</button>
                        </div>
                        <div class="mt-3">
                            <label class="block text-gray-600 text-sm mb-1">Or enter custom amount</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">$</span>
                                <input type="number" name="amount" id="custom_amount" class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Enter amount">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Full Name *</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Email Address *</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                        <input type="tel" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-2">Message (Optional)</label>
                        <textarea name="message" rows="3" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Any special instructions or message?"></textarea>
                    </div>
                    
                    <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-green-700 text-white py-3 rounded-xl font-semibold hover:from-green-700 hover:to-green-800 transition-all duration-300 hover:scale-105 shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-heart"></i> Donate Now
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-white pt-12 md:pt-16 pb-6 md:pb-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="text-center md:text-left">
                <div class="flex justify-center md:justify-start items-center space-x-3 mb-4">
                    <i class="fas fa-leaf text-2xl text-green-500"></i>
                    <div>
                        <div class="text-xl font-bold">AWAKEN</div>
                        <div class="text-xs text-gray-400">CLIMALLIANCE</div>
                    </div>
                </div>
                <p class="text-gray-400 text-sm">A youth-led climate initiative working with communities for a just, resilient, and sustainable future.</p>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="/" class="hover:text-green-400 transition">Home</a></li>
                    <li><a href="/about" class="hover:text-green-400 transition">About Us</a></li>
                    <li><a href="/projects" class="hover:text-green-400 transition">Projects</a></li>
                    <li><a href="/events" class="hover:text-green-400 transition">Events</a></li>
                    <li><a href="/blog" class="hover:text-green-400 transition">Blog</a></li>
                </ul>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-lg font-bold mb-4">Contact</h4>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><i class="fas fa-envelope mr-2"></i> info@awakenclimalliance.org</li>
                    <li><i class="fas fa-phone mr-2"></i> +92 300 1234567</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i> Gilgit-Baltistan, Pakistan</li>
                </ul>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-lg font-bold mb-4">Newsletter</h4>
                <p class="text-gray-400 text-sm mb-3">Stay updated with our latest news.</p>
                <form action="/subscribe" method="POST" class="flex flex-col sm:flex-row gap-2">
                    @csrf
                    <input type="email" name="email" placeholder="Your email" class="px-4 py-2 rounded-lg w-full text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    <button type="submit" class="bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm whitespace-nowrap">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Awaken ClimAlliance. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    // Amount selection
    const amountBtns = document.querySelectorAll('.amount-btn');
    const customAmount = document.getElementById('custom_amount');
    
    amountBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            amountBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            customAmount.value = this.getAttribute('data-amount');
        });
    });
    
    // Payment method selection
    const paymentCards = document.querySelectorAll('.payment-card');
    const paymentMethodInput = document.getElementById('payment_method');
    const qrSection = document.getElementById('qr-section');
    
    paymentCards.forEach(card => {
        card.addEventListener('click', function() {
            paymentCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            const method = this.getAttribute('data-payment');
            paymentMethodInput.value = method;
            
            // Show QR section
            qrSection.classList.remove('hidden');
            
            // Update QR text based on method
            const qrText = qrSection.querySelector('p');
            if (method === 'easypaisa') {
                qrText.innerHTML = 'Scan QR code with Easypaisa app';
            } else if (method === 'jazzcash') {
                qrText.innerHTML = 'Scan QR code with JazzCash app';
            } else {
                qrText.innerHTML = 'Bank account details above';
            }
        });
    });
</script>

</body>
</html>