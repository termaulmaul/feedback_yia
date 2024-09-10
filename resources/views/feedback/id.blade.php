<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Yogyakarta International Airport</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            color: #242632;
        }

        h3 {
            color: #242632;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        .rating {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 10px;
        }

        .rating label {
            cursor: pointer;
            font-size: 2em;
            color: #dcdcdc;
            transition: color 0.2s;
        }

        .rating .selected {
            color: #f5c518;
        }

        .textarea-container, .input-container {
            margin-bottom: 20px;
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #242632;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: auto;
        }

        button:hover {
            background-color: #1d1f2a;
        }

        .language-switcher {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .language-switcher a {
            text-decoration: none;
            color: #242632;
            font-weight: bold;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px 10px;
            margin-left: 5px;
            transition: background-color 0.3s ease;
        }

        .language-switcher a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="language-switcher">
        <a href="{{ route('feedback.en') }}">ID</a>
    </div>

    <div class="container">
        <h2>Feedback Yogyakarta International Airport</h2>
        <form action="{{ route('submit-feedback') }}" method="POST">
            @csrf
            <div class="input-container">
                <h3>Fasilitas</h3>
                <label>Ruang Menyusui, Musholla, Area Merokok, FIDS, WiFi</label>
                <div class="rating" id="facility_rating">
                    @for($i = 1; $i <= 5; $i++)
                        <label for="facility_star_{{$i}}" title="{{ $i }} star">&#9733;</label>
                    @endfor
                    <input type="hidden" name="facility_rating" id="facility_rating_input" value="0" />
                </div>
            </div>

            <div class="input-container">
                <h3>Staf</h3>
                <label>Customer Service, Porter, Cleaning Service, Aviation Security, Trolley Man</label>
                <div class="rating" id="staff_rating">
                    @for($i = 1; $i <= 5; $i++)
                        <label for="staff_star_{{$i}}" title="{{ $i }} star">&#9733;</label>
                    @endfor
                    <input type="hidden" name="staff_rating" id="staff_rating_input" value="0" />
                </div>
            </div>

            <div class="input-container">
                <h3>Proses</h3>
                <label>Proses Check-in, Pemeriksaan Keamanan, Pengambilan Bagasi</label>
                <div class="rating" id="process_rating">
                    @for($i = 1; $i <= 5; $i++)
                        <label for="process_star_{{$i}}" title="{{ $i }} star">&#9733;</label>
                    @endfor
                    <input type="hidden" name="process_rating" id="process_rating_input" value="0" />
                </div>
            </div>

            <div class="textarea-container">
                <h3>Saran</h3>
                <textarea name="suggestion" placeholder="Tulis saran Anda"></textarea>
            </div>

            <div class="input-container">
                <h3>Informasi Kontak</h3>
                <input type="text" name="contact_info" placeholder="Email atau Nomor Telepon Anda">
            </div>

            <button type="submit">Kirim Feedback</button>
        </form>
    </div>

    <script>
        function handleRatingClick(event) {
            const labels = Array.from(event.currentTarget.querySelectorAll('label'));
            const clickedIndex = labels.indexOf(event.target);
            const input = event.currentTarget.querySelector('input[type="hidden"]');

            if (clickedIndex >= 0) {
                labels.forEach((label, index) => {
                    label.classList.toggle('selected', index <= clickedIndex);
                });
                input.value = clickedIndex + 1;
            }
        }

        document.querySelectorAll('.rating').forEach(ratingElement => {
            ratingElement.addEventListener('click', handleRatingClick);
        });
    </script>
</body>
</html>
