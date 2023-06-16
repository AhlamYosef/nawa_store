<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // SELECT products.*,categories.name as category_name FROM products
        // INNER JOIN caregories ON caregories.id = products.category_id
        // $products = DB::table('products')
        // ->leftjoin('catecories','catecories.id','=','products.category_id')
        // ->select([
        //     'products.*',
        //     'catecories.name as category_name',
        // ])
        // ->get();// collection object = array
        // select * from products
        $products = Product::leftjoin('catecories','catecories.id','=','products.category_id')
        ->select([
            'products.*',
            'catecories.name as category_name',
        ])
        ->get();
        return view('admin.products.index',[
            'title'=> 'products List',
            'products'=> $products,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        // $product->image = $request->input('image');
        $product->compare_price = $request->input('compare_price');
        $product->save();
        return redirect()->route('products.index')
        ->with('auccess',"Product({$product->name})created") ;//GET


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $product = Product::where('id', '=' , $id)->first();//لاسترجاع قيمة واحدة فقط return Model
        // if (!$product){
        //     abort(404);
        // }
        $product = Product::findOrFail($id);
        return view('admin.products.edit',[
            'product' => $product,

        ]);

    }

    /**
     * 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        // $product->image = $request->input('image');
        $product->compare_price = $request->input('compare_price');
        $product->save();
        return redirect()->route('products.index')//GET
        ->with('auccess',"Product({$product->name})update") ;//GET

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Product::destroy($id);

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
        ->route('products.index')
        ->with('auccess',"Product({$product->name})deleted") ;//GET

    }
}
