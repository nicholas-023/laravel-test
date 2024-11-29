<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    public static function getAllPurchases()
    {
        return DB::table('purchases')
        ->select('products.name AS name', 'total_purchased_item AS quantity', 'purchases.created_at AS time', 'users.id AS user_id')
        ->where('purchases.user_id', Auth::user()->id)
        ->join('users', 'users.id', '=', 'purchases.user_id')
        ->join('products', 'products.id', '=', 'purchases.purchased_item_id')
        ->get();
    }

    public function make(Request $request)
    {
        if(!Auth::user()) {
            return redirect()->route('login')->with('message', "You haven't login");
        };

        $validated = $request->validate([
            'total_product' => 'numeric|min:1|max:99',
            'product_id' => 'numeric'
        ]);

        DB::table('purchases')->insert([
            'user_id' => Auth::user()->id,
            'purchased_item_id' => $validated['product_id'],
            'total_purchased_item' => $validated['total_product']
        ]);

        return redirect()->route('home')->with('purchaseMessage', 'Purchase Success');
    }
}
