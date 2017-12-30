<?php
namespace app\http\Controllers;
use App\Http\Controllers\Controller;
use App\Problem;
use App\Solve;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Team;
use App\Relation;
class TeamController extends Controller{
    public function createteam(Request $request){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        if($request->isMethod('get'))
            return view('createteam');
        else{

            $id=(Auth::user()->id);
            $mark = Relation::where(['memberid' => $id])->first();
            if($mark==null){
                $Data = $request->input('team');
                if($Data==null) return redirect('createteam')->with('fail', '队伍名为空');
                $team = new Team();
                $team->teamname = $Data['name'];
                $team->save();

                $team2=Team::where('teamname','=',$Data['name'])->get()->first();

                $relation=new Relation();
                $relation->teamid=$team2->id;
                $relation->memberid=$id;
                $relation->save();

                return redirect('createteam')->with('success', '你的队伍邀请码为' . Hash::make($team2->id));
            }
            else return redirect('createteam')->with('fail', '已入队或重复创建队伍');
        }
    }

    public function jointeam(Request $request){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        if($request->isMethod('get'))
            return view('jointeam');
        else{
            $Data = $request->input('team');
            $team=0;
            for($i=1;$i<=100;$i++){
                if(Hash::check($i, $Data['name'])){
                    $team=$i;
                    break;
                }
            }
            if($team){
                $id=(Auth::user()->id);
                $mark = Relation::where(['memberid' => $id])->first();
                if($mark==null){
                    $relation=new Relation();
                    $relation->teamid=$team;
                    $relation->memberid=$id;
                    $relation->save();
//dd($team2);
                    return redirect('jointeam')->with('success', 'Good Luck' );
                }
                else return redirect('jointeam')->with('fail', '重复入队' );
            }
            else{
                return redirect('jointeam')->with('fail', '无效邀请码' );
            }
        }
    }

    public function teamlist(Request $request){
        if(Auth::check() == false)
        {
            return redirect()->intended('/login');
        }
        else {
            $teams =Team::all();
            $results=array();
            for($i=0;$i<count($teams);$i++){
                $temp=array();
                $relation=Relation::where(['teamid'=>$teams[$i]['id']])->get();
                //print_r($relation);
                //var_dump($i,$relation);
                //print_r($i);
                $info=array();
                for($j=0;$j<count($relation);$j++){//将所有小组成员的做题的id加入info数组

                    $solves=Solve::where(['userid'=>$relation[$j]['memberid']])->get();
                    for($k=0;$k<count($solves);$k++){
                        array_push($info,$solves[$k]['proid']);
                    }

                }
                $info=array_unique($info);//去重

                $score=0;
                for($x=0;$x<count($info);$x++){
                    $pro=Problem::where(['id'=>$info[$x]])->get()->first();
                    $score+=$pro->value;
                }

                $temp['score']=$score;
                $temp['id']=$teams[$i]['id'];
                $temp['name']=$teams[$i]['teamname'];


                array_push($results,$temp);
            }
            arsort($results);
            //dd($results);
            return view('teamList', [
                'results' => $results,
                'rank'=>1,
            ]);
        }
    }
}