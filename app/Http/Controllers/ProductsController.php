<?php
//para que funcione agregar a las rutas
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
	public function index()
	{
		return Product::paginate(10);
	}

	public function show(Product $product)
	{	
		if ($product) {
			return $product;
		}
		else {
			return response()->json(['error' => 'Producto no disponible'], 404);
		}
	}

	public function store(Request $request)
	{
		$product = Product::create($request->all());

		return response()->json([
			'data' => $product,
			'message' => 'Producto creado correctamente'
		], 201);
	}

	public function update(Request $request, Product $product)
	{
		$product->update($request->all());

		return response()->json($product, 200);
	}

	public function delete(Product $product)
	{
		$product->delete();

		return response()->json(null, 204);
	}
}
