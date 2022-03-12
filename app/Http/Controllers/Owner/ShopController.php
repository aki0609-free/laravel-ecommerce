<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next) {

            $id = $request->route()->parameter('shop');
            if (!is_null($id)) {
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                $ownerId = Auth::id();
                if ($shopId !== $ownerId) {
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index', compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);

        return view('owner.shops.edit', compact('shop'));
    }

    public function update(UploadImageRequest $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'info' => 'required|string|max:1000',
            'is_selling' => 'required'
        ]);

        $imageFile = $request->image;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'shops');
        }
        $shop = Shop::findOrFail($id);
        $shop->name = $request->name;
        $shop->information = $request->info;
        $shop->is_selling = $request->is_selling;
        if (!is_null($imageFile) && $imageFile->isValid()) {
            $shop->fileName = $fileNameToStore;
        }
        $shop->save();

        return redirect()->route('owner.shops.index')->with([
            'message' => 'Shop updated successfully'
        ]);
    }
}
