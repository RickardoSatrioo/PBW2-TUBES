@php
    // Check if the image exists in storage or use the default background
    $imagePath = $room->image && \Storage::exists('public/' . $room->image)
        ? 'storage/' . $room->image
        : 'assets/img/background.png';
@endphp

<div style="background: white; border-radius: 0.4rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease; height: 100%;">
    <img src="{{ asset($imagePath) }}" alt="" style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.4rem 0.4rem 0 0;">
    <div style="padding: 1.25rem;">
        <h3 style="margin: 0 0 0.75rem 0; color: #333; font-size: 1.1rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis; line-height: 1.4;">{{ $room->building_name }} • {{ $room->name }}</h3>
        <div style="display: flex; align-items: center; gap: 0.5rem; color: #666;">
            <span class="ti ti-users" style="font-size: 1rem;"></span>
            <p style="margin: 0;">Kapasitas: {{ $room->capacity }} orang</p>
        </div>
    </div>
</div>
