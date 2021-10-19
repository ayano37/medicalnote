<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Medical;

class MedicalController extends Controller
{
    public function index(Request $request)
    {
        $posts = Medical::all()->sortByDesc('updated_at');//アップデート順に並べたもの全てを$postsに代入する
        $tempereture = Medical::select('temperature')->get()->sortByDesc('updated_at');
        $weight = Medical::select('weight')->get()->sortByDesc('updated_at');
        $period_s = Medical::select('period_s')->get()->sortByDesc('updated_at');
        $period_f = Medical::select('period_f')->get()->sortByDesc('updated_at');
        $injury = Medical::select('injury')->get()->sortByDesc('updated_at');

        if (count($posts) > 0) {  //$postsの配列が０以上だったら
            $headline = $posts->shift();  //その１つ目を取り出して$headlineに代入する
        } else {
            $headline = null;  //そうでなければnullを返す
        }

        // medical/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('medical.index', ['headline'=>$headline,'posts'=>$posts,'temperature'=>$tempereture,'weight'=>$weight,'period_s'=>$period_s,'period_f'=>$period_f,'injury'=>$injury]);
    }
}
