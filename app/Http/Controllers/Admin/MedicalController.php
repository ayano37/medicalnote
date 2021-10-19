<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Medical;

class MedicalController extends Controller
{
  public function add()
  {
    return view('admin.medical.create');
  }
  
  public function create(Request $request)
  {
    //dd($request);
    // Validationを行う
    //$this->validate($request, Medical::$rules);
    //Medicalクラスをインスタンス化
    $medical = new Medical;
    $form = $request->all();

    // formに画像があれば、保存する
    if (isset($form['image'])) {
      $path = $request->file('image')->store('public/image');
      $medical->image_path = basename($path);
    } else {
        $medical->image_path = null;
    }
      unset($form['_token']);
      unset($form['image']);
      // データベースに保存する
      $medical->fill($form);
      $medical->save();
      // admin/medical/indexにリダイレクトする
      return redirect('admin/medical/');
  } 
  
  public function index(Request $request)
  {
    //cond_titleという名前の検索窓にユーザーが入力した値を$requestとして入れて、$cond_titleという変数に代入する
    $cond_title = $request->cond_title;
    if ($cond_title != '') { //検索窓が空欄では無い場合＝検索窓になんかしら文字が入っている時、
        // 検索されたら検索結果を取得する
        $posts = Medical::where('injury', 'like','%'.$cond_title.'%')->get();
        //マイグレーションファイル内Medicalsテーブルの中のinjuryと入力値が一致したものを探しに行く
        //where('カラム名','オペレーター','カラムに対して比較する値')(%:空白文字を含む任意の複雑文字)
        //Medicalテーブルのinjuryカラムの中から入力値($cond_title)を含むものを探してねっていう命令文。
    } else {
        // それ以外はすべてのニュースを取得する
        $posts = Medical::all();
    }
      return view('admin.medical.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
  public function edit(Request $request)
  {
      // Medical Modelからデータを取得する
      $medical = Medical::find($request->id);
      if (empty($medical)) {
        abort(404);    
      }
      return view('admin.medical.edit', ['medical_form' => $medical]);
  }

  public function update(Request $request)
  {
      // Validationをかける
      //$this->validate($request, Medical::$rules);
      // Medical Modelからデータを取得する
      $medical = Medical::find($request->id);
      // 送信されてきたフォームデータを格納する
      $medical_form = $request->all();
      if ($request->remove == 'true') {
          $medical_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $medical_form['image_path'] = basename($path);
      } else {
          $medical_form['image_path'] = $medical->image_path;
      }
      
      unset($medical_form['image']);
      unset($medical_form['remove']);
      unset($medical_form['_token']);

      // 該当するデータを上書きして保存する
      $medical->fill($medical_form)->save();
      return redirect('admin/medical');
  }
  
  public function delete(Request $request)
  {
      // 該当するMedical Modelを取得
      $medical = Medical::find($request->id);
      // 削除する
      $medical->delete();
      return redirect('admin/medical/');
  }
}
