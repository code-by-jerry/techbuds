<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reset Password · Techbuds Admin</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
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
            background: #FFFDF6;
            font-family: "Instrument Sans", system-ui, sans-serif;
            color: #11224E;
                min-height: 100vh;
                display: flex;
            align-items: center;
                justify-content: center;
            padding: 2rem;
                position: relative;
                overflow: hidden;
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
            color: #11224E;
                margin-bottom: 0.5rem;
            }

        .login-header p {
            font-size: 0.9rem;
            color: rgba(8,131,149,0.7);
        }

        .login-card {
            background: white;
            border: 1px solid rgba(8,131,149,0.1);
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(8,131,149,0.08);
            }

            .form-group {
            margin-bottom: 1.25rem;
            }

            .form-group label {
                display: block;
            font-size: 0.75rem;
                font-weight: 600;
            color: #11224E;
            margin-bottom: 0.5rem;
            }

            .form-group input {
                width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid rgba(8,131,149,0.15);
            border-radius: 0.5rem;
            font-size: 0.95rem;
                font-family: inherit;
            color: #11224E;
            background: #FFFDF6;
            transition: all 0.2s ease;
            }

            .form-group input:focus {
                outline: none;
            border-color: #088395;
                background: white;
            box-shadow: 0 0 0 3px rgba(8,131,149,0.1);
            }

            .form-group input::placeholder {
            color: rgba(8,131,149,0.4);
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
            color: rgba(8,131,149,0.6);
            padding: 0.25rem;
                display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #088395;
        }

        .password-toggle svg {
            width: 20px;
            height: 20px;
        }

            .btn-submit {
                width: 100%;
            padding: 0.875rem;
            background: #11224E;
                color: white;
                border: none;
            border-radius: 0.5rem;
            font-size: 0.95rem;
                font-weight: 600;
                font-family: inherit;
                cursor: pointer;
            transition: all 0.2s ease;
            margin-bottom: 1.5rem;
            }

            .btn-submit:hover {
            background: #088395;
            transform: translateY(-1px);
            }

            .btn-submit:active {
                transform: translateY(0);
            }

        .error-alert {
            background: #FEE2E2;
            border: 1px solid #FCA5A5;
            color: #DC2626;
            padding: 0.875rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .success-alert {
            background: #D1FAE5;
            border: 1px solid #86EFAC;
            color: #065F46;
            padding: 0.875rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .back-link {
            display: inline-flex;
                align-items: center;
            gap: 0.5rem;
            color: rgba(8,131,149,0.7);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #088395;
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
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo text-center w-full flex justify-center items-center">
                <img src="{{ asset('images/techbuds!.png') }}" alt="Techbuds Logo">
            </div>
            <h1>Reset Password</h1>
            <p>Enter your new password</p>
                </div>

        <div class="login-card">
                @if(session('status'))
                <div class="success-alert">
                    {{ session('status') }}
                </div>
                @endif

                @if($errors->any())
                <div class="error-alert">
                    <ul style="list-style: none; padding: 0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <form method="POST" action="{{ route('admin.password.update') }}" autocomplete="off" novalidate>
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            value="{{ $email }}"
                            disabled
                            class="opacity-60"
                        />
                    </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your new password"
                            required
                            autocomplete="new-password"
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

                <div class="form-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Confirm your new password"
                            required
                            autocomplete="new-password"
                        />
                        <button type="button" class="password-toggle" id="passwordConfirmationToggle" aria-label="Toggle password visibility">
                            <svg id="eyeIcon2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg id="eyeSlashIcon2" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.29 3.29m13.42 13.42L21 21M3 3l18 18"/>
                            </svg>
                        </button>
                    </div>
                </div>

                    <button type="submit" class="btn-submit">Reset Password</button>
                </form>

            <a href="{{ route('admin.login') }}" class="back-link">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to login
            </a>
        </div>
    </div>

    <script>
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

        document.getElementById('passwordConfirmationToggle').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const eyeIcon = document.getElementById('eyeIcon2');
            const eyeSlashIcon = document.getElementById('eyeSlashIcon2');
            
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

