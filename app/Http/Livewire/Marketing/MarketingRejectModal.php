<?php

namespace App\Http\Livewire\Marketing;

use App\Models\User;
use Exception;
use Livewire\Component;

class MarketingRejectModal extends Component{
    public $show = false;
    public $data_id, $data_name;
    protected $listeners = ['openRejectModal' => 'openModal'];
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
    public function destroy($id){
        try {
            User::destroy($id);
            $this->show = false;
            $this->emit('showSuccessAlert', 'Berhasil menolak permintaan!');
            $this->emit('refresh_marketing_table');
        } catch (Exception $e) {
            $this->emit('showDangerAlert', 'Server ERROR!');
        }
    }
    public function render(){
        return view('livewire.marketing.marketing-reject-modal');
    }
}
