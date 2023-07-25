<?php

namespace App\Http\Livewire\Property\PropertyList;

use Livewire\Component;

class PropertyDetail extends Component {
    public $summaries = [
        ['key' => '1', 'value' => ''],
        ['key' => '2', 'value' => ''],
    ];
    public function deleteSummary($index){
       unset($this->summaries[$index]);
    }
    public function addSummaryRow(){
        array_push($this->summaries, ['key' => '', 'value' => '']);
    }

    public $features = ['1', '2'];
    public function deleteFeature($index){
       unset($this->features[$index]);
    }
    public function addFeatureRow(){
        array_push($this->features, '');
    }

    public $img_gallery = [
        ['file' => ''],
        ['file' => ''],
    ];
    public function deleteImgGallery($index){
       unset($this->img_gallery[$index]);
    }
    public function addImgGalleryRow(){
        array_push($this->img_gallery, ['file' => '']);
    }

    public function render() {
        return view('livewire.property.property-list.property-detail');
    }
}
