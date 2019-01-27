<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
class AdminController extends Controller
{
    public function index()
    {
//        Checks if the user is an Admin, if not send 404
        if(!Gate::allows('isAdmin')){
            abort(404, "Deze pagina is niet toegankelijk voor jou");
        }
        $users = User::all();
        return view('pages.adminpage', ['users' => $users]);
    }

    public function update($id) {
        if(!Gate::allows('isAdmin')){
            abort(404, "Deze pagina is niet toegankelijk voor jou");
        }
        $user = User::findOrFail($id);
        if($user->admin == 1){
            $user->admin = 0;
        }
        else {
            $user->admin = 1;
        }
        $user->save();
        return redirect()->route('adminpage');
    }

    public function destroy($id){
        if(!Gate::allows('isAdmin')){
            abort(404, "Deze pagina is niet toegankelijk voor jou");
        }
        $user = User::find($id);
        $user->delete();

        return redirect()->route('adminpage');
    }
}
