<x-app-layout>
    <div style="padding: 2.5rem 1rem; background-color: #f8fafc; min-height: 100vh;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="background: white; padding: 2rem; border-radius: 16px; border: 1px solid #e2e8f0; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                <h2 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin-bottom: 1.5rem; border-bottom: 2px solid #f1f5f9; padding-bottom: 0.75rem;">Daftar Skema Sertifikasi Tersedia</h2>

                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 0.875rem;">
                    <thead>
                        <tr style="background-color: #f8fafc; color: #475569; font-weight: 800; border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 0.85rem 1rem;">No</th>
                            <th style="padding: 0.85rem 1rem;">Kode Skema</th>
                            <th style="padding: 0.85rem 1rem;">Nama Skema Sertifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skemas as $index => $skema)
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 0.85rem 1rem; color: #64748b;">{{ $index + 1 }}</td>
                                <td style="padding: 0.85rem 1rem; font-family: monospace; font-weight: 700; color: #4f46e5;">{{ $skema->kd_skema }}</td>
                                <td style="padding: 0.85rem 1rem; font-weight: 700; color: #0f172a;">{{ $skema->nm_skema }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" style="padding: 2rem; text-align: center; color: #94a3b8;">Belum ada skema tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
