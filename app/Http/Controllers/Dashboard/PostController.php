<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

//validator para validar campos
//use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //Muestra la pagina principal del modelo
    public function index()
    {
        //consultamos todos los registros
        // $posts = Post::get();
        //dd($posts);

        //consultamos los registros registros por paginas
        $posts = Post::paginate(2);

        //psamos la vista con los datos
        return view('dashboard.post.index', compact('posts'));

        // dd($post);

        // Post::create(
        //     [
        //         'title' => 'test title',
        //         'slug' => 'test slug',
        //         'content' => 'test contenido',
        //         'category_id' => 1,
        //         'description' => 'test descripcion',
        //         'posted' => 'not',
        //         'image' => 'test imagen',
        //     ]
        // );

    }

    //muestra el formulario para crear un nuevo registro(pasa catalagos de relaciones foraneas)
    public function create()
    {
        //optenemos los datos de las categorias con pluck para que nos de un arreglo mas manegable
        $categorias = Category::pluck('id', 'title');
        return view('dashboard.post.create', compact('categorias'));
    }

    //recibe el formulario para la insercionde nuevos registros he inserta el registro en la db
    public function store(StoreRequest $request)
    {
        //imagen
        $data = $request->validated();

        //     $image = $request->file('image');
        //     $path = $image->getClientOriginalName();
        //    dd($data['image']->getClientOriginalName());

        if (isset($data['image'])) {
            //$data['image'] = $fileName = time().'.'.$data['image']->extension();
            $data['image'] = $fileName = $data['image']->getClientOriginalName();

            //movemos la imagen al servidor(a la ruta que queremos)
            $request->image->move(public_path('uploads/posts'), $fileName);
        }

        //creamos el registro con todos los datos
        Post::create($data);
        //Post::create($request->validated());

        //redirigimos despues de insertar
        return to_route('post.index')->with('status', 'Post Creado');


        //validamos los datos con validator este no da la redireccion automatica a back si ay errores
        // $validated = Validator::make($request->all(),
        //     [
        //     'title' => 'required|min:5|max:500',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:5',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:5',
        //     'posted' => 'required',
        // ]);
        //dd($validated->errors());


        //validamos los datos recividos
        // $request->validate([
        //     'title' => 'required|min:5|max:500',
        //     'slug' => 'required|min:5|max:500',
        //     'content' => 'required|min:5',
        //     'category_id' => 'required|integer',
        //     'description' => 'required|min:5',
        //     'posted' => 'required',
        // ]);


        //creamos el registro con los datos que selecionemos
        // Post::create(
        //     [
        //         'title' => $request->all()['title'],
        //         'slug' => $request->all()['slug'],
        //         'content' => $request->all()['content'],
        //         'category_id' => $request->all()['category_id'],
        //         'description' => $request->all()['description'],
        //         'posted' => $request->all()['posted'],
        //         // 'image' => $request->all()['image'],
        //     ]
        // );

        //dd($request->get('title'));    
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //optenemos las categorias
        $categorias = Category::pluck('id', 'title');

        //redirigimos a la vista y pasamos los datos del registro y las relaciones foraneas
        return view('dashboard.post.edit', compact('categorias', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        //imagen
        $data = $request->validated();

        //     $image = $request->file('image');
        //     $path = $image->getClientOriginalName();
        //    dd($data['image']->getClientOriginalName());

        if (isset($data['image'])) {
            //$data['image'] = $fileName = time().'.'.$data['image']->extension();
            $data['image'] = $fileName = $data['image']->getClientOriginalName();

            //movemos la imagen al servidor(a la ruta que queremos)
            $request->image->move(public_path('uploads/posts'), $fileName);
        }

        // dd(public_path('upload/posts'));

        //actualizamos el regidtro con todos los datos
        $post->update($data);

        //redirigimos a la vista deceada
        return to_route('post.index')->with('status', 'Post editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //eliminamos el registro
        $post->delete();

        //rederigimos a la pagina deceada
        return to_route('post.index')->with('status', 'Post eliminado');
    }
}
