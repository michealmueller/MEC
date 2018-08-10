<?php

namespace App\Http\Controllers;

use EpicArrow\GitChangeLog\GitChangeLog;
use EpicArrow\GitChangeLog\Models\Commit;
use Illuminate\Http\Request;
use App\Http\Controllers\RssController as Rss;
use Illuminate\Support\Facades\Auth;

class gitCommitsLog extends Controller
{
    private $data;
    private $rss;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->rss = new Rss;
        $this->data = [
            'feeddata' => $this->rss->fetch(3),
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //dd(GitChangeLog::get(10));

        //make a symlink from project root/.git/logs/HEAD to public_html/gitLog
        $this->data['user'] = Auth::user();
        $this->data['commitLog'] = array_reverse(self::parseLog('gitLog'));
        //dd($this->data['commitLog']);
        return view('changelog')->with('data', $this->data);

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
        //
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
        //
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
        //
    }

    private function parseLog($log)
    {
        $logInfo = file($log);
        $history = array();
        foreach ($logInfo as $key => $line) {
            if (strpos($line, 'commit') === 0 || $key + 1 == count($line)) {
                $commit['hash'] = substr($line, strlen('commit') + 1);
            } else if (strpos($line, 'Author') === 0) {
                $commit['author'] = substr($line, strlen('Author:') + 1);
            } else if (strpos($line, 'Date') === 0) {
                $commit['date'] = substr($line, strlen('Date:') + 3);
            } elseif (strpos($line, 'Merge') === 0) {
                $commit['merge'] = substr($line, strlen('Merge:') + 1);
                $commit['merge'] = explode(' ', $commit['merge']);
            } else if (!empty($line)) {
                $commit['message'] = substr($line, 4);
                array_push($history, $commit);
                unset($commit);
            }
        }
        dd($history);
        return $history;
    }
}
