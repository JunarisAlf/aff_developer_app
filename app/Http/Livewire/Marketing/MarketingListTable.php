<?php

namespace App\Http\Livewire\Marketing;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class MarketingListTable extends Component{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // public $marketings = [];
    // public function mount(){
    //     $this->marketings = User::where('role', 'marketing')->where('confirmed', true)->latest()->paginate(50);
    // }
    // public function refresh(){
    //     $this->marketings = User::where('role', 'marketing')->where('confirmed', true)->latest()->paginate(50);
    // }  
    public function render(){
        return view('livewire.marketing.marketing-list-table', [
            'marketings' => User::where('role', 'marketing')->where('confirmed', true)->latest()->paginate(1)
        ]);
    }
}
