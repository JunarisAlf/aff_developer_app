<?php

namespace App\Http\Livewire\Marketing\MarketingList;

use App\Models\User;
use Exception;
use Livewire\Component;

class MarketingSuspendModal extends Component{
    public $show = false;
    public $data_id, $data_name;
    protected $listeners = ['openSuspendModal' => 'openModal'];
    public function openModal($id){
        try {
            $marketing = User::find($id);
            $this->data_id = $marketing->id;
            $this->data_name = $marketing->full_name;
            $this->show = true;
        } catch (Exception $e) {
            $this->emit('showDangerAlert', 'Server ERROR!');
        }
    }
    public function changeStatus($id){
        try {
            $marketing = User::find($id);
            $marketing->suspended = !$marketing->suspended;
            $marketing->save();
            $this->show = false;
            $this->emit('showSuccessAlert', 'Berhasil merubah status marketing!');
            $this->emit('refresh_marketing_table');
        } catch (Exception $e) {
            $this->emit('showDangerAlert', 'Server ERROR!');
        }
    }
    public function render(){
        return view('livewire.marketing.marketing-list.marketing-suspend-modal');
    }
}
