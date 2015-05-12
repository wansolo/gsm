<?php

class SearchController extends \BaseController {

	public function executeSearch()
    {
        $keywords = Input::get('keywords');
      
        $users = User::all();

        $searchUsers=new \Illuminate\Database\Eloquent\Collection();

        foreach($users as $u)
        {
            if(Str::contains($u->username,$keywords))
                $searchUsers->add($u);
        }

        return View::make('dashboard.search-file')->with('searchUsers',$searchUsers);
    }

    
}
