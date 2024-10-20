<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flip Card</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    <style>
        body {
            background-color: #f0f5f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .flip-card-container {
            display: flex;
            justify-content: center;
        }

        .flip-card {
            background-color: transparent;
            width: 1200px;
            height: 700px;
            perspective: 1500px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            display: none;
        }

        .flip-card-container .flip-card:first-child {
            display: block;
        }

        .flip-card-inner {
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.6s;
            transform-style: preserve-3d;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .flip-card-front,
        .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .flip-card-front {
            background-color: #ffffff;
            color: black;
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .flip-card-back {
            background-color: #ffffff;
            color: black;
            transform: rotateY(180deg);
            text-align: left;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .flip-btn {
            border: none;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 5px;
            margin-top: 10px;
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #6c757d;
            color: #ffffff;
        }

        .flip-btn:disabled {
            background-color: #dee2e6;
            cursor: not-allowed;
        }

        .flip-card.flipped .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-btn-success {
            background-color: #28a745;
            color: white;
        }

        .form-check-input:checked+.form-check-label {
            background-color: #0f174b;
            color: white;
        }

        .form-check-label {
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .form-check-label:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="flip-card-container">
                    @foreach ($data as $key => $question)
                    <div class="flip-card mb-4">
                        <div class="flip-card-inner">
                            <div class="flip-card-front p-3" style="text-align: left;">
                                <h5 class="card-title mb-3">Pertanyaan {{ $key + 1 }}</h5>
                                <p class="card-text mb-3">{{ $question->soal }}</p>
                                <img src="{{ asset('storage/images_kuis/' . $question->gambar) }}" alt=""
                                    width="200" height="150">
                                <div class="row mt-5">
                                    <div class="col">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="answer{{ $key }}"
                                                id="option1{{ $key }}" value="{{ $question->jawaban1 }}"
                                                onchange="enableFlipButton()">
                                            <label class="form-check-label" for="option1{{ $key }}">
                                                {{ $question->jawaban1 }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="answer{{ $key }}"
                                                id="option2{{ $key }}" value="{{ $question->jawaban2 }}"
                                                onchange="enableFlipButton()">
                                            <label class="form-check-label" for="option2{{ $key }}">
                                                {{ $question->jawaban2 }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="answer{{ $key }}"
                                                id="option3{{ $key }}" value="{{ $question->jawaban3 }}"
                                                onchange="enableFlipButton()">
                                            <label class="form-check-label" for="option3{{ $key }}">
                                                {{ $question->jawaban3 }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="answer{{ $key }}"
                                                id="option4{{ $key }}" value="{{ $question->jawaban4 }}"
                                                onchange="enableFlipButton()">
                                            <label class="form-check-label" for="option4{{ $key }}">
                                                {{ $question->jawaban4 }}
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="radio" name="answer{{ $key }}"
                                                id="option5{{ $key }}" value="{{ $question->jawaban5 }}"
                                                onchange="enableFlipButton()">
                                            <label class="form-check-label" for="option5{{ $key }}">
                                                {{ $question->jawaban5 }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flip-card-back p-3" style="text-align: left;">
                                <h5 class="card-title">Answer {{ $key + 1 }}</h5>
                                <p class="card-text" style="color: black;">{{ $question->jawaban_benar }}</p>
                            </div>
                            <button class="flip-btn flip-btn-success" onclick="flipCard(this)" disabled>
                                <i class="fas fa-sync-alt mr-2"></i>
                            </button>
                        </div>
                        <button class="btn btn-info check-answer-btn" onclick="checkAnswer(this)" disabled>Kunci Jawaban</button>
                    </div>
                    @endforeach
                </div>
                <button class="btn btn-primary float-right" onclick="nextQuestion()">Selanjutnya</button>
            </div>
            <div class="col">
                <div id="score-container">
                    <div class="card">
                        <form action="{{ route('play.simpan') }}" method="post">
                            @csrf
                            <div class="card-header">
                                <h5>Score:</h5>
                            </div>
                            <div class="card-body">
                                <input type="text" readonly name="score" id="score" class="form-control">
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" id="">
                                <input type="hidden" name="id_kuis" value="{{ $id_kelas }}" id="">
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-warning" type="submit">Simpan Score</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var currentQuestion = 0;
        var totalQuestions = {{ count($data) }};
        var score = 0;

        function flipCard(btn) {
            $(btn).closest(".flip-card").toggleClass("flipped");
        }

        function nextQuestion() {
            if (currentQuestion < totalQuestions - 1) {
                $(".flip-card").eq(currentQuestion).hide();
                $(".flip-card").eq(currentQuestion + 1).show();
                currentQuestion++;
                $(".check-answer-btn").prop("disabled", false);
                $(".flip-btn").prop("disabled", true);
                $("input[name='answer" + currentQuestion + "']").prop("disabled", false); // enable radio buttons for the next question
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Selesai',
                    text: 'Klik Simpan Score'
                });
            }
        }

        function enableFlipButton() {
            var isChecked = $("input[name^='answer']:checked").length > 0;
            $(".flip-btn").prop("disabled", !isChecked);
            $(".check-answer-btn").prop("disabled", !isChecked);
        }

        function checkAnswer(btn) {
            var questionIndex = $(".flip-card").index($(btn).closest(".flip-card"));
            var selectedAnswer = $("input[name='answer" + questionIndex + "']:checked").val();
            var correctAnswer = $(".flip-card").eq(questionIndex).find(".flip-card-back .card-text").text();

            if (selectedAnswer === correctAnswer) {
                var maxScore = 100;
                var nilai = $("#score").val();
                var userScore = maxScore / totalQuestions;
                userScore = Number(nilai) + userScore;
                $("#score").val(userScore);

                Swal.fire({
                    icon: 'success',
                    title: 'Jawaban Benar!',
                    text: 'Selamat! Jawaban Anda benar.'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Jawaban Salah!',
                    text: 'Maaf Jawaban Salah.'
                });
            }

            $("input[name='answer" + questionIndex + "']").prop("disabled", true); // disable radio buttons after checking answer
            $(btn).prop("disabled", true);
            $(".flip-btn").prop("disabled", false); // enable the flip button
        }
    </script>
</body>

</html>
