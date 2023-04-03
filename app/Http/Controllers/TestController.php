<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\TestData;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = '{"custom":[{"type":"parent","id":1},{"type":"children","id":2,"data":"Hallo I\'m Apple","parent_id":1},{"type":"parent","id":3},{"type":"children","id":4,"data":"Hallo I\'m Orange","parent_id":3},{"type":"children","id":5,"data":"Hallo I\'m Banana","parent_id":3},{"type":"children","id":6,"data":"Hallo I\'m Human","parent_id":null}]}';

        // dd(json_decode($data, true));
        $encodeData = json_decode($data, true);
        $newArr = array();
        foreach ($encodeData['custom'] as $key => $value) {
            if($value['type'] == 'parent' || !isset($value['parent_id']) || is_null($value['parent_id'])) {
                $newArr['custom'][] = $value;
            } else {
                $keyParent = array_search($value['parent_id'], array_column($newArr['custom'], 'id'));
                $newArr['custom'][$keyParent]['data'][] = $value;
            }
        }

        dd($newArr);

        // $response = Http::get('https://api.github.com/repositories');
        // if($response->successful()) {
        //     // dd($response->json());
        //     foreach ($response->json() as $key => $value) {
        //         $test = TestData::updateOrCreate(['id' => $value['id']], [
        //             'id' => $value['id'],
        //             'name' => $value['name'],
        //             'full_name' => $value['full_name']
        //         ]);
        //     }

        //     dd("sukses");
        //     // dd($response->json());
        // } else {
        //     dd("GAGAL");
        // }
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
}
