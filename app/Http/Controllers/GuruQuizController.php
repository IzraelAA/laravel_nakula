<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GuruQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->get('id_sekolah') == "") {
            return redirect()->route('login');
        } else {
            $data['id'] = $request->session()->get('id_sekolah');
            $data['id_guru'] = $request->session()->get('id_guru');
            $quiz = DB::table('data_quiz')
                ->join('mata_pelajaran', 'data_quiz.id_mapel', '=', 'mata_pelajaran.id_mapel')
                ->join('guru', 'data_quiz.id_guru', '=', 'guru.id_guru')
                ->join('kelas', 'data_quiz.id_kelas', '=', 'kelas.id_kelas')
                ->where('guru.id_guru', $data['id_guru'])->get();
            $jadwal = DB::table('jadwal_pelajaran')
                ->join('mata_pelajaran', 'jadwal_pelajaran.id_mapel', '=', 'mata_pelajaran.id_mapel')->where('jadwal_pelajaran.id_guru', '=', $data['id_guru'])->get();
            // dd($jadwal);
            return view('guru.quiz.index', [
                'data' => $data,
                'quiz' => $quiz,
                'jadwal' => $jadwal
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_quiz' => 'required',
        ]);
        $mapel = DB::table('mata_pelajaran')->where('id_mapel', request('id_mapel'))->get();
        $array = json_decode(json_encode($mapel), true);
        $datamapel = $array['0'];

        DB::table('data_quiz')->insert([
            'nama_quiz' => request('nama_quiz'),
            'type' => request('type'),
            'id_mapel' => request('id_mapel'),
            'id_sekolah' => request('id_sekolah'),
            'id_guru' => $datamapel['id_guru'],
            'id_kelas' => $datamapel['id_kelas'],

        ]);

        return redirect()->route('guru-quiz.index')->with('create', ' Berhasil Ditambah!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $id;
        $soal = DB::table('quiz')->where('id_dataquiz', $data)->get();
        // dd($soal);
        $relasi = DB::table('data_quiz')
            ->join('mata_pelajaran', 'data_quiz.id_mapel', '=', 'mata_pelajaran.id_mapel')
            ->join('guru', 'data_quiz.id_guru', '=', 'guru.id_guru')
            ->where('id_dataquiz', $id)->get();
        // dd($relasi);
        return view('guru.quiz.view', [
            'relasi' => $relasi,
            'soal' => $soal
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('data_quiz')->where('id_dataquiz', $id)->delete();

        return redirect()->route('guru-quiz.index')->with('create', 'Data Berhasil Dihapus!!');
    }

    public function insert(Request $request)
    {

        DB::table('quiz')->insert([
            'id_dataquiz' => request('id_dataquiz'),
            'quiz' => request('quiz'),
        ]);

        return redirect()->route('guru-quiz.edit', request('id_dataquiz'))->with('create', ' Berhasil Ditambah!!');
    }
}
