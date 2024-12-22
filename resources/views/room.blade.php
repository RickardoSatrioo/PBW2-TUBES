<x-app-layout>

    <div x-data="{ popBar: true }"
        style="max-width: 1920px; max-height: 1080px; margin: 0 auto; overflow: hidden; position: relative;">
        {{-- Header --}}
        <div
            style="width: 100%; position: absolute; height: 5rem; background-color: #ffffff; top: 0; left: 0; padding: 1rem 6rem; display: flex; gap: 6rem; justify-content: space-between; align-items: center;">

            {{-- Left Side --}}
            <div>
                <h1 style="margin: 0; font-size: 2.5rem; font-weight: 700;">UniShare</h1>
            </div>

            {{-- Center Side --}}
            <div
                style="flex-grow: 1; display: flex; padding: 1rem; justify-content: space-between; align-items: center;">
                <div
                    style="background-color: #F7F8FA; border-radius: 5rem; display: flex; gap: 1rem; padding: 0.5rem 1rem;">
                    <span class="ti ti-search" style="font-size: 1.8rem; color: #BBC5D5;"></span>
                    <input type="text" style="width: 15vw; border: none; background-color: transparent; outline: none;"
                        placeholder="Cari gedung atau kelas">
                </div>
                <div style="display: flex; gap: 4rem;">
                    <button
                        style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Beranda
                    </button>
                    <button
                        style="text-align: center; border: none; background-color: transparent; font-weight: 600; color: #484848;">
                        Riwayat
                    </button>
                </div>
            </div>

            {{-- Right Side --}}
            <div style="display: flex; gap: 1rem; align-items: center;">
                <button class="ti ti-user-circle"
                    style="font-size: 2rem; border: none; background-color: transparent;"></button>
                <button class="ti ti-menu-2"
                    style="font-size: 2rem; border: none; background-color: transparent;"></button>
            </div>

        </div>

        <div style="height: 968px; width: 100%; overflow-y: auto; margin-top: 5rem;">

            {{-- Content Body --}}
            <div
                style="min-height: 846px; height: 92%; width: 1496px; box-sizing: border-box; margin: 0 auto; padding-top: 2rem; display: flex; flex-wrap: nowrap; flex-direction: column; gap: 2rem;">
                <div style="width: 100%; justify-content: space-between; display: flex; height: 100%;">
                    <div style="color: #7F8FA4; align-content: center">
                        <h5 style="margin-bottom: 0 !important;">Telkom University • Gedung • <span
                                style="color: black;">Audiotorium</span></h5>
                    </div>
                    <button
                        style="background-color: #ebeef3b2; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #354052c2; border:none; font-size: 1.2rem; font-weight: 600;">Kembali</button>
                </div>
                <div style="width: 100%; min-height: 100%;">
                    <div
                        style="margin: 1rem auto; background-color: #484848; padding: 0; border-radius: 0.8rem; width: 62%; aspect-ratio: 11/6; overflow: hidden; position: relative;">
                        <img src="{{ asset('assets/img/bg-telu2.png') }}" alt=""
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="display: flex; justify-content: space-between; padding-top: 3rem;">
                        <div style="">
                            <h2 style="font-weight: 700">Audiotorium Lt 16 - TULT</h2>
                            <ul style="display: flex; gap: 2rem; padding: 0; margin-left: 1rem;">
                                <li style="font-size: 1.2rem !important;"><span style="color: #f0a012">Tutup</span>
                                    Tersedia 06.00 WIB</li>
                                <li style="font-size: 1.2rem !important;">Kapasitas : 100 orang</li>
                            </ul>
                        </div>
                        <div style="display: flex; gap: 2rem; align-items: center;">
                            <button
                                style="background-color: #ebeef3; padding: 1rem 1.5rem; border-radius: 0.5rem; color: #354052; border:none; font-size: 1.25rem; font-weight: 600;">Cek
                                Tanggal</button>
                            <button @click="popBar = true"
                                style="background-color: #550000; padding: 1rem 1.5rem; border-radius: 0.5rem; color: white; border:none; font-size: 1.25rem; font-weight: 600;">Reservasi
                                Sekarang</button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div
                style="height: 82px; background-color: #550000; width: 100%; display: flex; align-items: center; justify-content: center;">
                <h6 style="margin-top: -0.1rem; text-align: center; color: white;">© 2024 UniShare</h6>
            </div>

        </div>

        {{-- PopUp Bar --}}
        <div x-show="popBar" x-data="datePicker()" x-transition:enter="transition ease-out duration-900 transform"
            x-transition:enter-start="translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
            x-transition:leave="transition ease-in duration-900 transform"
            x-transition:leave-start="translate-y-0 opacity-100" x-transition:leave-end="translate-y-full opacity-0"
            style="z-index: 20; height: 968px; width: 100%; position: absolute; bottom: 0; overflow: hidden; background-color: #fff; box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2); border-radius: 1rem; transition: all 0.8s ease;">
            <div style="margin: 0 auto; width: 1496px; display: flex; gap: 4rem; margin-top: 2rem;">
                <div style="width: 100%;">
                    {{-- Header --}}
                    <div style="width: 100%; display: flex; justify-content: space-between; margin-bottom: 1rem;">
                        <h2 style="font-weight: 700">Pilih Waktu</h2>
                        <button @click="popBar = false"
                            style="background-color: #ebeef3b2; padding: 0.5rem 1rem; border-radius: 0.5rem; color: #354052c2; border:none; font-size: 1.2rem; font-weight: 600;">Tutup</button>
                    </div>

                    <div style="display: flex; gap: 2rem">

                        <div style="width: 100%; overflow: hidden;">

                            <!--Date Selector-->
                            <h5 x-text="currentMonth" style="font-weight: 600; margin-bottom: 1rem;"></h5>
                            <div style="width: 100%; overflow-x: auto; display: flex; gap: 1rem;">
                                <!-- Looping Dates -->
                                <template x-for="date in filteredDates" :key="date.day">
                                    <div @click="selectDate(date)"
                                        :style="selectedDate === date.fullDate ?
                                            'display: flex; justify-content: center; align-items: center; border: 2px dashed #661a1a; color: black; border-radius: 1rem !important; background-color: #eee6e6; min-width: 6rem; min-height: 6.5rem; cursor: pointer;' :
                                            'display: flex; justify-content: center; align-items: center; border: 2px solid #484848; color: black; border-radius: 1rem !important; background-color: #ffffff; min-width: 6rem; min-height: 6.5rem; cursor: pointer;'">
                                    {{-- <div @click="selectDate(date)"
                                        :style="selectedDate === date.fullDate ?
                                            'display: flex; justify-content: center; align-items: center; border: 2px solid #FFA101; color: white; border-radius: 1rem !important; background-color: #FFA101; min-width: 6rem; min-height: 6.5rem; cursor: pointer;' :
                                            'display: flex; justify-content: center; align-items: center; border: 2px solid #484848; color: black; border-radius: 1rem !important; background-color: #ffffff; min-width: 6rem; min-height: 6.5rem; cursor: pointer;'"> --}}
                                        <div>
                                            <h6 style="text-align: center; font-size: 1.3rem;" x-text="date.weekday">
                                            </h6>
                                            <h6 style="text-align: center; font-size: 1.3rem;" x-text="date.day"></h6>
                                        </div>
                                    </div>
                                </template>
                            </div>

                            <!-- Time Selection -->
                            <div style="width: 100%; height: 720px; overflow-y: auto; padding-top: 1rem;">
                                <template x-for="hour in hours" :key="hour">
                                    <div @click="toggleTime(hour)"
                                        :style="isTimeActive(hour) ?
                                            'display: flex; justify-content: space-between; align-items: center; padding: 1rem 0.6rem; border-bottom: 2px solid #D3D3D3; color: #7b0101; cursor: pointer; font-weight: 700;' :
                                            'display: flex; justify-content: space-between; align-items: center; padding: 1rem 0.6rem; border-bottom: 2px solid #D3D3D3; cursor: pointer;'">
                                        <div style="font-size: 1.25rem" x-text="hour + ':00'"></div>
                                        <div class="ti ti-chevron-right" style="font-size: 1.25rem"></div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        {{-- Right --}}
                        <div style="width: 550px;">

                            <div
                                style="background-color: #ffffff; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); max-width: 450px; margin: auto;">

                                <div style="display: flex; gap: 1rem; align-items: center;">
                                    <div
                                        style="width: 7.5rem; height: 7.5rem; background-color: #484848; border-radius: 1rem; overflow: hidden;">
                                        <img src="{{ asset('assets/img/bg-telu2.png') }}" alt=""
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div style="flex: 1; overflow: hidden;">
                                        <h6
                                            style="font-size: 1.125rem; font-weight: bold; color: #333; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                                            Audiotorium Lt 16 - TULT
                                        </h6>
                                        <p style="margin: 0.5rem 0 0; font-size: 0.875rem; color: #666;">Kapasitas: 100
                                            Orang</p>
                                    </div>
                                </div>
                                <!-- Input Tanggal Mulai dan Selesai -->
                                {{-- <div x-data="{
                                        get timeEnd() { return this.endDateTime ? this.endDateTime.split(' ')[1].slice(0, 5) : '--:--'; },
                                        get timeStart() { return this.endDateTime ? this.startDateTime.split(' ')[1].slice(0, 5) : '--:--'; },
                                        get date() { return this.endDateTime ? this.endDateTime.split(' ')[0] : '----/--/--'; }
                                    }">
                                    <h5 style="font-weight: 600; margin-top: 1.4rem">Waktu Peminjaman</h5>
                                    <div style="display: flex; justify-content: space-between; padding: 0 2rem">
                                        <div>
                                            <h5 style="font-weight: 600; margin-bottom: 1rem; text-align: center;">Mulai</h5>
                                            <h5 style="font-weight: 600; margin-bottom: 1rem; text-align: center;" x-text="timeStart"></h5>
                                        </div>
                                        <div>
                                            <h5 style="font-weight: 600; margin-bottom: 1rem; text-align: center;">Selesai</h5>
                                            <h5 style="font-weight: 600; margin-bottom: 1rem; text-align: center;" x-text="timeEnd"></h5>
                                        </div>
                                    </div>
                                    <h5 style="font-weight: 600; text-align: center;">Tanggal</h5>
                                    <h5 style="font-weight: 600; margin-bottom: 1rem; text-align: center;" x-text="date"></h5>
                                </div> --}}
                                <div x-data="{
                                    get timeEnd() { return this.endDateTime ? this.endDateTime.split(' ')[1].slice(0, 5) : '--:--'; },
                                    get timeStart() { return this.endDateTime ? this.startDateTime.split(' ')[1].slice(0, 5) : '--:--'; },
                                    get date() { return this.endDateTime ? this.endDateTime.split(' ')[0] : '----/--/--'; }
                                }" class="booking-time-container">
                                    <h3 style="font-weight: 600; margin: 2rem 0 1.5rem; font-size: 1.25rem; color: #333;">Waktu Peminjaman</h3>

                                    <div style=" display: flex; justify-content: space-between; padding: 1.5rem 2rem; background: #f8f9fa; border-radius: 1rem; margin-bottom: 1.5rem; box-shadow: 0 2px 4px rgba(0,0,0,0.05); ">
                                        <!-- Start Time Section -->
                                        <div style="flex: 1; text-align: center;">
                                            <h5 style=" font-weight: 500; margin-bottom: 0.75rem; color: #666; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; ">Mulai</h5>
                                            <h4 style=" font-weight: 600; font-size: 1.5rem; color: #2c3e50; margin: 0; " x-text="timeStart"></h4>
                                        </div>

                                        <!-- Divider -->
                                        <div style=" width: 1px; background: #dee2e6; margin: 0 2rem; "></div>

                                        <!-- End Time Section -->
                                        <div style="flex: 1; text-align: center;">
                                            <h5 style=" font-weight: 500; margin-bottom: 0.75rem; color: #666; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Selesai</h5>
                                            <h4 style=" font-weight: 600; font-size: 1.5rem; color: #2c3e50; margin: 0; " x-text="timeEnd"></h4>
                                        </div>
                                    </div>

                                    <!-- Date Section -->
                                    <div style=" text-align: center; padding: 1rem; background: #fff; border-radius: 1rem; border: 1px solid #eee; ">
                                        <h5 style=" font-weight: 500; margin-bottom: 0.5rem; color: #666; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; ">Tanggal</h5>
                                        <h4 style=" font-weight: 600; font-size: 1.25rem;color: #2c3e50; margin: 0;" x-text="date"></h4>
                                    </div>
                                </div>

                                <form action="{{ route('admin.make_reservation') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Input File -->
                                    <h5 style="font-weight: 600; margin-bottom: 1rem; margin-top: 1.4rem">Upload Proposal</h5>
                                    {{-- <div style="border: 2px dashed #ccc; border-radius: 8px; padding: 1rem; text-align: center; background-color: #f9f9f9; transition: border-color 0.3s, background-color 0.3s; cursor: pointer;"
                                        onmouseover="this.style.borderColor='#661a1a'; this.style.backgroundColor='#eee6e6';"
                                        onmouseout="this.style.borderColor='#ccc'; this.style.backgroundColor='#f9f9f9';">
                                        <header>
                                            <h4
                                                style="font-size: 1.2rem; font-weight: bold; color: #555; margin-bottom: 0.5rem;">
                                                Select File Here</h4>
                                        </header>
                                        <p style="font-size: 0.9rem; color: #888; margin-bottom: 1rem;">Files
                                            Supported: PDF, TEXT, DOC, DOCX</p>
                                        <input type="file" hidden accept=".doc,.docx,.pdf" id="fileID">
                                        <button type="button" onclick="document.getElementById('fileID').click();"
                                            style="display: inline-block; padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: bold; color: #fff; background-color: #550000; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;"
                                            onmouseover="this.style.backgroundColor='#790000';"
                                            onmouseout="this.style.backgroundColor='#550000';">
                                            Choose File
                                        </button>
                                    </div> --}}
                                    <div
                                        x-data="{
                                            fileName: '',
                                            fileSize: '',
                                            handleFile(event) {
                                                const file = event.target.files[0];
                                                if (file) {
                                                    this.fileName = file.name;
                                                    this.fileSize = this.formatFileSize(file.size);
                                                }
                                            },
                                            formatFileSize(bytes) {
                                                if (bytes === 0) return '0 Bytes';
                                                const k = 1024;
                                                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                                                const i = Math.floor(Math.log(bytes) / Math.log(k));
                                                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
                                            },
                                            removeFile() {
                                                this.fileName = '';
                                                this.fileSize = '';
                                                document.getElementById('fileID').value = '';
                                            }
                                        }">
                                        <!-- Original File Input Design -->
                                        <div x-show="!fileName" style="border: 2px dashed #ccc; border-radius: 8px; padding: 1rem; text-align: center; background-color: #f9f9f9; transition: border-color 0.3s, background-color 0.3s; cursor: pointer;"
                                            onmouseover="this.style.borderColor='#661a1a'; this.style.backgroundColor='#eee6e6';"
                                            onmouseout="this.style.borderColor='#ccc'; this.style.backgroundColor='#f9f9f9';">
                                            <header>
                                                <h4 style="font-size: 1.2rem; font-weight: bold; color: #555; margin-bottom: 0.5rem;">
                                                    Select File Here</h4>
                                            </header>
                                            <p style="font-size: 0.9rem; color: #888; margin-bottom: 1rem;">Files
                                                Supported: PDF, TEXT, DOC, DOCX</p>
                                            <input name="proposal" type="file" hidden accept=".doc,.docx,.pdf" id="fileID" @change="handleFile($event)">
                                            <div type="button" @click="document.getElementById('fileID').click();"
                                                style="display: inline-block; padding: 0.5rem 1rem; font-size: 0.9rem; font-weight: bold; color: #fff; background-color: #550000; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;"
                                                onmouseover="this.style.backgroundColor='#790000';"
                                                onmouseout="this.style.backgroundColor='#550000';">
                                                Choose File
                                            </div>
                                        </div>

                                        <!-- File Preview -->
                                        <div x-show="fileName"
                                            style="border: 2px dashed #ccc; border-radius: 8px; padding: 1rem; background-color: #f9f9f9;">
                                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                                <div style="display: flex; flex-direction: column; gap: 0.25rem;">
                                                    <span style="font-size: 1rem; font-weight: 500; color: #555;" x-text="fileName"></span>
                                                    <span style="font-size: 0.85rem; color: #888;" x-text="fileSize"></span>
                                                </div>
                                                <div @click="removeFile"
                                                    style="cursor: pointer; padding: 0.5rem; color: #550000;"
                                                    onmouseover="this.style.color='#790000';"
                                                    onmouseout="this.style.color='#550000';">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                        <path d="M18 6l-12 12" />
                                                        <path d="M6 6l12 12" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input style="display: none" type="text" id="startDateTime" x-model="startDateTime" name="startDateTime" readonly>
                                    <input style="display: none" type="text" id="endDateTime" x-model="endDateTime" name="endDateTime" readonly>
                                    <!-- Tombol Submit -->
                                    <button type="submit"
                                        style="margin-top: 1.5rem; width: 100%; padding: 0.75rem; font-size: 0.875rem; font-weight: bold; color: white; background-color: #550000; border: none; border-radius: 0.5rem; cursor: pointer; transition: background-color 0.3s;">
                                        Submit
                                    </button>
                                </form>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Backdrop -->
        <div x-show="popBar" x-transition:enter="transition ease-out duration-500"
            x-transition:leave="transition ease-in duration-500"
            style="position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background-color: rgba(0, 0, 0, 0.5); z-index: 10; backdrop-filter: blur(2px);"
            @click="popBar = false">
        </div>
    </div>


    <script>
        function datePicker() {
            return {
                currentMonth: '',
                selectedDate: '',
                selectedTimes: '',
                timeArray: [],
                firstSelectedTime: null,
                secondSelectedTime: null,
                startDateTime: '',
                endDateTime: '',
                hours: Array.from({
                    length: 15
                }, (_, i) => i + 7),
                filteredDates: [],

                selectDate(date) {
                    const dateObj = new Date(date.fullDate);
                    const year = dateObj.getFullYear();
                    const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                    const day = String(dateObj.getDate()).padStart(2, '0');
                    this.selectedDate = `${year}-${month}-${day}`;
                    this.resetTimeSelection();
                },

                resetTimeSelection() {
                    this.timeArray = [];
                    this.selectedTimes = '';
                    this.firstSelectedTime = null;
                    this.secondSelectedTime = null;
                    this.startDateTime = '';
                    this.endDateTime = '';
                },

                updateDateTimeRange() {
                    if (this.selectedDate && this.timeArray.length > 0) {
                        const sortedTimes = [...this.timeArray].sort((a, b) => a - b);
                        const firstTime = sortedTimes[0].toString().padStart(2, '0');
                        const lastTime = sortedTimes[sortedTimes.length - 1].toString().padStart(2, '0');

                        this.startDateTime = `${this.selectedDate} ${firstTime}:00:00`;
                        this.endDateTime = `${this.selectedDate} ${lastTime}:00:00`;
                    } else {
                        this.startDateTime = '';
                        this.endDateTime = '';
                    }
                },

                toggleTime(hour) {
                    if (this.timeArray.length === 0 || this.firstSelectedTime === null) {
                        this.firstSelectedTime = hour;
                        this.timeArray = [hour];
                    } else if (this.secondSelectedTime === null && hour !== this.firstSelectedTime) {
                        this.secondSelectedTime = hour;
                        this.createTimeRange(this.firstSelectedTime, this.secondSelectedTime);
                    } else {
                        if (this.isWithinRange(hour)) {
                            const distanceToFirst = Math.abs(hour - this.firstSelectedTime);
                            const distanceToSecond = Math.abs(hour - this.secondSelectedTime);

                            if (distanceToFirst < distanceToSecond) {
                                this.firstSelectedTime = hour;
                                this.createTimeRange(hour, this.secondSelectedTime);
                            } else {
                                this.secondSelectedTime = hour;
                                this.createTimeRange(this.firstSelectedTime, hour);
                            }
                        } else {
                            this.firstSelectedTime = hour;
                            this.secondSelectedTime = null;
                            this.timeArray = [hour];
                        }
                    }

                    this.updateSelectedTimesDisplay();
                    this.updateDateTimeRange(); // Update the datetime range whenever times change
                },

                isTimeActive(hour) {
                    return this.timeArray.includes(hour);
                },

                isWithinRange(hour) {
                    if (!this.firstSelectedTime || !this.secondSelectedTime) return false;
                    const min = Math.min(this.firstSelectedTime, this.secondSelectedTime);
                    const max = Math.max(this.firstSelectedTime, this.secondSelectedTime);
                    return hour >= min && hour <= max;
                },

                createTimeRange(start, end) {
                    const rangeStart = Math.min(start, end);
                    const rangeEnd = Math.max(start, end);
                    this.timeArray = Array.from({
                            length: rangeEnd - rangeStart + 1
                        },
                        (_, i) => rangeStart + i
                    ).sort((a, b) => a - b);
                },

                updateSelectedTimesDisplay() {
                    if (this.timeArray.length > 0) {
                        const formattedTimes = this.timeArray
                            .map(time => {
                                const hour = time.toString().padStart(2, '0');
                                return `${hour}:00`;
                            })
                            .join(', ');
                        this.selectedTimes = formattedTimes;
                    } else {
                        this.selectedTimes = '';
                    }
                },

                getFilteredDates() {
                    let today = new Date();
                    let tomorrow = new Date(today);
                    tomorrow.setDate(today.getDate() + 1);

                    let lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                    let dates = [];

                    let currentDate = new Date(tomorrow);

                    while (currentDate <= lastDayOfMonth) {
                        const year = currentDate.getFullYear();
                        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
                        const day = String(currentDate.getDate()).padStart(2, '0');

                        dates.push({
                            fullDate: `${year}-${month}-${day}`,
                            weekday: this.getWeekdayName(currentDate),
                            day: currentDate.getDate()
                        });

                        currentDate = new Date(currentDate);
                        currentDate.setDate(currentDate.getDate() + 1);
                    }

                    this.filteredDates = dates;
                    this.currentMonth = tomorrow.toLocaleString('default', {
                        month: 'long',
                        year: 'numeric'
                    });
                },

                getWeekdayName(date) {
                    const weekdays = {
                        0: 'Min',
                        1: 'Sen',
                        2: 'Sel',
                        3: 'Rab',
                        4: 'Kam',
                        5: 'Jum',
                        6: 'Sab'
                    };
                    return weekdays[date.getDay()];
                },

                init() {
                    this.getFilteredDates();
                }
            };
        }
    </script>

</x-app-layout>
