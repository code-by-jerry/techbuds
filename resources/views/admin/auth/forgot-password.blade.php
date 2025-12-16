<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Forgot Password · Techbuds Admin</title>
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
            <h1>Forgot Password</h1>
            <p>Enter your email to receive a password reset link</p>
                </div>

        <div class="login-card">
                @if(session('status'))
                <div class="success-alert">
                    {{ session('status') }}
                </div>
                @endif

                @if($errors->any())
                <div class="error-alert">
                    {{ $errors->first() }}
                </div>
                @endif

            <form method="POST" action="{{ route('admin.password.email') }}" autocomplete="off" novalidate>
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

                    <button type="submit" class="btn-submit">Send Reset Link</button>
                </form>

            <a href="{{ route('admin.login') }}" class="back-link">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to login
            </a>
        </div>
    </div>
    </body>
</html>

