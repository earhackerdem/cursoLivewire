<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostComponent extends Component
{
    use WithPagination;

    public $body,$name,$post_id;
    public $accion = "store";

    protected $rules = [
        'name' =>'required',
        'body' => 'required'
    ];

    protected $validationAttributes = [
        'body' => 'cuerpo del post'
    ];

    protected $messages = [
        'name.required' => 'Por favor ingrese el nombre que es obligatorio'
    ];

    public function render()
    {
        $posts = Post::latest('id')->paginate(10);
        return view('livewire.post-component',compact('posts'));
    }

    public function store()
    {
        $this->validate([
            'name' =>'required|max:10',
            'body' =>'required'
        ]);

        Post::create([
            'name' => $this->name,
            'body' => $this->body
        ]);

        $this->reset(['name','body']);
    }

    public function edit(Post $post)
    {
        $this->name = $post->name;
        $this->body = $post->body;
        $this->post_id = $post->id;
        $this->accion = 'update';
    }

    public function update()
    {
        $this->validate();

        $post = Post::find($this->post_id);
        $post->update([
            'name' => $this->name,
            'body' => $this->body
        ]);

        $this->reset(['name','body','accion']);
    }

    public function default()
    {
        $this->reset(['name','body','accion']);
    }

    public function destroy(Post $post)
    {
        $post->delete();
    }
}
