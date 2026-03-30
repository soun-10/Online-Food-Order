<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <?php include __DIR__ . "/../components/cdns.php"; ?>
</head>

<body>
    <footer class="bg-slate-700 text-white mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- About Us -->
            <div>
                <h3 class="text-blue-400 font-bold text-xl mb-4">About Us</h3>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Online Food Order brings authentic Cambodian cuisine to your doorstep with fast, reliable delivery
                    service.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-blue-400 font-bold text-xl mb-4">Quick Links</h3>
                <ul class="space-y-3 text-gray-300 text-sm">
                    <li><a href="#home" class="hover:text-blue-400 transition">Home</a></li>
                    <li><a href="#about us" class="hover:text-blue-400 transition">About Us</a></li>
                    <li><a href="#users" class="hover:text-blue-400 transition">User</a></li>
                </ul>
            </div>

            <!-- Follow Us -->
            <div>
                <h3 class="text-blue-400 font-bold text-xl mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="https://web.facebook.com/soun.pril.2025/"
                        class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fa-brands fa-facebook-f text-white"></i>
                    </a>
                    <a href="https://t.me/SounPril"
                        class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                    <a href="https://www.instagram.com/sounpril?igsh=bW91NjZzczlxcHpk"
                        class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fa-brands fa-instagram text-white"></i>
                    </a>
                    <a href="https://wa.me/qr/AKQTQ2J6D4QVN1"
                        class="bg-blue-500 hover:bg-pink-600 transition w-10 h-10 rounded-full flex items-center justify-center">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-slate-600 py-4 text-center text-gray-400 text-sm">
            © 2026 Online Food Order. All rights reserved.
        </div>
    </footer>
</body>

</html>