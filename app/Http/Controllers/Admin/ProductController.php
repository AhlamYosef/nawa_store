<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catecory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

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
        $categories=Catecory::all();//
        return view('admin.products.create',[
            'product'=> new Product(),
            'categories' => $categories,
            'status_option' => [
                'active'=> 'Active',
                'draft'=> 'Draft',
                'archived'=> 'Archived',
            ],

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules=[
            'name'=> 'required|max:255|min:3',
            'slug'=> 'required|unique:products,slug',
            'category_id'=>'nullable|int|exists:catecories,id',
            'description'=> 'nullable|string',
            'short_description'=> 'nullable|string|max:500',
            'price'=> 'required|numeric|min:0',
            'compare_price'=> 'nullable|numeric|min:0|gt:price',
            'image'=> 'nullable|image|dimensions:min_width=400,min_height=300|max:1024',//kb
            'status' => 'required|in:active,draft,archived',
        ];
        $request->validate($rules);

        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        // $product->image = $request->input('image');
        $product->compare_price = $request->input('compare_price');
        $product->status = $request->input('status','active');
        $product->save();

        return redirect()
        ->route('products.index')
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
        $categories=Catecory::all();
        return view('admin.products.edit',[
            'product' => $product,
            'categories'=> $categories,
            'status_option' => [
                'active'=> 'Active',
                'draft'=> 'Draft',
                'archived'=> 'Archived',
            ],

        ]);

    }

    /**
     * 
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules=[
            'name'=> 'required|max:255|min:3',
            'slug'=> "required|unique:products,slug,$id",
            'category_id'=>'nullable|int|exists:catecories,id',
            'description'=> 'nullable|string',
            'short_description'=> 'nullable|string|max:500',
            'price'=> 'required|numeric|min:0',
            'compare_price'=> 'nullable|numeric|min:0|gt:price',
            'image'=> 'nullable|image|dimensions:min_width=400,min_height=300|max:1024',//kb
            'status' => 'required|in:active,draft,archived',

        ];
        $request->validate($rules);

        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->short_description = $request->input('short_description');
        $product->price = $request->input('price');
        // $product->image = $request->input('image');
        $product->compare_price = $request->input('compare_price');
        $product->status = $request->input('status','active');
        $product->save();

        return redirect()->route('products.index')//GET
        ->with('auccess',"Product({$product->name})update") ;//GET

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id', '=', $id)->first();
        $deleted = $product->delete();
              return response()->json(
            ['message' => $deleted ? 'Deleted successfully' : 'Deleted failled '],
            $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );

    }
}
