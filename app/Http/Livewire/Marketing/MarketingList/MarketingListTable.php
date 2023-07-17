<?php

namespace App\Http\Livewire\Marketing\MarketingList;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class MarketingListTable extends Component{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate_count = 50, $data_count;
    protected $listeners = ['refresh_marketing_table' => 'updated'];
    public $isSuspended = 0; 
    public $searchQuery;
    public $searchField = ['value' => 'full_name', 'label' => 'Nama'];
    public $searchableField = [
        ['value' => 'full_name', 'label' => 'Nama'],
        ['value' => 'wa_number', 'label' => 'Nomor WA'],
        ['value' => 'email', 'label' => 'Email'],
    ];
    public $shortField = 6;
    public $shortableField = [
        ['field' => 'full_name', 'short' => 'ASC', 'label'  => 'Nama Lengkap - Menaik'],
        ['field' => 'full_name', 'short' => 'DESC', 'label' => 'Nama Lengkap - Menurun'],
        ['field' => 'click',     'short' => 'ASC', 'label'  => 'Klik - Terbanyak'],
        ['field' => 'click',     'short' => 'DESC','label'  => 'Klik - Tersedikit'],
        ['field' => 'submit',    'short' => 'ASC', 'label' =>  'Submit - Terbanyak'],
        ['field' => 'submit',    'short' => 'DESC', 'label' => 'Submit - Tersedikit'],
        ['field' => 'created_at','short' => 'DESC', 'label' => 'Bergabung - Terbaru'],
        ['field' => 'created_at','short' => 'ASC', 'label' =>  'Bergabung - Terlama'],
    ];
    protected $data;
    public function updatingPaginateCount() {
        $this->resetPage();
    }
    public function searchFieldChange($key){
        $this->searchField = $this->searchableField[$key];
        $this->searchQuery = '';
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
        $marketings = $marketings->where('suspended', $this->isSuspended);
        // ORDER
        $shortRule = $this->shortableField[$this->shortField];
        $marketings->orderBy($shortRule['field'], $shortRule['short']);
        $this->data_count = $marketings->count();
        return $marketings;
    }
    public function render(){
        $this->data = $this->getData();
        return view('livewire.marketing.marketing-list.marketing-list-table', [
            'marketings' => $this->data->paginate($this->paginate_count)
        ]);
    }
}
