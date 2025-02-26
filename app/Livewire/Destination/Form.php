<?php

namespace App\Livewire\Destination;

use App\Models\Destination;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public $destination, $destinationId, $data;
    #[Validate()]
    public $name, $origin, $tour_location, $kms, $start, $end, $adult_price, $children_price, $third_age_price, $prefix;

    public function mount(Destination $destination)
    {
        $this->destinationId = $destination->id;
        $this->name = $destination->name;
        $this->origin = $destination->origin;
        $this->tour_location = $destination->tour_location;
        $this->kms = $destination->kms;
        $this->start = $destination->start;
        $this->end = $destination->end;
        $this->adult_price = $destination->adult_price;
        $this->children_price = $destination->children_price;
        $this->third_age_price = $destination->third_age_price;
    }

    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('destinations')->ignore($this->destinationId)],
            'origin' => ['required'],
            'tour_location' => ['required'],
            'kms' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'adult_price' => ['required'],
            'children_price' => ['required'],
            'third_age_price' => ['required'],
            'prefix' => [Rule::unique('destinations')->ignore($this->destinationId)]
        ];
    }

    protected function messages()
    {
        return [
            'prefix.unique' => 'Este nombre de actividad genera un codigo similar al de otro registro, por favor elige otro.',
        ];
    }

    public function prefixCreate()
    {
        $prefixSeparator = explode(' ', $this->name);
        $prefix = '';
        for ($i = 0; $i < count($prefixSeparator); $i++) {
            $prefix = $prefix . $prefixSeparator[$i][0];
        }
        $this->prefix = strtoupper($prefix);
    }

    public function save()
    {
        Destination::create($this->data);
        session()->flash('message', 'Registro guardado correctamente.');

        return redirect()->route('destination.index');
    }

    public function update()
    {
        $this->destination->update($this->data);
        session()->flash('message', 'Registro actualizado correctamente.');
        return redirect()->route('destination.show', $this->destination->id);
    }

    public function saveOrUpdate()
    {
        $this->prefixCreate();
        $this->validate();
        $this->data = $this->all();
        $this->data['prefix'] = $this->prefix;

        if ($this->destination) {
            $this->update();
        } else {
            $this->save();
        }
    }



    public function render()
    {
        return view('livewire.destination.form');
    }
}
