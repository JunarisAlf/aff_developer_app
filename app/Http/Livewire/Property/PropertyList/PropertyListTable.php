<?php

namespace App\Http\Livewire\Property\PropertyList;

use App\Models\Property;
use Livewire\Component;

class PropertyListTable extends Component{
    public $properties;
    public function mount(){
        $this->properties = Property::all();
    }
    public function render(){
        return view('livewire.property.property-list.property-list-table');
    }
}
