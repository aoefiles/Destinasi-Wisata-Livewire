<?php
namespace App\Livewire\Ulasan;

use Livewire\Component;
use App\Models\Ulasan;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;

class CreateUlasan extends Component
{
    public $wisataId;

    #[Rule('required|integer|min:1|max:5')]
    public $rating = 0;

    #[Rule('required|min:10')]
    public $komentar = '';

    public function mount($wisataId)
    {
        $this->wisataId = $wisataId;
    }

    public function store()
    {
        if (!Auth::check()) {
            session()->flash('error', 'Anda harus login untuk memberikan ulasan.');
            return $this->redirect('/login', navigate: true);
        }

        $this->validate();

        Ulasan::create([
            'wisata_id' => $this->wisataId,
            'user_id' => Auth::id(),
            'rating' => $this->rating,
            'komentar' => $this->komentar,
        ]);

        session()->flash('message', 'Ulasan Anda berhasil ditambahkan.');
        $this->reset(['rating', 'komentar']); // Reset form
        $this->dispatch('ulasanAdded'); // Emit event ke komponen induk (WisataDetail)
    }

    public function render()
    {
        return view('livewire.ulasan.create-ulasan');
    }
}