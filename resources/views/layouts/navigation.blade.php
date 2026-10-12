<nav style="background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4338ca 100%); padding: 0.75rem 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; height: 60px;">

        <!-- Logo & Menu Utama -->
        <div style="display: flex; align-items: center; gap: 2.5rem;">
            <!-- Logo -->
            <a href="{{ Auth::user()->email === 'admin@gmail.com' ? route('dashboard') : route('user.dashboard') }}" style="display: flex; align-items: center; gap: 0.75rem; text-decoration: none;">
                <div style="width: 40px; height: 40px; background: rgba(255, 255, 255, 0.2); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 900; color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.3); font-size: 1.2rem;">
                    S
                </div>
                <span style="font-weight: 800; font-size: 1.25rem; color: #ffffff; letter-spacing: -0.5px;">SertifikasiApp</span>
            </a>

            @if(Auth::user()->email === 'admin@gmail.com')
                <!-- MENU UNTUK ADMIN -->
                <a href="{{ route('dashboard') }}"
                   style="padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;
                          {{ request()->routeIs('dashboard') ? 'background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: white;' : 'color: #cbd5e1;' }}">
                    Dashboard
                </a>

                <a href="{{ route('skema.index') }}"
                   style="padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;
                          {{ request()->routeIs('skema.*') ? 'background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: white;' : 'color: #cbd5e1;' }}">
                    Data Skema
                </a>

                <a href="{{ route('peserta.index') }}"
                   style="padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;
                          {{ request()->routeIs('peserta.*') ? 'background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: white;' : 'color: #cbd5e1;' }}">
                    Data Peserta
                </a>
            @else
                <!-- MENU UNTUK USER / PESERTA -->
                <a href="{{ route('user.dashboard') }}"
                   style="padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;
                          {{ request()->routeIs('user.dashboard') ? 'background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: white;' : 'color: #cbd5e1;' }}">
                    Dashboard
                </a>

                <a href="{{ route('user.skema') }}"
                   style="padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;
                          {{ request()->routeIs('user.skema') ? 'background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: white;' : 'color: #cbd5e1;' }}">
                    Data Skema
                </a>

                <a href="{{ route('user.peserta') }}"
                   style="padding: 0.5rem 1rem; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.875rem; transition: all 0.2s;
                          {{ request()->routeIs('user.peserta') ? 'background-color: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.3); color: white;' : 'color: #cbd5e1;' }}">
                    Data Peserta Saya
                </a>
            @endif
        </div>

        <!-- User Menu / Dropdown -->
        <div style="display: flex; align-items: center; gap: 1rem;">
            <div style="background: rgba(255, 255, 255, 0.15); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: 8px; padding: 0.4rem 0.8rem; display: flex; align-items: center; gap: 0.5rem; color: #ffffff; font-weight: 700; font-size: 0.875rem;">
                <div style="width: 28px; height: 28px; background-color: #6366f1; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem;">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span>{{ Auth::user()->name }}</span>
            </div>

            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="background: rgba(239, 68, 68, 0.8); color: white; border: none; padding: 0.4rem 0.8rem; border-radius: 8px; font-weight: 600; font-size: 0.75rem; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>

    </div>
</nav>
