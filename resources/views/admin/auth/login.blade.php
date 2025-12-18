<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Admin Login · Techbuds</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
            background: var(--bg-main);
            font-family: "Inter", system-ui, sans-serif;
            color: var(--text-primary);
                min-height: 100vh;
                display: flex;
            align-items: center;
                justify-content: center;
            padding: 2rem;
                position: relative;
                overflow: hidden;
            }

        .bg-svgs {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }

        .bg-svg {
            position: absolute;
            color: var(--brand-primary);
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            will-change: transform;
            opacity: 0.12;
        }

        .bg-svg-small {
            width: 40px;
            height: 40px;
        }

        .bg-svg-medium {
            width: 80px;
            height: 80px;
        }

        .password-wrapper {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-secondary);
            padding: 0.25rem;
                display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: var(--brand-primary);
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }


        .login-container {
            width: 100%;
            max-width: 420px;
                position: relative;
            z-index: 1;
            }

        .login-header {
            text-align: center;
                margin-bottom: 2.5rem;
            }

        .login-logo {
            margin-bottom: 1.5rem;
        }

        .login-logo img {
            height: 48px;
        }

        .login-header h1 {
                font-size: 1.75rem;
                font-weight: 700;
            color: var(--text-heading);
                margin-bottom: 0.5rem;
            }

        .login-header p {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .login-card {
            background: var(--bg-surface-2);
            border: 1px solid var(--border-default);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(37, 99, 235, 0.1);
            }

            .form-group {
            margin-bottom: 1.25rem;
            }

            .form-group label {
                display: block;
            font-size: 0.75rem;
                font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            }

            .form-group input {
                width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid var(--border-default);
            border-radius: 0.5rem;
            font-size: 0.95rem;
                font-family: inherit;
            color: var(--text-primary);
            background: var(--bg-surface-1);
            transition: all 0.2s ease;
            }

            .form-group input:focus {
                outline: none;
            border-color: var(--brand-primary);
                background: var(--bg-surface-2);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
            }

            .form-group input::placeholder {
            color: var(--text-muted);
            }

            .form-actions {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
            font-size: 0.875rem;
            }

            .checkbox-wrapper {
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .checkbox-wrapper input[type="checkbox"] {
                width: auto;
            accent-color: var(--brand-primary);
            }

            .checkbox-wrapper label {
                margin-bottom: 0;
                font-weight: 500;
            color: var(--text-secondary);
                cursor: pointer;
            }

            .forgot-link {
            color: var(--brand-primary);
                text-decoration: none;
                font-weight: 600;
                transition: opacity 0.2s;
            }

            .forgot-link:hover {
                opacity: 0.8;
            }

            .btn-submit {
                width: 100%;
            padding: 0.875rem;
            background: var(--brand-primary);
                color: white;
                border: none;
            border-radius: 0.5rem;
            font-size: 0.95rem;
                font-weight: 600;
                font-family: inherit;
                cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            }

            .btn-submit:hover {
            background: var(--brand-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.4);
            }

            .btn-submit:active {
                transform: translateY(0);
            }

        .error-alert {
            background: var(--color-error-soft);
            border: 1px solid var(--color-error);
            color: var(--color-error);
            padding: 0.875rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .back-link {
            display: inline-flex;
                align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--brand-primary);
        }

        @media (max-width: 640px) {
            body {
                padding: 1.5rem;
            }

            .login-card {
                padding: 1.5rem;
            }

            .login-header h1 {
                    font-size: 1.5rem;
                }

                .form-group input {
                    font-size: 16px;
                }
            }
        </style>
    </head>
    <body>
    <!-- Background SVG Icons - 19 Unique Tech Icons (Spaced Out) -->
    <div class="bg-svgs">
        <!-- 1. Monitor -->
        <svg class="bg-svg bg-svg-medium" style="top: 5%; left: 5%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25"/>
        </svg>
        <!-- 2. Server Stack -->
        <svg class="bg-svg bg-svg-medium" style="top: 15%; right: 8%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 01-3-3V6a3 3 0 013-3h13.5a3 3 0 013 3v5.25a3 3 0 01-3 3m-16.5 0a3 3 0 00-3 3v2.25a3 3 0 003 3h13.5a3 3 0 003-3v-2.25a3 3 0 00-3-3m-16.5 0V9.75"/>
        </svg>
        <!-- 3. Code Brackets -->
        <svg class="bg-svg bg-svg-medium" style="bottom: 20%; left: 6%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
        </svg>
        <!-- 4. Globe -->
        <svg class="bg-svg bg-svg-medium" style="top: 30%; right: 5%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
        </svg>
        <!-- 5. Settings Gear -->
        <svg class="bg-svg bg-svg-medium" style="bottom: 10%; right: 12%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5m-15 7.5H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21M9 12a3 3 0 106 0 3 3 0 00-6 0z"/>
        </svg>
        <!-- 6. Lightning -->
        <svg class="bg-svg bg-svg-medium" style="top: 45%; left: 3%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/>
        </svg>
        
        <!-- Small SVGs - 13 Unique Icons -->
        <!-- 7. Check Circle -->
        <svg class="bg-svg bg-svg-small" style="top: 8%; left: 25%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <!-- 8. Grid Layout -->
        <svg class="bg-svg bg-svg-small" style="top: 25%; right: 25%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
        </svg>
        <!-- 9. Database -->
        <svg class="bg-svg bg-svg-small" style="bottom: 30%; left: 20%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 003-3v-1.5a3 3 0 00-3-3h-9a3 3 0 00-3 3v1.5a3 3 0 003 3m9 0v1.5a3 3 0 01-3 3h-9a3 3 0 01-3-3v-1.5m9-9.75V5.25a3 3 0 00-3-3h-9a3 3 0 00-3 3v3.75"/>
        </svg>
        <!-- 10. Link -->
        <svg class="bg-svg bg-svg-small" style="top: 50%; left: 10%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0"/>
        </svg>
        <!-- 11. Email -->
        <svg class="bg-svg bg-svg-small" style="bottom: 25%; right: 20%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
        </svg>
        <!-- 12. Filter -->
        <svg class="bg-svg bg-svg-small" style="top: 40%; right: 15%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z"/>
        </svg>
        <!-- 13. Download -->
        <svg class="bg-svg bg-svg-small" style="bottom: 5%; left: 15%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3"/>
        </svg>
        <!-- 14. Settings -->
        <svg class="bg-svg bg-svg-small" style="top: 60%; right: 10%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z"/>
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <!-- 15. Database Server -->
        <svg class="bg-svg bg-svg-small" style="top: 20%; left: 18%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m4.5 0a12.05 12.05 0 003.478-.397M9.75 12.75a12.05 12.05 0 00-3.478-.397m0 0a12.06 12.06 0 00-4.5 0m4.5 0a12.05 12.05 0 013.478-.397"/>
        </svg>
        <!-- 16. Book -->
        <svg class="bg-svg bg-svg-small" style="top: 35%; left: 22%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
        </svg>
        <!-- 17. Sparkles -->
        <svg class="bg-svg bg-svg-small" style="bottom: 15%; left: 28%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
        </svg>
        <!-- 18. Mobile -->
        <svg class="bg-svg bg-svg-small" style="top: 55%; right: 22%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
        </svg>
        <!-- 19. Clock -->
        <svg class="bg-svg bg-svg-small" style="top: 70%; left: 28%;" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
    </div>

    <div class="login-container">
        <div class="login-header">
            <div class="login-logo text-center w-full flex justify-center items-center">
                <img src="{{ asset('images/techbuds-light.png') }}" alt="Techbuds Logo">
            </div>
            <!-- <h1>Admin Login</h1>
            <p>Access your admin dashboard</p> -->
                </div>

        <div class="login-card">
                @if($errors->any())
                <div class="error-alert">
                    {{ $errors->first() }}
                </div>
                @endif

            <form method="POST" action="{{ route('admin.login.post') }}" autocomplete="off" novalidate>
                    @csrf

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="admin@techbuds.online"
                            required
                            autocomplete="off"
                            value="{{ old('email') }}"
                        />
                    </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password"
                        />
                        <button type="button" class="password-toggle" id="passwordToggle" aria-label="Toggle password visibility">
                            <svg id="eyeIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg id="eyeSlashIcon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.29 3.29m13.42 13.42L21 21M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                </div>

                    <div class="form-actions">
                        <div class="checkbox-wrapper">
                        <input type="checkbox" id="remember" name="remember" />
                            <label for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('admin.password.request') }}" class="forgot-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn-submit">Sign In</button>
                </form>

            <a href="/" class="back-link">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to website
            </a>
        </div>
    </div>

    <script>
        // Mouse movement animation for SVG icons
        document.addEventListener('DOMContentLoaded', function() {
            const svgs = document.querySelectorAll('.bg-svg');
            const container = document.body;
            
            let mouseX = window.innerWidth / 2;
            let mouseY = window.innerHeight / 2;
            
            // Initialize all SVGs as visible
            svgs.forEach(svg => {
                svg.style.opacity = '0.12';
            });
            
            // Track mouse position
            container.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });
            
            // Animate SVGs based on mouse position
            function animateSVGs() {
                svgs.forEach((svg) => {
                    const rect = svg.getBoundingClientRect();
                    const svgX = rect.left + rect.width / 2;
                    const svgY = rect.top + rect.height / 2;
                    
                    // Calculate distance from mouse
                    const distanceX = mouseX - svgX;
                    const distanceY = mouseY - svgY;
                    const distance = Math.sqrt(distanceX * distanceX + distanceY * distanceY);
                    
                    // Maximum movement distance
                    const maxDistance = 300;
                    const maxMove = 30;
                    
                    // Calculate movement based on distance
                    const moveX = (distanceX / maxDistance) * maxMove * (1 - Math.min(distance / maxDistance, 1));
                    const moveY = (distanceY / maxDistance) * maxMove * (1 - Math.min(distance / maxDistance, 1));
                    
                    // Apply transform
                    svg.style.transform = `translate(${moveX}px, ${moveY}px) scale(${1 + (1 - Math.min(distance / maxDistance, 1)) * 0.1})`;
                    svg.style.opacity = 0.12 + (1 - Math.min(distance / maxDistance, 1)) * 0.06;
                });
                
                requestAnimationFrame(animateSVGs);
            }
            
            animateSVGs();
        });
        
        // Password toggle functionality
        document.getElementById('passwordToggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.style.display = 'none';
                eyeSlashIcon.style.display = 'block';
            } else {
                passwordInput.type = 'password';
                eyeIcon.style.display = 'block';
                eyeSlashIcon.style.display = 'none';
            }
        });
    </script>
</body>
</html>
