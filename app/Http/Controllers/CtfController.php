<?php

namespace app\http\Controllers;
use App\Http\Controllers\Controller;
use App\Problem;
use App\Solve;
use App\Admin;
use App\Wp;
use Illuminate\Http\Request;
use App\ctfList;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
use App\forum_comment;
//use Illuminate\Http\RedirectResponse;
class CtfController extends Controller
{
    public function problem()
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else
        {
            $pwn=Problem::where('type','=','pwn')->get();
            $reverse=Problem::where('type','=','reverse')->get();
            $web=Problem::where('type','=','web')->get();
            $misc=Problem::where('type','=','misc')->get();
            $crypto=Problem::where('type','=','crypto')->get();
            $android=Problem::where('type','=','android')->get();

            return view('problem', [
                'pwns'=>$pwn,
                'reverses'=>$reverse,
                'webs'=>$web,
                'miscs'=>$misc,
                'cryptos'=>$crypto,
                'androids'=>$android,
            ]);
        }

    }

    public function flag(Request $request,$pro_id)
    {

        //$pro_id=$_POST['pro_id'];
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $upflag = $request->flag;
            $pro = Problem::find($pro_id);
            $id = (Auth::user()->id);
            if (Hash::check($upflag, $pro->flag)) {
                //if($upflag==$pro->flag){

                $mark = Solve::where(['userid' => $id, 'proid' => $pro_id,])->first();
                if ($mark == null) {
                    $pro->accept_num += 1;
                    $pro->save();

                    //修改用户表
                    $user = ctfList::find($id);
                    $user->score += $pro->value;
                    $user->save();
                    //修改solve表
                    $solve = New Solve;
                    $solve->proid = $pro_id;
                    $solve->userid = $id;
                    $solve->protype = $pro->type;
                    $solve->save();
                }
                //dd($pro);
                return redirect()->intended('/problem')->with('isflag', 'success');
            } else {

                return redirect()->intended('/problem')->with('isflag', 'fail');
            }
        }
    }

    public function passage()
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            return view('passage');
        }
    }

    public function wp()
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $pwn = Wp::where('type', '=', 'pwn')->paginate(7);
            $reverse = Wp::where('type', '=', 'reverse')->get();
            $web = Wp::where('type', '=', 'web')->get();
            $misc = Wp::where('type', '=', 'misc')->get();
            $crypto = Wp::where('type', '=', 'crypto')->get();
            $android = Wp::where('type', '=', 'android')->get();

            return view('wp', [
                'pwns' => $pwn,
                'reverses' => $reverse,
                'webs' => $web,
                'miscs' => $misc,
                'cryptos' => $crypto,
                'androids' => $android,
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    /*public function  upload(Request $request)
    {

        if($request->isMethod('POST'))
        {
            $file=$request->file('source');

            if($file->isValid())
            {
                $originalName = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $type = $file->getClientMimeType();
                $realPath = $file->getRealPath();

                $filename = uniqid().'.'.$ext;

                $bool =Storage::disk('upload')->put($originalName,file_get_contents($realPath));
                if($bool)
                {
                    return redirect('wp')->with('success','上传成功-' . $originalName);
                }
            }

            exit;
        }

        return view('upload');
    }*/



    public function ctfList()
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $users = ctfList::orderBy('score','desc')->get();

            $count = 1;

            return view('ctfList', [
                'users' => $users,
                'rank' => $count,
            ]);
        }
    }

//    public function insert()
//    {
//        ctfList::insert('insert into user(id,name,score) values(?,?,?)',['1','dong',10000]);
//    }

    public function forum(){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else{
            return view('forum');
        }

    }

    public function forum_content($title){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else{
            $forum = forum_comment::where('title','=',$title)->get();
            //dd($forum[0]->content);
            return view('forum.content',[
                'forum'=>$forum
            ]);
        }

    }

    public function forum_view($type){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $forums = forum_comment::where('type', '=', $type)->orderBy('updated_at', 'desc')->paginate(6);
            return view('forum.view', [
                'forums' => $forums
            ]);
        }
    }
    public function forum_comment($type){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            return view('forum.comment', [
                'type' => $type
            ]);
        }
    }
    public function forum_save($type,Request $request){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            if($type!='pwn'&&$type!='web'&&$type!='reverse'&&$type!='misc'&&$type!='crypto'&&$type!='android'){
                return redirect()->back();
            }

            $data = $request->input('forum_comment');  //key是表单中input中的name属性的数组名
            $title1=str_replace('/','', $data['title']);
            $title=str_replace('\\','', $title1);

            $forum_comment = new forum_comment();
            $id = (Auth::user()->id);
            $forum_comment->uperid = $id;
            $forum_comment->type = $type;
            $forum_comment->title = $title;
            $forum_comment->content = $data['content'];
            if ($forum_comment->save()) {
                return redirect('forum/view/' . $type);
            } else {
                return redirect()->back();
            };
        }
    }

    public function fopenwp(Request $request)
    {
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            if ($request->isMethod('POST')) {
                $data = $request->input('data');
                $name = $data['wpname'];
                return view('fopenwp', [
                    'name' => $name,
                ]);
            }
        }

    }


}
