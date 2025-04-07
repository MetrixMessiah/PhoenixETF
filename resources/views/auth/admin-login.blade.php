<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhoenixETF - Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/framer-motion@10.16.4/dist/framer-motion.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        .particle-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .neon-border {
            box-shadow: 0 0 10px rgba(139, 92, 246, 0.5), 
                        0 0 20px rgba(139, 92, 246, 0.3), 
                        0 0 30px rgba(139, 92, 246, 0.1);
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .glow {
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from { box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #8b5cf6, 0 0 20px #8b5cf6, 0 0 25px #8b5cf6; }
            to { box-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #8b5cf6, 0 0 40px #8b5cf6, 0 0 50px #8b5cf6; }
        }
        
        .rotate {
            animation: rotate 10s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center">
    <!-- Particle Background -->
    <div id="particles-js" class="particle-bg"></div>
    
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto">
            <!-- Logo -->
            <div class="text-center mb-8 floating">
                <h1 class="text-4xl font-bold text-purple-500 glow">PhoenixETF</h1>
                <p class="text-gray-400 mt-2">Admin Portal</p>
            </div>
            
            <!-- Login Card -->
            <div class="bg-gray-800 rounded-lg p-8 neon-border">
                <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>
                
                @if(session('error'))
                    <div class="bg-red-900 text-white p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email</label>
                        <input type="email" id="email" name="email" required 
                               class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <input type="password" id="password" name="password" required 
                               class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" name="remember" 
                                   class="h-4 w-4 text-purple-500 focus:ring-purple-500 border-gray-600 rounded bg-gray-700">
                            <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                        </div>
                        
                        <a href="{{ route('admin.password.request') }}" class="text-sm text-purple-400 hover:text-purple-300">
                            Forgot password?
                        </a>
                    </div>
                    
                    <div>
                        <button type="submit" 
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-300">
                            Sign in
                        </button>
                    </div>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400">
                        Restricted access. Contact system administrator for credentials.
                    </p>
                </div>
            </div>
            
            <!-- Security Notice -->
            <div class="mt-8 text-center">
                <div class="inline-flex items-center text-sm text-purple-400">
                    <svg class="w-4 h-4 mr-1 rotate" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span>Secure admin access</span>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Initialize particles.js with different color
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#8b5cf6'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.5,
                    random: false
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#8b5cf6',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'grab'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    grab: {
                        distance: 140,
                        line_linked: {
                            opacity: 1
                        }
                    },
                    push: {
                        particles_nb: 4
                    }
                }
            },
            retina_detect: true
        });
    </script>
</body>
</html> 