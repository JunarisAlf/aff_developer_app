<?php

namespace App\Http\Livewire\Marketing\MarketingReq;

use App\Models\User;
use Exception;
use Livewire\Component;

class MarketingRequestTable extends Component{
    public $marketings = [];
    protected $listeners = ['refresh_marketing_table' => 'refresh'];
    public function mount(){
        $this->marketings = User::where('role', 'marketing')->where('confirmed', false)->oldest()->get();
    }
    public function refresh(){
        $this->marketings = User::where('role', 'marketing')->where('confirmed', false)->oldest()->get();
    }
    public function accept($id){
        try{
            $marketing = User::find($id);
            $marketing->confirmed = true;
            $marketing->save();
            $this->emit('showSuccessAlert', 'Berhasil menerima request!');
            $this->emit('refresh_marketing_table');
        }catch(Exception $e){
            $this->emit('showDangerAlert', 'Server ERROR!');
        }
    }
    public function reject($id){
        $this->emit('openRejectModal', $id);
    }
    public function render(){
        return view('livewire.marketing.marketing-req.marketing-request-table');
    }
}
