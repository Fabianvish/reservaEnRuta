<?php

namespace App\Livewire\Reservation;

use App\Models\Passenger;
use App\Models\Reservation;
use App\Models\Tour;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Form extends Component
{
    public $reservation, $data, $methods = ['EFECTIVO', 'CUPON DE PAGO'];
    #[Validate()]    
    public $run, $name, $residence, $email, $phone;
    public $adult_price, $children_price, $third_age_price;
    public $reservation_code, $tour_id, $passenger_id, $status, $payment_method, $currency, $children_count, $adult_count, $third_age_count;

    public function mount(Reservation $reservation){

        $this->reservation_code = $reservation->reservation_code;
        if ($this->reservation) {
            $this->tour_id = $reservation->tour_id;
        }else{
<<<<<<< HEAD
            $this->tour_id = 1;
=======
            $activeTour= Tour::where('status', 1)->first();
            $this->tour_id = $activeTour->id;
>>>>>>> 8c6c0dd (correcion formulario reservation)
        }
        $this->passenger_id = $reservation->passenger_id;
        $this->status = $reservation->status;
        $this->payment_method = $reservation->payment_method;
        $this->payment_method = "efectivo";
        if ($this->reservation) {
            $this->currency = $reservation->currency;
            $this->children_count = $reservation->children_count;
            $this->adult_count = $reservation->adult_count;
            $this->third_age_count = $reservation->third_age_count;
        }else{
            $this->currency = 0;
            $this->children_count = 0;
            $this->adult_count = 0;
            $this->third_age_count = 0;
        }

    }

<<<<<<< HEAD
    public function saveOrUpdate(){
        $data = $this->all();
        $passenger = Passenger::where('run', $this->run)->first();
        $this->passenger_id = $passenger->id;

        $data['passenger_id'] = $this->passenger_id;

        dd($data);
    }

=======
    public function rules(){
        return [
            'run' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'residence' => 'required',
            'tour_id' => 'required',
            'payment_method' => 'required',
            'children_count' => 'numeric|min:0',
            'currency' => 'min:1'

        ];
    }

    public function createPassenger(){

        $passenger = Passenger::create($this->data);

        $this->passenger_id = $passenger->id;
        $this->data['passenger_id'] = $this->passenger_id;

    }

    public function codeGenerator(){
        $tour = Tour::find($this->tour_id);
        $this->reservation_code = $tour->destination->prefix . $tour->id . $this->passenger_id;
        $this->data['reservation_code'] = $this->reservation_code;
    }

    public function save(){
        $this->codeGenerator();
        Reservation::create($this->data);
        return redirect()->route('reservation.index');
    }

    public function update(){
    }

    public function saveOrUpdate(){
        $this->validate();

        $this->data = $this->all();
        $this->createPassenger();
        if(!$this->reservation){
            $this->save();
        }else{
            $this->update();
        }

    }
>>>>>>> 8c6c0dd (correcion formulario reservation)

    public function render()
    {
        $tours = Tour::where('status', 1)->get();
        $tour = Tour::find($this->tour_id);
<<<<<<< HEAD


        $this->currency = $tour->destination->adult_price*$this->adult_count + $tour->destination->children_price * $this->children_count + $tour->destination->third_age_price * $this->third_age_count;
=======
        $this->adult_price = $tour->destination->adult_price*$this->adult_count;
        $this->children_price = $tour->destination->children_price * $this->children_count;
        $this->third_age_price = $tour->destination->third_age_price * $this->third_age_count;

        $this->currency =  $this->adult_price + $this->children_price + $this->third_age_price;
>>>>>>> 8c6c0dd (correcion formulario reservation)
        return view('livewire.reservation.form', compact('tours'));
    }
}