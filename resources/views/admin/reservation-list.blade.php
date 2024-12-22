<div class="mb-4 row">
    <div class="col-2">
        <div style="width: 10rem; height: 10rem; background-color: #484848; border-radius: 0.8rem; overflow: hidden;">
            <img src="{{ asset('assets/img/bg-telu2.png') }}" alt=""
                style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>

    <!-- Bagian Detail Reservasi -->
    <div class="col-3">
        <div style="display: flex; gap: 0.75rem;">
            <div>
                <h4 class="mb-3"><b>{{ $reservation->purpose }}</b></h4>
                <h6><b>Tanggal:</b> {{ \Carbon\Carbon::parse($reservation->startDate)->format('d F Y') }}</h6>
                <h6><b>Durasi:</b> {{ $reservation->duration }}</h6>
                <h6><b>Kapasitas:</b> {{ $reservation->room->capacity }} Orang</h6>
                <h6><b>Alasan:</b> {{ $reservation->purpose ?? '' }}</h6>
            </div>
        </div>
    </div>

    <!-- Bagian Proposal -->
    <div class="text-center col-1">
        <h5 class="mb-3" style="color: #5D6065;"><b>Proposal</b></h5>
        <a href="{{ asset('storage/files/proposal.pdf') }}" class="text-decoration-none" style="color: #73C2FF;" target="_blank">
            proposal.pdf
        </a>
    </div>

    <!-- Bagian Data Pengaju -->
    <div class="text-center col-{{ $reservation->status == "pending" ? "2" : "3" }}">
        <h5 class="mb-3" style="color: #5D6065;"><b>Oleh</b></h5>
        <h5 class="text-dark">{{ $reservation->createdBy->name ?? 'N/A' }}</h5>
        <h6 style="color: #5D6065;">{{ $reservation->createdBy->nophone ?? '' }}</h6>
    </div>

    <!-- Bagian Status -->
    <div class="text-center col-2">
        @if ($reservation->status == 'approved')
            <h5 class="gap-2 p-2 text-white rounded d-flex align-items-center justify-content-center"
                style="background-color: #4AD300;">
                <span class="ti ti-circle-check-filled" style="font-size: 1.8rem;"></span> Verifikasi Disetujui
            </h5>
        @else
            <h5 class="gap-2 p-2 text-white rounded d-flex align-items-center justify-content-center"
                style="background-color: #D37800;">
                <span class="ti ti-clock-filled" style="font-size: 1.8rem;"></span> Sedang di Proses
            </h5>
        @endif
    </div>
    @if ($reservation->status == "pending")
    <div class="text-center col-2">
        <div style="padding-top: 2.8rem;">
            <div style="display: flex; gap: 1rem;">
                <form class="approve-form" style="display: flex; gap: 1rem;" action="{{ route('admin.reservations.update_status', $reservation) }}" method="Get">
                    <input type="hidden" name="status" value="approved">
                    <button class="ti ti-check approve-button" style=" border: none; padding: 0.6rem; font-size: 2rem; border-radius: 5rem; background-color: #820000; color: #fff;"></button>
                </form>
                <form class="reject-form" style="display: flex; gap: 1rem;" action="{{ route('admin.reservations.update_status', $reservation) }}" method="Get">
                    <input type="hidden" name="status" value="reject">
                    <button class="ti ti-x reject-button" style=" border: none; padding: 0.6rem; font-size: 2rem; border-radius: 5rem; background-color: #820000; color: #fff;"></button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
