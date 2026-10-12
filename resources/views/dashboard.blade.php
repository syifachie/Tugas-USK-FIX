<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 1200px; margin: 0 auto;">

            <!-- Judul Dashboard Admin -->
            <div style="margin-bottom: 2rem;">
                <h2 style="font-size: 1.75rem; font-weight: 800; color: #0f172a; margin: 0;">Dashboard Admin</h2>
                <p style="color: #64748b; font-size: 0.95rem; margin-top: 0.3rem;">Kelola data skema sertifikasi dan pendaftaran peserta dengan mudah.</p>
            </div>

            <!-- Kartu Statistik (Total Skema & Total Peserta) -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">

                <!-- Kartu Total Skema -->
                <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                    <span style="display: block; color: #64748b; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">Total Skema</span>
                    <h3 style="font-size: 2rem; font-weight: 800; color: #4f46e5; margin: 0;">{{ $totalSkema ?? 0 }}</h3>
                </div>

                <!-- Kartu Total Peserta -->
                <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                    <span style="display: block; color: #64748b; font-size: 0.85rem; font-weight: 700; text-transform: uppercase; margin-bottom: 0.5rem;">Total Peserta Terdaftar</span>
                    <h3 style="font-size: 2rem; font-weight: 800; color: #0284c7; margin: 0;">{{ $totalPeserta ?? 0 }}</h3>
                </div>

            </div>

            <!-- Tabel Daftar Pendaftar & Relasi Skema -->
            <div style="background: white; padding: 1.5rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                <h3 style="font-size: 1.15rem; font-weight: 800; color: #0f172a; margin-bottom: 1.25rem;">Daftar Peserta & Skema Pilihan</h3>

                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
                        <thead>
                            <tr style="background-color: #f8fafc; color: #475569; font-weight: 800; border-bottom: 2px solid #e2e8f0;">
                                <th style="padding: 0.85rem 1rem;">No</th>
                                <th style="padding: 0.85rem 1rem;">No. Pendaftaran</th>
                                <th style="padding: 0.85rem 1rem;">Nama Peserta</th>
                                <th style="padding: 0.85rem 1rem;">Email</th>
                                <th style="padding: 0.85rem 1rem;">No. HP / WA</th>
                                <th style="padding: 0.85rem 1rem;">Skema yang Diambil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesertas ?? [] as $index => $p)
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 0.85rem 1rem; color: #64748b;">{{ $index + 1 }}</td>
                                    <td style="padding: 0.85rem 1rem; font-family: monospace; font-weight: 700; color: #4f46e5;">{{ $p->no_pendaftaran }}</td>
                                    <td style="padding: 0.85rem 1rem; font-weight: 700; color: #0f172a;">{{ $p->nama_peserta }}</td>
                                    <td style="padding: 0.85rem 1rem; color: #334155;">{{ $p->email }}</td>
                                    <td style="padding: 0.85rem 1rem; color: #334155;">{{ $p->no_hp }}</td>
                                    <td style="padding: 0.85rem 1rem;">
                                        <span style="background-color: #f1f5f9; color: #0f172a; padding: 0.3rem 0.6rem; border-radius: 6px; font-weight: 600; font-size: 0.8rem;">
                                            {{ $p->skema ? $p->skema->kd_skema . ' - ' . $p->skema->nm_skema : 'Belum memilih skema' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="padding: 2rem; text-align: center; color: #94a3b8;">Belum ada data peserta yang terdaftar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
