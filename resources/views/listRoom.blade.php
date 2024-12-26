@push('js')
    <script>
        $(document).ready(function() {
            let currentRequest = null;
            let searchQuery = $("#search").val();
            let page = 1;
            const loadMoreLimit = 20;
            let filterByCategory = "";
            let isLoading = false;

            function loadSearchResults(query = '', page = 1, isLoadMore = false) {
                if (isLoading) return; // Prevent multiple requests at the same time

                isLoading = true;
                $('#loading').show();

                if (currentRequest) {
                    currentRequest.abort(); // Abort previous request
                }

                currentRequest = $.ajax({
                    url: "{{ route('user.room.search') }}", // Adjust this route as needed
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        search: query,
                        page: page,
                        limit: loadMoreLimit,
                    },
                    success: function(response) {
                        $('#loading').hide();
                        if (response.html) {
                            response.html += `
                                <div id="sentinel" style="height: 1px; grid-column: 1 / -1;"></div>
                                <div id="loading" style="display:none; text-align: center;height: 1px; grid-column: 1 / -1;">
                <div class="mb-4 spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
                            `
                            if (isLoadMore) {
                                $('#room-container').append(response.html);
                            } else {
                                $('#room-container').html(response.html);
                            }

                            observer.observe(document.querySelector('#sentinel'));
                        } else if (!isLoadMore) {
                            $('#room-container').html('<p>No rooms found.</p>');
                        }

                        isLoading = false;
                        if (!response.hasMore) {
                            observer.disconnect();
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#loading').hide();
                        if (status !== 'abort') {
                            console.error('Error fetching data:', error);
                        }
                        console.error('Error fetching data:', xhr);
                        isLoading = false;
                    }
                });
            }

            // Event listener for search input
            $('#search').on('input', function() {
                page = 1;
                searchQuery = $(this).val();
                loadSearchResults(searchQuery);
            });

            $('#searchBtn').on('click', function() {
                page = 1;
                searchQuery = $("#search").val();
                loadSearchResults(searchQuery);
            });

            // Intersection Observer for infinite scroll
            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !isLoading) {
                    setTimeout(() => {
                        page++;
                        loadSearchResults(searchQuery, page, true);
                    }, 400);
                }
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            });

            observer.observe(document.querySelector('#sentinel'));

            // Load initial data
            loadSearchResults("{{ $search }}");
        });
    </script>
@endpush


<x-app-layout>
    <div style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        <!-- Header -->
        <div
            style="z-index: 10; width: 100%; position: absolute; height: 5rem; backdrop-filter: blur(2px); background-color: #ffffff88; top: 0; left: 0; padding: 1rem 6rem; display: flex; gap: 6rem; justify-content: space-between; align-items: center;">
            <!-- Left Side -->
            <div>
                <a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">
                    <h1 style="margin: 0; font-size: 2.5rem; font-weight: 700;">UniShare</h1>
                </a>
            </div>

            <!-- Center Side -->
            <div style="flex-grow: 1; display: flex; padding: 1rem; width: 100% align-items: center;">
                <div
                    style="width: 100%; background: #f8f9fa; border-radius: 50px; padding: 5px 10px; display: flex; align-items: center; gap: 15px; box-shadow: 6px 9px 8px rgba(0,0,0,0.1);">
                    <input type="text" value="{{ $search }}" id="search" name="seacrh"
                        placeholder="Temukan Ruangan mu di sini"
                        style="width: 100%; padding: 12px; border: none; outline: none; font-size: 1.1rem; background: transparent;">
                    <button class="ti ti-search" id="searchBtn"
                        style="border: none; padding: 0.8rem; font-size: 1rem; border-radius: 50%; background-color: #820000; color: #fff; cursor: pointer; transition: background-color 0.3s ease;"></button>
                </div>
            </div>

            <!-- Right Side -->
            <div style="display: flex; gap: 1rem; align-items: center;">
                <a href="{{ route('profile.edit') }}" style="text-decoration: none; color: inherit;">
                    <button class="ti ti-user-circle"
                        style="font-size: 2rem; border: none; background-color: transparent;"></button>
                </a>
                <a href="{{ route('landing') }}" style="text-decoration: none; color: inherit;">
                    <button class="ti ti-arrow-narrow-left-dashed"
                        style="font-size: 2.7rem; border: none; background-color: transparent;"></button>
                </a>
            </div>
        </div>

        <div
            style="min-height: 100vh; width: 100%; font-family: Arial, sans-serif; padding-top: 5rem; background: #f8f9fa;">
            <!-- Room Cards Grid -->
            <div style="padding: 0 110px;min-height: 100vh;margin-top: 1rem">
                <div id="room-container"
                    style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 1.5rem; padding: 10px; max-height: 55.6rem; overflow-y: auto;padding-bottom: 200px;">
                    <!-- Sentinel Element for Infinite Scroll -->
                    <div id="sentinel" style="height: 1px; grid-column: 1 / -1;"></div>
                    <div id="loading" style="display:none; text-align: center;height: 1px; grid-column: 1 / -1;">
                        <div class="mb-4 spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer style="background-color: #820000; color: white; text-align: center; padding: 20px 0; width: 100%;">
                <p style="margin: 0;">© UniShare c. 2024. All rights reserved.</p>
            </footer>
        </div>
</x-app-layout>
