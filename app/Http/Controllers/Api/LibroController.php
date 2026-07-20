<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibroRequest;
use App\Http\Requests\UpdateLibroRequest;
use App\Http\Resources\LibroResource;
use App\Models\Libro;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LibroController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $libros = Libro::latest()->paginate(10);

        return LibroResource::collection($libros);
    }

    public function store(StoreLibroRequest $request): JsonResponse
    {
        $libro = Libro::create($request->validated());

        return (new LibroResource($libro))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Libro $libro): LibroResource
    {
        return new LibroResource($libro);
    }

    public function update(UpdateLibroRequest $request, Libro $libro): LibroResource
    {
        $libro->update($request->validated());

        return new LibroResource($libro);
    }

    public function destroy(Libro $libro): JsonResponse
    {
        $libro->delete();

        return response()->json(null, 204);
    }
}
