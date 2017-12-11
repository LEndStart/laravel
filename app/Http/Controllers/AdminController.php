<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\admin;
use App\problem;
use App\Wp;
class AdminController extends Controller
{
    public function admin(Request $request)
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $id = (Auth::user()->id);
            //dd($id);
            if (Admin::find($id) == "")
                return redirect()->back();
            else {
                return view('admin');
            }
        }
    }

    public function save(Request $request)
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $ChallengeData = $request->input('challenge');

            $problem = new Problem();
            //$problem->id = $ChallengeData['id'];
            $problem->type = $ChallengeData['type'];
            $problem->name = $ChallengeData['name'];
            $problem->flag = Hash::make($ChallengeData['flag']);
            $problem->value = $ChallengeData['value'];
            $problem->accept_num = 0;
            $problem->description = $ChallengeData['description'];
            $problem->file_name = $ChallengeData['file_name'];

            $problem->save();


            if ($request->isMethod('POST')) {
                $file = $request->file('challenge_file_source');
                //dd($file);
                if ($file->isValid()) {

                    $originalName = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $type = $file->getClientMimeType();
                    $realPath = $file->getRealPath();

                    $filename = uniqid() . '.' . $ext;
                    $bool = Storage::disk('uploads')->put($originalName, file_get_contents($realPath));
                    if ($bool) {
                        return redirect('admin')->with('success', '上传成功-' . $originalName);
                    }
                }
                exit;
            }
        }
    }
    public function save2(Request $request)
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $wpData = $request->input('wp');
            //dd($wpData);
            //$WpData = $request-input('wp');

            $wp = new Wp();
            //$problem->id = $ChallengeData['id'];

            $wp->uperid = Auth::user()->id;
            $wp->proid = $wpData['proid'];
            $wp->wpname = $wpData['file_name'];
            $wp->type = $wpData['type'];
            $wp->save();


            if ($request->isMethod('POST')) {
                $file = $request->file('source');
                //dd($file);
                if ($file->isValid()) {

                    $originalName = $file->getClientOriginalName();
                    $ext = $file->getClientOriginalExtension();
                    $type = $file->getClientMimeType();
                    $realPath = $file->getRealPath();

                    $filename = uniqid() . '.' . $ext;
                    $bool = Storage::disk('upload')->put($originalName, file_get_contents($realPath));
                    if ($bool) {
                        return redirect('admin')->with('success', '上传成功-' . $originalName);
                    }
                }
                echo "err";
                exit;
            }
        }
    }
}