<?php

namespace App\Http\Livewire\Marketing;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class MarketingListTable extends Component{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate_count = 50, $data_count;
  
    public $statusSelect = [
        ['value' => 1, 'label' => 'Aktif'],
        ['value' => 0, 'label' => 'Suspend'],
    ];
    public $status = 1;
    public $searchQuery;
    public $searchField = ['value' => 'full_name', 'label' => 'Nama'];
    public $searchableField = [
        ['value' => 'full_name', 'label' => 'Nama'],
        ['value' => 'wa_number', 'label' => 'Nomor WA'],
        ['value' => 'email', 'label' => 'Email'],
    ];
    protected $data;
    public function updatingPaginateCount() {
        $this->resetPage();
    }
    public function searchFieldChange($key){
        $this->searchField = $this->searchableField[$key];
        $this->searchQuery = '';
    }
    public function statusChange($key){
        $this->status = $this->statusSelect[$key];
    }
    public function updated(){
        $this->resetPage();
        $this->data = $this->getData();
    }
    
    public function getData(){
        $marketings = User::where('role', 'marketing')->where('confirmed', true);
        if($this->searchQuery !== null && $this->searchField['value'] != 'default'){
            $marketings = $marketings->where($this->searchField['value'], 'like', "%$this->searchQuery%");
        }
        if($this->status != null){
            $marketings = $marketings->where('suspended', $this->status);
        }
        $this->data_count = $marketings->count();
        return $marketings;
    }
    public function render(){
        $this->data = $this->getData();
        return view('livewire.marketing.marketing-list-table', [
            'marketings' => $this->data->paginate($this->paginate_count)
        ]);
    }
}
