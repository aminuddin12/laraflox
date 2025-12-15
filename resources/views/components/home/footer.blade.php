<footer class="bg-white dark:bg-zinc-950 border-t border-zinc-200 dark:border-zinc-800 pt-16 pb-8">
    <div class="container mx-auto px-6 max-w-7xl">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8 mb-16">
            <div class="lg:col-span-2">
                <a href="#" class="flex items-center gap-2 mb-6">
                    <div class="w-8 h-8 bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 rounded-lg flex items-center justify-center">
                        <span class="iconify text-xl" data-icon="solar:bolt-bold-duotone"></span>
                    </div>
                    <span class="font-bold text-xl text-zinc-900 dark:text-white">{{ config('app.name') }}</span>
                </a>
                <p class="text-zinc-500 dark:text-zinc-400 text-sm leading-relaxed mb-8 max-w-sm">
                    Premium quality products curated for your modern lifestyle. We bring the best of fashion, electronics, and home essentials directly to your doorstep.
                </p>
                <div class="flex items-center gap-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-indigo-600 hover:text-white dark:hover:bg-indigo-500 transition-all">
                        <span class="iconify" data-icon="logos:facebook"></span>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-pink-600 hover:text-white dark:hover:bg-pink-500 transition-all">
                        <span class="iconify" data-icon="logos:instagram-icon"></span>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-sky-500 hover:text-white dark:hover:bg-sky-400 transition-all">
                        <span class="iconify" data-icon="logos:twitter"></span>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-zinc-100 dark:bg-zinc-900 flex items-center justify-center text-zinc-600 dark:text-zinc-400 hover:bg-red-600 hover:text-white dark:hover:bg-red-500 transition-all">
                        <span class="iconify" data-icon="logos:youtube-icon"></span>
                    </a>
                </div>
            </div>

            <div>
                <h3 class="font-semibold text-zinc-900 dark:text-white mb-6">Shop</h3>
                <ul class="space-y-4 text-sm text-zinc-500 dark:text-zinc-400">
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">New Arrivals</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Best Sellers</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Men's Fashion</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Women's Fashion</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Electronics</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-zinc-900 dark:text-white mb-6">Company</h3>
                <ul class="space-y-4 text-sm text-zinc-500 dark:text-zinc-400">
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Careers</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Store Locations</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Our Blog</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Reviews</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-zinc-900 dark:text-white mb-6">Support</h3>
                <ul class="space-y-4 text-sm text-zinc-500 dark:text-zinc-400">
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Contact Us</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">FAQs</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Shipping & Returns</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Order Tracking</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Privacy Policy</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-zinc-100 dark:border-zinc-800 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-xs text-zinc-400 text-center md:text-left">
                &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>
            <div class="flex items-center gap-6">
                <span class="iconify text-3xl text-zinc-300 dark:text-zinc-700" data-icon="logos:visa"></span>
                <span class="iconify text-3xl text-zinc-300 dark:text-zinc-700" data-icon="logos:mastercard"></span>
                <span class="iconify text-3xl text-zinc-300 dark:text-zinc-700" data-icon="logos:paypal"></span>
                <span class="iconify text-3xl text-zinc-300 dark:text-zinc-700" data-icon="logos:apple-pay"></span>
            </div>
        </div>
    </div>
</footer>
