<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;
use function PHPUnit\Framework\countOf;

class timestamp extends Controller
{
    public function countDigits($MyNum){
        $MyNum = (int)$MyNum;
        $count = 0;

        while($MyNum != 0){
            $MyNum = (int)($MyNum / 10);
            $count++;
        }
        return $count;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [
            "unix" => strtotime("now"),
            "utc" => gmdate("D, j F Y H:i:s T")
        ];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $date)
    {
        dd($date);
        if(is_numeric($date)) {
            if($this->countDigits($date) == 10) {
                return [
                    "unix" => $date *1000,
                    "utc" => gmdate("D, j F Y H:i:s T", $date)
                ];
            } else {
                $date = $date / 1000;
                return [
                    "unix" => $date *1000,
                    "utc" => gmdate("D, j F Y H:i:s T", $date)
                ];
            }
        } else {
            if(strtotime($date)) {
                return [
                    "unix" => strtotime($date),
                    "utc" => gmdate("D, j F Y H:i:s T", strtotime($date))
                ];
            } else {
                return [
                    "error" => 'Invalid Date'
                ];
            }
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
