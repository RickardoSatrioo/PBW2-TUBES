@php
    // Check if the image exists in storage or use the default background
    $imagePath = $room->image && \Storage::exists('public/' . $room->image)
        ? 'storage/' . $room->image
        : 'assets/img/background.png';
@endphp

<a href="{{ route('user.room', $room->id) }}">
    <div style="min-width: 300px; background: white; border-radius: 0.4rem; box-shadow: 0 2px 10px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
        <img
            src="{{ asset($imagePath) }}"
            alt="{{ $room->name }}"
            style="width: 100%; height: 200px; object-fit: cover; border-radius: 0.4rem 0.4rem 0 0;"
        >
        <div style="padding: 20px;">
            <h3
                style="margin: 0 0 10px 0; color: #333; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                {{ $room->building->name }} • {{ $room->name }}
            </h3>
            <p style="margin: 0; color: #666;">Capacity: {{ $room->capacity }} people</p>
        </div>
    </div>
</a>
