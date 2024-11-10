<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveyResult;

class SurveyController extends Controller
{
    /**
     * Menampilkan halaman survey.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('pages.survey.show'); 
    }

    /**
     * Menyimpan hasil survey yang di-submit oleh pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
{
    // Mengambil data hasil survei dari request
    $data = $request->all();

    // Menyimpan hasil survei ke dalam database
    $surveyResult = new SurveyResult(); // Membuat instance dari model SurveyResult
    $surveyResult->result = json_encode($data); // Menyimpan hasil survei dalam format JSON
    $surveyResult->save(); // Menyimpan ke database

    // Mengembalikan respon sukses
    return response()->json([
        'success' => true,
        'message' => 'Survey result has been successfully saved!'
    ]);
}

}
