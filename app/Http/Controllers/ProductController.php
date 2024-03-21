<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(Product::paginate($request->input('per_page') ?? 15));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'=> 'required|string|min:3|max:30|unique:products,name',
            'amout'=> 'required|numeric'
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'name.unique' => 'O nome já está sendo utilizado',
            'name.min' => 'O nome precisa ter mais de 3 caracteres',
            'name.max' => 'O nome precisa ter menos de 30 caracteres',
            'amout.required' => 'O campo amout é obrigatório',
            'amout.numeric' => 'O valor precisa ser um número',
        ]);

        if($validation->fails()){
            return response()->json($validation->errors(), 422);
        }

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amout' => $request->input('amout'),
        ]);

        return response()->json([
            'message' => 'Product created!',
            'product' => $product
        ]);
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
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
