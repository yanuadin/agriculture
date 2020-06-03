<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequest;
use App\Http\Requests\Admin\ItemUpdateRequest;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('user_id', Auth::user()->id)->get();

        return view('admin.item.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $itemRequest)
    {
        $image1 = $itemRequest->file('image1')->store('public/img/'.Auth::user()->id);
        $image2 = $itemRequest->file('image2')->store('public/img/'.Auth::user()->id);
        $image3 = $itemRequest->file('image3')->store('public/img/'.Auth::user()->id);

        Item::create([
            'user_id' => Auth::user()->id,
            'name' => $itemRequest->name,
            'quantity' => $itemRequest->quantity,
            'price' => $itemRequest->price,
            'discount' => $itemRequest->discount,
            'unit' => $itemRequest->unit,
            'description' => $itemRequest->description,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
        ]);

        return redirect()->route('admin.item.index')->with(['message' => 'Barang berhasil dibuat', 'alert-type' => 'success']);
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
        $item = Item::where('id', $id)->first();

        return view('admin.item.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function itemUpdate(ItemUpdateRequest $itemRequest, $id)
    {
        $item = Item::where('id', $id)->first();
        $image1 = $itemRequest->file('image1');
        $image2 = $itemRequest->file('image2');
        $image3 = $itemRequest->file('image3');

        $path1 = $item->image1;
        $path2 = $item->image2;
        $path3 = $item->image3;
        if($image1!=null){
            \File::delete(storage_path('app/').$item->image1);
            $path1 = $image1->store('public/img');
        }
        if($image2!=null){
            \File::delete(storage_path('app/').$item->image2);
            $path2 = $image1->store('public/img');
        }
        if($image3!=null){
            \File::delete(storage_path('app/').$item->image3);
            $path3 = $image1->store('public/img');
        }

        $item->update([
            'user_id' => Auth::user()->id,
            'name' => $itemRequest->name,
            'quantity' => $itemRequest->quantity,

            'price' => $itemRequest->price,
            'discount' => $itemRequest->discount,
            'unit' => $itemRequest->unit,
            'description' => $itemRequest->description,
            'image1' => $path1,
            'image2' => $path2,
            'image3' => $path3,
        ]);

        return redirect()->route('admin.item.index')->with(['message' => 'Barang berhasil diperbarui', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function itemDelete($id)
    {
        $item = Item::where('id', $id)->first();
        \File::delete(storage_path('app/').$item->image1);
        \File::delete(storage_path('app/').$item->image2);
        \File::delete(storage_path('app/').$item->image3);
        $item->delete();

        return redirect()->route('admin.item.index')->with(['message' => 'Barang berhasil dihapus', 'alert-type' => 'success']);
    }
}
