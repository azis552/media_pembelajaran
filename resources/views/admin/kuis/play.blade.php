@extends('admin.template.master')

@section('content')
    <style>
        #sidenav-main {
            display: none;
            margin: 0;
        }

        .g-sidenav-show {
            margin: 0;
            padding: 0;
        }

        .main-content {
            margin-left: 0;
            padding-left: 0;
            width: 100%;
        }

        .navbar-main {
            margin-left: 0;
            margin-right: 0;
        }

        /* Styling untuk nomor soal */
        .question-list {
            width: 100%;
            height: 20%;
            padding: 10px;
            border-right: 1px solid #ddd;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            /* Membuat grid 5 kolom */
            gap: 5px;
        }

        .question-list-item {
            width: 100%;
            padding: 10px;
            background-color: #f44336;
            color: white;
            text-align: center;
            cursor: pointer;
            border-radius: 5px;
        }

        .question-list-item:hover {
            background-color: #e53935;
        }

        .question-list-item.active-item {
            background-color: #007bff;
        }

        /* Menyembunyikan semua soal kecuali soal yang aktif */
        .question {
            display: none;
        }

        .question.active {
            display: block;
        }

        .question-content {
            width: 100%;
            padding-left: 20px;
            position: relative;
            perspective: 1000px;
            /* Persfektif untuk flip card */
        }

        .flip-container {
            position: relative;
            width: 100%;
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .flipped .flip-container {
            transform: rotateY(180deg);
            /* Rotasi saat di-flip */
        }

        .flip-front {
            position: absolute;
            width: 105%;
            backface-visibility: hidden;

        }

        .flip-back {
            position: absolute;
            width: 105%;
            padding: 10px;
            margin-left: -5%;
            border-radius: 10px;
            backface-visibility: hidden;
        }

        .flip-front {
            background-color: #fffdfd;
            z-index: 2;
        }

        .flip-back {
            background-color: #007bff;
            color: white;
            transform: rotateY(180deg);
            z-index: 1;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .question-list {
                grid-template-columns: repeat(3, 1fr);
                /* Grid 3 kolom untuk layar menengah */
            }
        }

        @media (max-width: 480px) {
            .question-list {
                grid-template-columns: repeat(5, 1fr);
                /* Grid 2 kolom untuk layar HP */
            }

            .question-content {
                padding-left: 0;
            }

            .btn-group button {
                width: 100%;
                margin-top: 5px;
            }
        }

        #image {
            width: 140px;
        }

        .locked {
            pointer-events: none;
            /* Membuat elemen tidak bisa diklik */
            opacity: 0.6;
            /* Menurunkan opacity untuk memberi efek terkunci */
        }
    </style>

    <script>
        // Ini untuk menghapus atribut class dari main
        document.querySelector('main').removeAttribute('class');
    </script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 p-3" style="margin-bottom: 100px">
                    <div class="card-header text-center pb-0">
                        <h6>Ujian</h6>
                        <div class="countdown" id="countdown">Waktu Tersisa: 00:00:00</div> <!-- Tempat waktu countdown -->
                    </div>
                    <div class="card-body px-0 pt-0 pb-2 mt-3">
                        <div class="row">
                            <!-- Nomor Soal -->
                            <div class="col-3 question-list">
                                @foreach ($data as $index => $kuis)
                                    <div class="question-list-item" data-index="{{ $index }}">
                                        {{ $index + 1 }}
                                    </div>
                                @endforeach
                            </div>

                            <!-- Soal-soal -->
                            <div class="col-9 question-content">
                                <form action="{{ route('kuis.store') }}" method="post">
                                    @csrf
                                    @foreach ($data as $index => $kuis)
                                        <div class="question @if ($index == 0) active @endif"
                                            id="question-{{ $index }}">
                                            <div class="flip-container">
                                                <!-- Bagian Depan (Soal) -->
                                                <div class="flip-front">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <p>{{ $kuis->soal }}</p>
                                                            <img id="image"
                                                                src="{{ asset('storage/images_kuis/' . $kuis->gambar) }}"
                                                                width="300px" alt="">
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <input type="hidden" name="id_soal_{{ $index }}"
                                                                    value="{{ $kuis->id }}" id="">
                                                                <!-- Pilihan jawaban -->
                                                                <div class="col-md">
                                                                    <input type="radio" name="jawaban_{{ $index }}"
                                                                        value="{{ $kuis->jawaban1 }}">
                                                                    <label>{{ $kuis->jawaban1 }}</label>
                                                                </div>
                                                                <div class="col-md">
                                                                    <input type="radio"
                                                                        name="jawaban_{{ $index }}"
                                                                        value="{{ $kuis->jawaban2 }}">
                                                                    <label>{{ $kuis->jawaban2 }}</label>
                                                                </div>
                                                                <div class="col-md">
                                                                    <input type="radio"
                                                                        name="jawaban_{{ $index }}"
                                                                        value="{{ $kuis->jawaban3 }}">
                                                                    <label>{{ $kuis->jawaban3 }}</label>
                                                                </div>
                                                                <div class="col-md">
                                                                    <input type="radio"
                                                                        name="jawaban_{{ $index }}"
                                                                        value="{{ $kuis->jawaban4 }}">
                                                                    <label>{{ $kuis->jawaban4 }}</label>
                                                                </div>
                                                                <div class="col-md">
                                                                    <input type="radio"
                                                                        name="jawaban_{{ $index }}"
                                                                        value="{{ $kuis->jawaban5 }}">
                                                                    <label>{{ $kuis->jawaban5 }}</label>
                                                                </div>
                                                            </div>

                                                            <!-- Pilihan tingkat kesulitan -->
                                                            <div class="mt-3">
                                                                <label><strong>Pilih tingkat kesulitan
                                                                        soal:</strong></label><br>
                                                                <input type="radio" name="kesulitan_{{ $index }}"
                                                                    value="Rendah">
                                                                <label>Rendah</label><br>
                                                                <input type="radio" name="kesulitan_{{ $index }}"
                                                                    value="Sedang">
                                                                <label>Sedang</label><br>
                                                                <input type="radio" name="kesulitan_{{ $index }}"
                                                                    value="Sulit">
                                                                <label>Sulit</label><br>
                                                            </div>

                                                            <!-- Tombol Kunci Jawaban -->
                                                            <button type="button" class="btn btn-info lock-answer"
                                                                data-index="{{ $index }}">Kunci Jawaban</button>

                                                            <!-- Tombol Flip (Tersembunyi sebelum dikunci) -->
                                                            <button type="button" class="btn btn-secondary flip-btn"
                                                                data-index="{{ $index }}"
                                                                style="display: none;">Flip ke
                                                                Jawaban</button>
                                                        </div>

                                                        <div class="card-footer">
                                                            <div class="btn-group">
                                                                @if ($index > 0)
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-secondary prev-btn">Sebelumnya</button>
                                                                @endif

                                                                @if ($index < count($data) - 1)
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-primary next-btn">Selanjutnya</button>
                                                                @else
                                                                    <button type="submit"
                                                                        class="btn btn-sm btn-success">Simpan</button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Bagian Belakang (Jawaban Benar) -->
                                                <div class="flip-back">
                                                    <p>Jawaban benar: {{ $kuis->jawaban_benar }}</p>
                                                    <!-- Tombol Flip (Tersembunyi sebelum dikunci) -->
                                                    <button type="button" class="btn btn-secondary flip-btn"
                                                        data-index="{{ $index }}">Flip ke Soal</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript untuk mengatur soal yang aktif
        document.querySelectorAll('.question-list-item').forEach(item => {
            item.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                setActiveQuestion(index);
            });
        });

        // Tombol "Sebelumnya" dan "Selanjutnya"
        document.querySelectorAll('.prev-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const activeQuestion = document.querySelector('.question.active');
                const index = Array.from(document.querySelectorAll('.question')).indexOf(activeQuestion);
                setActiveQuestion(index - 1);
            });
        });

        document.querySelectorAll('.next-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const activeQuestion = document.querySelector('.question.active');
                const index = Array.from(document.querySelectorAll('.question')).indexOf(activeQuestion);
                setActiveQuestion(index + 1);
            });
        });

        // Kunci Jawaban
        document.querySelectorAll('.lock-answer').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const flipBtn = document.querySelector(`.flip-btn[data-index="${index}"]`);
                flipBtn.style.display = 'inline-block'; // Menampilkan tombol flip setelah jawaban dikunci
                this.disabled = true;
                this.style.display = 'none'; // Menonaktifkan tombol kunci setelah diklik
                // Mengubah radio button menjadi disabled
                document.querySelectorAll(`input[name="jawaban_${index}"]`).forEach(input => {
                    input.classList.add('locked'); // Menambah kelas locked
                });
                document.querySelectorAll(`input[name="kesulitan_${index}"]`).forEach(input => {
                    input.classList.add('locked'); // Menambah kelas locked
                });
            });
        });

        // Tombol Flip
        document.querySelectorAll('.flip-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const questionElement = document.getElementById('question-' + index);
                questionElement.classList.toggle('flipped'); // Melakukan flip pada card


            });
        });

        function setActiveQuestion(index) {
            // Menghilangkan semua soal
            document.querySelectorAll('.question').forEach(q => {
                q.classList.remove('active');
            });
            // Menampilkan soal sesuai index
            document.getElementById('question-' + index).classList.add('active');
            // Menghapus kelas active-item dari semua nomor soal
            document.querySelectorAll('.question-list-item').forEach(listItem => {
                listItem.classList.remove('active-item');
            });
            // Menambahkan kelas active-item pada nomor yang dipilih
            document.querySelector(`.question-list-item[data-index='${index}']`).classList.add('active-item');
        }
        // Hitung mundur
        const countdownElement = document.getElementById('countdown');
        let waktu = {{ $waktu }}; // Waktu dalam detik dari controller
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cek apakah ada waktu tersisa di localStorage
            let savedTime = localStorage.getItem('remainingTime');
            if (savedTime !== null) {
                waktu = parseInt(savedTime, 10); // Gunakan waktu yang tersimpan
            }
            // Set soal terakhir yang dibuka jika ada di localStorage
            const lastActiveQuestion = localStorage.getItem('activeQuestion');
            if (lastActiveQuestion !== null) {
                setActiveQuestion(lastActiveQuestion); // Tampilkan soal terakhir yang dibuka
            } else {
                setActiveQuestion(0); // Jika tidak ada soal yang tersimpan, mulai dari soal pertama
            }
            // Set jawaban yang dipilih sebelumnya
            document.querySelectorAll('input[type="radio"]').forEach(input => {
                const savedAnswer = localStorage.getItem(input.name);
                if (savedAnswer === input.value) {
                    input.checked = true; // Centang jawaban yang sesuai
                }
            });

            // Set tingkat kesulitan yang dipilih sebelumnya
            document.querySelectorAll('input[name^="kesulitan_"]').forEach(input => {
                const savedDifficulty = localStorage.getItem(input.name);
                if (savedDifficulty === input.value) {
                    input.checked = true; // Centang tingkat kesulitan yang sesuai
                }
            });

            // Set status soal yang sudah dikunci
            document.querySelectorAll('.question').forEach((question, index) => {
                const isLocked = localStorage.getItem(`locked_${index}`);

                if (isLocked === 'true') {
                    // Jika soal sudah dikunci, nonaktifkan pilihan jawaban dan kesulitan
                    document.querySelectorAll(`input[name="jawaban_${index}"]`).forEach(input => {
                        input.classList.add('locked'); // Menambah kelas locked
                    });
                    document.querySelectorAll(`input[name="kesulitan_${index}"]`).forEach(input => {
                        input.classList.add('locked'); // Menambah kelas locked
                    });

                    // Sembunyikan tombol kunci dan tampilkan tombol flip
                    const lockBtn = document.querySelector(`.lock-answer[data-index="${index}"]`);
                    const flipBtn = document.querySelector(`.flip-btn[data-index="${index}"]`);

                    lockBtn.disabled = true;
                    lockBtn.style.display = 'none'; // Sembunyikan tombol kunci

                    flipBtn.style.display = 'inline-block'; // Tampilkan tombol flip
                }
            });

            // Mulai hitung mundur
            const countdownTimer = setInterval(updateCountdown, 1000);
        });

        // Simpan soal terakhir yang dibuka ke localStorage
        function setActiveQuestion(index) {
            localStorage.setItem('activeQuestion', index);

            document.querySelectorAll('.question').forEach(q => {
                q.classList.remove('active');
            });
            document.getElementById('question-' + index).classList.add('active');

            document.querySelectorAll('.question-list-item').forEach(listItem => {
                listItem.classList.remove('active-item');
            });
            document.querySelector(`.question-list-item[data-index='${index}']`).classList.add('active-item');
        }

        // Simpan jawaban yang dipilih ke localStorage
        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.addEventListener('change', function() {
                const name = this.name;
                const value = this.value;
                localStorage.setItem(name, value);
            });
        });

        // Simpan status kunci jawaban ke localStorage
        document.querySelectorAll('.lock-answer').forEach(btn => {
            btn.addEventListener('click', function() {
                const index = this.getAttribute('data-index');

                // Simpan status terkunci ke localStorage
                localStorage.setItem(`locked_${index}`, 'true');

                const flipBtn = document.querySelector(`.flip-btn[data-index="${index}"]`);
                flipBtn.style.display = 'inline-block'; // Menampilkan tombol flip setelah jawaban dikunci
                this.disabled = true;
                this.style.display = 'none'; // Menonaktifkan tombol kunci setelah diklik

                // Tambahkan kelas locked pada radio button dan tingkat kesulitan
                document.querySelectorAll(`input[name="jawaban_${index}"]`).forEach(input => {
                    input.classList.add('locked'); // Menambah kelas locked
                });
                document.querySelectorAll(`input[name="kesulitan_${index}"]`).forEach(input => {
                    input.classList.add('locked'); // Menambah kelas locked
                });
            });
        });
        // Update waktu hitung mundur
        function updateCountdown() {
            const countdownElement = document.getElementById('countdown');
            const hours = Math.floor(waktu / 3600);
            const minutes = Math.floor((waktu % 3600) / 60);
            const seconds = waktu % 60;

            countdownElement.innerHTML =
                `Waktu Tersisa: ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

            // Simpan waktu tersisa ke localStorage
            localStorage.setItem('remainingTime', waktu);

            if (waktu > 0) {
                waktu--;
            } else {
                clearInterval(countdownTimer);
                alert('Waktu ujian telah habis!');
                // Lakukan aksi setelah waktu habis, misal kirim jawaban otomatis
            }
        }
    </script>
@endsection
