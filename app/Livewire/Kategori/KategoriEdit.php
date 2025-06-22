<?php
namespace App\Livewire\Kategori;

use Livewire\Component;
use App\Models\Kategori;
use Livewire\Attributes\Rule;

class KategoriEdit extends Component
{
    public Kategori $kategori; // Binding langsung ke model Kategori

    #[Rule('required|min:3|unique:kategoris,nama_kategori')]
    public $nama_kategori = '';

    public function mount(Kategori $kategori)
    {
        $this->kategori = $kategori;
        $this->nama_kategori = $kategori->nama_kategori;
    }

    public function update()
    {
        // Atur ulang rule unique agar tidak konflik dengan nama_kategori itu sendiri
        $this->validate([
            'nama_kategori' => 'required|min:3|unique:kategoris,nama_kategori,' . $this->kategori->id,
        ]);

        $this->kategori->update([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Kategori berhasil diperbarui.');
        return $this->redirect('/kategori', navigate: true); // Redirect ke halaman index
    }

    public function render()
    {
        return view('livewire.kategori.kategori-edit')->layout('layouts.app'); // Pastikan ada ini
    }
}
