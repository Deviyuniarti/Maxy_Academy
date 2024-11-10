@extends('layouts.index')

@section('content')
<div class="container">
    <h2>Buat dan Isi Survei</h2>
    <div id="surveyContainer"></div>
</div>

<!-- Menyertakan skrip SurveyJS di halaman ini -->
<script src="https://unpkg.com/survey-core@1.9.2/survey.core.min.js"></script>
<script src="https://unpkg.com/survey-creator-core@1.9.2/survey.creator.core.min.js"></script>

<script>
    // Membuat survei dengan konfigurasi tertentu
    const surveyJSON = {
        title: "Survei Pengalaman Pengguna",
        description: "Kami ingin tahu pendapat Anda tentang pengalaman menggunakan aplikasi kami.",
        questions: [
            {
                type: "radiogroup",
                name: "satisfaction",
                title: "Seberapa puas Anda dengan aplikasi kami?",
                isRequired: true,
                choices: ["Sangat Puas", "Puas", "Cukup Puas", "Tidak Puas"]
            },
            {
                type: "text",
                name: "feedback",
                title: "Apa yang bisa kami tingkatkan?",
                isRequired: false
            },
            {
                type: "rating",
                name: "recommendation",
                title: "Seberapa besar kemungkinan Anda untuk merekomendasikan aplikasi ini kepada teman atau keluarga?",
                rateValues: [
                    { value: 1, text: "Sangat Tidak Mungkin" },
                    { value: 2, text: "Tidak Mungkin" },
                    { value: 3, text: "Mungkin" },
                    { value: 4, text: "Sangat Mungkin" }
                ]
            }
        ]
    };

    // Membuat survei dan merender ke dalam container
    const survey = new SurveyResult.Model(surveyJSON);
    survey.render("surveyContainer");

    // Menyimpan hasil survei ketika selesai
    survey.onComplete.add((survey) => {
        fetch('/survey-results', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(survey.data)
        }).then(response => response.json())
          .then(data => alert(data.message));
    });
</script>
@endsection
